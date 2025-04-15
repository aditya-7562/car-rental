@extends('layouts.app')

@section('title', 'Booking Details')

@section('content')
    <!-- Booking Details Section -->
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Booking Header -->
                <div class="bg-white rounded-t-lg shadow-md p-6 border-b">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-bold">Booking #{{ $booking->id }}</h1>
                        <span class="inline-block px-3 py-1 rounded-md text-sm
                            @if($booking->status == 'confirmed') bg-green-100 text-green-800
                            @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                            @elseif($booking->status == 'completed') bg-blue-100 text-blue-800
                            @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                </div>
                
                <!-- Car Information -->
                <div class="bg-white shadow-md p-6 md:flex border-b">
                    <div class="md:w-1/3 mb-4 md:mb-0">
                        <img src="{{ $booking->car->image ? asset('storage/' . $booking->car->image) : 'https://via.placeholder.com/350x200?text=No+Image' }}" 
                            alt="{{ $booking->car->name }}" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <div class="md:w-2/3 md:pl-6">
                        <h2 class="text-xl font-bold mb-2">{{ $booking->car->name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $booking->car->model }}</p>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-5M5 12h14"></path>
                                </svg>
                                {{ ucfirst($booking->car->fuel_type) }}
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                {{ ucfirst($booking->car->car_type) }}
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                {{ $booking->car->seats }} Seats
                            </div>
                            <div class="flex items-center text-gray-700">
                                <svg class="w-4 h-4 mr-2 {{ $booking->car->air_conditioned ? 'text-blue-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                Air Conditioning
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Booking Details -->
                <div class="bg-white shadow-md p-6 border-b">
                    <h2 class="text-xl font-bold mb-6">Booking Details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Booking Date:</p>
                            <p>{{ $booking->created_at->format('M d, Y H:i') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Booking Status:</p>
                            <p>{{ ucfirst($booking->status) }}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Pickup Date:</p>
                            <p>{{ $booking->pickup_date->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Return Date:</p>
                            <p>{{ $booking->return_date->format('M d, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Duration:</p>
                            <p>{{ $booking->pickup_date->diffInDays($booking->return_date) }} days</p>
                        </div>
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Daily Rate:</p>
                            <p>${{ $booking->car->price_per_day }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-gray-700 font-medium mb-1">Total Price:</p>
                            <p class="text-xl font-bold text-blue-600">${{ $booking->total_price }}</p>
                        </div>
                        
                        @if ($booking->special_requests)
                            <div class="md:col-span-2">
                                <p class="text-gray-700 font-medium mb-1">Special Requests:</p>
                                <p class="bg-gray-100 p-3 rounded-md">{{ $booking->special_requests }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Customer Information -->
                <div class="bg-white shadow-md p-6 border-b">
                    <h2 class="text-xl font-bold mb-6">Customer Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Name:</p>
                            <p>{{ $booking->user->name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Email:</p>
                            <p>{{ $booking->user->email }}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Phone Number:</p>
                            <p>{{ $booking->user->phone_number ?? 'Not provided' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-700 font-medium mb-1">Driver License:</p>
                            <p>{{ $booking->user->driver_license ?? 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="bg-white rounded-b-lg shadow-md p-6 flex justify-between">
                    <a href="{{ route('bookings.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md transition duration-300">
                        Back to Bookings
                    </a>
                    
                    <div>
                        @if(in_array($booking->status, ['pending', 'confirmed']))
                            <form action="{{ route('bookings.cancel', $booking) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition duration-300"
                                    onclick="return confirm('Are you sure you want to cancel this booking?')">
                                    Cancel Booking
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 