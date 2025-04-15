@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')
    <!-- Admin Header -->
    <div class="relative py-10 bg-blue-700">
        <div class="container mx-auto px-4 text-white">
            <h1 class="text-3xl font-bold mb-2">Booking Details</h1>
            <p class="text-lg">View and manage booking #{{ $booking->id }}</p>
        </div>
    </div>

    <!-- Booking Details Content -->
    <div class="container mx-auto px-4 py-8">
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Booking Information -->
            <div class="lg:w-2/3">
                <!-- Booking Details Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="bg-gray-50 px-6 py-4 border-b flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Booking Information</h3>
                        <div>
                            @if ($booking->status == 'confirmed')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Confirmed</span>
                            @elseif ($booking->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">Pending</span>
                            @elseif ($booking->status == 'cancelled')
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">Cancelled</span>
                            @elseif ($booking->status == 'completed')
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Completed</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Booking ID</p>
                                <p class="font-semibold">#{{ $booking->id }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Created At</p>
                                <p class="font-semibold">{{ $booking->created_at->format('M d, Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Pickup Date</p>
                                <p class="font-semibold">{{ $booking->pickup_date->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Return Date</p>
                                <p class="font-semibold">{{ $booking->return_date->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Duration</p>
                                <p class="font-semibold">{{ $booking->pickup_date->diffInDays($booking->return_date) }} days</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Total Price</p>
                                <p class="font-semibold">${{ $booking->total_price }}</p>
                            </div>
                        </div>
                        
                        @if($booking->special_requests)
                            <div class="mt-6">
                                <p class="text-sm text-gray-600 mb-1">Special Requests</p>
                                <p class="p-3 bg-gray-50 rounded">{{ $booking->special_requests }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Car Information Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">Car Information</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="md:w-1/3">
                                <img src="{{ $booking->car->image ? asset('storage/' . $booking->car->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}" 
                                    alt="{{ $booking->car->name }}" class="w-full h-48 object-cover rounded">
                            </div>
                            <div class="md:w-2/3">
                                <h4 class="text-xl font-bold mb-2">{{ $booking->car->name }}</h4>
                                <p class="text-gray-600 mb-3">{{ $booking->car->model }}</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <p class="text-sm text-gray-600">Fuel Type</p>
                                        <p class="font-semibold">{{ ucfirst($booking->car->fuel_type) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Car Type</p>
                                        <p class="font-semibold">{{ ucfirst($booking->car->car_type) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Seats</p>
                                        <p class="font-semibold">{{ $booking->car->seats }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Air Conditioned</p>
                                        <p class="font-semibold">{{ $booking->car->air_conditioned ? 'Yes' : 'No' }}</p>
                                    </div>
                                </div>
                                
                                <a href="{{ route('admin.cars.show', $booking->car) }}" class="inline-block text-blue-600 hover:text-blue-800">
                                    View Car Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Customer Information Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">Customer Information</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Customer Name</p>
                                <p class="font-semibold">{{ $booking->user->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Email</p>
                                <p class="font-semibold">{{ $booking->user->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Phone Number</p>
                                <p class="font-semibold">{{ $booking->user->phone_number }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Driver License</p>
                                <p class="font-semibold">{{ $booking->user->driver_license }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-sm text-gray-600 mb-1">Address</p>
                                <p class="font-semibold">{{ $booking->user->address }}</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="{{ route('admin.users.show', $booking->user) }}" class="inline-block text-blue-600 hover:text-blue-800">
                                View Customer Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <!-- Update Booking Status -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">Update Status</h3>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <div class="mb-4">
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Booking Status</label>
                                <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Status
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Action Links -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">Actions</h3>
                    </div>
                    <div class="p-6">
                        <a href="{{ route('admin.bookings.index') }}" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold text-center py-2 px-4 rounded mb-3">
                            Back to All Bookings
                        </a>
                        
                        <a href="{{ route('admin.users.show', $booking->user) }}" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold text-center py-2 px-4 rounded mb-3">
                            View Customer Profile
                        </a>
                        
                        <a href="{{ route('admin.cars.show', $booking->car) }}" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold text-center py-2 px-4 rounded">
                            View Car Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 