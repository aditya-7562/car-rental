<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the user's bookings.
     */
    public function index()
    {
        $bookings = Auth::user()->bookings()->with('car')->latest()->get();
        
        return view('bookings.index', [
            'bookings' => $bookings
        ]);
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create(Car $car)
    {
        return view('bookings.create', [
            'car' => $car
        ]);
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request, Car $car)
    {
        $validated = $request->validate([
            'pickup_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:pickup_date',
            'special_requests' => 'nullable|string',
        ]);

        $pickup_date = Carbon::parse($validated['pickup_date']);
        $return_date = Carbon::parse($validated['return_date']);
        $days = $pickup_date->diffInDays($return_date);
        $total_price = $car->price_per_day * $days;

        // Check if car is available for the selected dates
        $conflicting_bookings = Booking::where('car_id', $car->id)
            ->where(function($query) use ($pickup_date, $return_date) {
                $query->whereBetween('pickup_date', [$pickup_date, $return_date])
                    ->orWhereBetween('return_date', [$pickup_date, $return_date])
                    ->orWhere(function($query) use ($pickup_date, $return_date) {
                        $query->where('pickup_date', '<=', $pickup_date)
                            ->where('return_date', '>=', $return_date);
                    });
            })
            ->where('status', '!=', 'cancelled')
            ->exists();

        if ($conflicting_bookings) {
            return back()->withErrors(['dates' => 'The car is not available for the selected dates']);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'car_id' => $car->id,
            'pickup_date' => $pickup_date,
            'return_date' => $return_date,
            'total_price' => $total_price,
            'status' => 'pending',
            'special_requests' => $validated['special_requests'] ?? null,
        ]);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking created successfully');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        // Ensure user only sees their own bookings
        if ($booking->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        return view('bookings.show', [
            'booking' => $booking->load('car', 'user')
        ]);
    }

    /**
     * Cancel the specified booking.
     */
    public function cancel(Booking $booking)
    {
        // Ensure user only cancels their own bookings
        if ($booking->user_id !== Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        // Only allow cancelling pending or confirmed bookings
        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return back()->withErrors(['status' => 'This booking cannot be cancelled']);
        }

        $booking->update([
            'status' => 'cancelled'
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking cancelled successfully');
    }
}
