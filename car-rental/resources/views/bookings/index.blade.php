@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
    <!-- Bookings Hero Section -->
    <div class="relative py-16 bg-blue-600">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">My Bookings</h1>
            <p class="text-xl max-w-3xl mx-auto">Manage your car rental bookings in one place.</p>
        </div>
    </div>

    <!-- Bookings List Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            @if ($bookings->count() > 0)
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($bookings as $booking)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="p-6 md:flex">
                                <!-- Car Image -->
                                <div class="md:w-1/4 mb-4 md:mb-0">
                                    <img src="{{ $booking->car->image ? asset('storage/' . $booking->car->image) : 'https://via.placeholder.com/350x200?text=No+Image' }}" 
                                        alt="{{ $booking->car->name }}" class="w-full h-40 object-cover rounded-lg">
                                </div>
                                
                                <!-- Booking Details -->
                                <div class="md:w-2/4 md:px-6">
                                    <h2 class="text-2xl font-bold mb-2">{{ $booking->car->name }}</h2>
                                    <p class="text-gray-600 mb-4">{{ $booking->car->model }}</p>
                                    
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <p class="text-gray-700 font-medium">Booking ID:</p>
                                            <p>#{{ $booking->id }}</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-700 font-medium">Status:</p>
                                            <span class="inline-block px-2 py-1 rounded-md text-sm
                                                @if($booking->status == 'confirmed') bg-green-100 text-green-800
                                                @elseif($booking->status == 'pending') bg-yellow-100 text-yellow-800
                                                @elseif($booking->status == 'cancelled') bg-red-100 text-red-800
                                                @else bg-blue-100 text-blue-800
                                                @endif">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </div>
                                        <div>
                                            <p class="text-gray-700 font-medium">Pickup Date:</p>
                                            <p>{{ $booking->pickup_date->format('M d, Y') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-700 font-medium">Return Date:</p>
                                            <p>{{ $booking->return_date->format('M d, Y') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-700 font-medium">Duration:</p>
                                            <p>{{ $booking->pickup_date->diffInDays($booking->return_date) }} days</p>
                                        </div>
                                        <div>
                                            <p class="text-gray-700 font-medium">Total Price:</p>
                                            <p class="font-bold">${{ $booking->total_price }}</p>
                                        </div>
                                    </div>
                                    
                                    @if ($booking->special_requests)
                                        <div class="mb-4">
                                            <p class="text-gray-700 font-medium">Special Requests:</p>
                                            <p class="text-gray-600">{{ $booking->special_requests }}</p>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Actions -->
                                <div class="md:w-1/4 mt-4 md:mt-0 flex flex-col justify-center items-center">
                                    <a href="{{ route('bookings.show', $booking) }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded-md transition duration-300 mb-3">
                                        View Details
                                    </a>
                                    
                                    @if(in_array($booking->status, ['pending', 'confirmed']))
                                        <form action="{{ route('bookings.cancel', $booking) }}" method="POST" class="w-full">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white text-center py-2 rounded-md transition duration-300"
                                                onclick="return confirm('Are you sure you want to cancel this booking?')">
                                                Cancel Booking
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold mb-4">No Bookings Found</h2>
                    <p class="text-gray-600 mb-6">You don't have any car bookings yet.</p>
                    <a href="{{ route('cars.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                        Browse Cars
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection 