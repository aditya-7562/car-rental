<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Check if the authenticated user is an admin.
     */
    private function checkAdmin()
    {
        if (!Auth::user()->is_admin) {
            return redirect('/')->with('error', 'You do not have admin access.');
        }
    }

    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $totalUsers = User::where('is_admin', false)->count();
        $totalCars = Car::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $unreadMessages = ContactMessage::whereNull('read_at')->count();
        
        $recentBookings = Booking::with(['user', 'car'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        $recentMessages = ContactMessage::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalCars', 
            'totalBookings', 
            'pendingBookings', 
            'unreadMessages',
            'recentBookings',
            'recentMessages'
        ));
    }
    
    /**
     * Show all users.
     */
    public function users()
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $users = User::where('is_admin', false)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.users.index', compact('users'));
    }
    
    /**
     * Show user details.
     */
    public function showUser(User $user)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $bookings = Booking::where('user_id', $user->id)
            ->with('car')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.users.show', compact('user', 'bookings'));
    }
    
    /**
     * Show all bookings.
     */
    public function bookings(Request $request)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $query = Booking::query()->with(['user', 'car']);
        
        // Filter by status
        if ($request->filled('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        
        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.bookings.index', compact('bookings'));
    }
    
    /**
     * Show booking details.
     */
    public function showBooking(Booking $booking)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $booking->load(['user', 'car']);
        
        return view('admin.bookings.show', compact('booking'));
    }
    
    /**
     * Update booking status.
     */
    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);
        
        $booking->status = $request->status;
        $booking->save();
        
        return redirect()->route('admin.bookings.show', $booking)
            ->with('success', 'Booking status updated successfully.');
    }
    
    /**
     * Show all cars.
     */
    public function cars()
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $cars = Car::orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.cars.index', compact('cars'));
    }
    
    /**
     * Show car details.
     */
    public function showCar(Car $car)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $bookings = Booking::where('car_id', $car->id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.cars.show', compact('car', 'bookings'));
    }
    
    /**
     * Update car availability.
     */
    public function updateCarAvailability(Request $request, Car $car)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $car->available = $request->has('available');
        $car->save();
        
        return redirect()->route('admin.cars.show', $car)
            ->with('success', 'Car availability updated successfully.');
    }
    
    /**
     * Show the form for creating a new car.
     */
    public function createCar()
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        return view('admin.cars.create');
    }
    
    /**
     * Store a newly created car in storage.
     */
    public function storeCar(Request $request)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price_per_day' => 'required|numeric|min:0',
            'fuel_type' => 'required|in:petrol,diesel,electric,hybrid',
            'car_type' => 'required|in:sedan,suv,hatchback,luxury,sport',
            'seats' => 'required|integer|min:1|max:15',
            'air_conditioned' => 'boolean',
            'available' => 'boolean',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }
        
        // Set boolean fields
        $validated['air_conditioned'] = $request->has('air_conditioned');
        $validated['available'] = $request->has('available');
        
        $car = Car::create($validated);
        
        return redirect()->route('admin.cars.show', $car)
            ->with('success', 'Car added successfully.');
    }
    
    /**
     * Show the form for editing a car.
     */
    public function editCar(Car $car)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        return view('admin.cars.edit', compact('car'));
    }
    
    /**
     * Update the specified car in storage.
     */
    public function updateCar(Request $request, Car $car)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price_per_day' => 'required|numeric|min:0',
            'fuel_type' => 'required|in:petrol,diesel,electric,hybrid',
            'car_type' => 'required|in:sedan,suv,hatchback,luxury,sport',
            'seats' => 'required|integer|min:1|max:15',
            'air_conditioned' => 'boolean',
            'available' => 'boolean',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }
        
        // Set boolean fields
        $validated['air_conditioned'] = $request->has('air_conditioned');
        $validated['available'] = $request->has('available');
        
        $car->update($validated);
        
        return redirect()->route('admin.cars.show', $car)
            ->with('success', 'Car updated successfully.');
    }

    /**
     * Show all contact messages.
     */
    public function contactMessages(Request $request)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $query = ContactMessage::query();
        
        // Filter by read status
        if ($request->has('status')) {
            if ($request->status === 'read') {
                $query->whereNotNull('read_at');
            } elseif ($request->status === 'unread') {
                $query->whereNull('read_at');
            }
        }
        
        $messages = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.messages.index', compact('messages'));
    }
    
    /**
     * Show contact message details.
     */
    public function showContactMessage(ContactMessage $message)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        // Mark the message as read if it hasn't been read yet
        if (!$message->isRead()) {
            $message->markAsRead();
        }
        
        return view('admin.messages.show', compact('message'));
    }
    
    /**
     * Mark a message as read.
     */
    public function markMessageAsRead(ContactMessage $message)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $message->markAsRead();
        
        return redirect()->back()
            ->with('success', 'Message marked as read.');
    }
    
    /**
     * Delete a message.
     */
    public function deleteMessage(ContactMessage $message)
    {
        $check = $this->checkAdmin();
        if ($check) return $check;
        
        $message->delete();
        
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
} 