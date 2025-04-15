@extends('layouts.app')

@section('title', 'Our Cars')

@section('content')
    <!-- Cars Hero Section -->
    <div class="relative py-20 bg-primary-600">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Find Your Perfect Ride</h1>
            <p class="text-xl max-w-3xl mx-auto">Affordable options for weekend trips, campus moves, or road trips with friends.</p>
        </div>
    </div>

    <!-- Cars Listing Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Filter Sidebar -->
                <div class="lg:w-1/4">
                    <div class="bg-white p-6 rounded-xl shadow-sm sticky top-6">
                        <h2 class="text-xl font-bold mb-6">Filter Options</h2>
                        
                        <form action="{{ route('cars.index') }}" method="GET">
                            <!-- Car Type Filter -->
                            <div class="mb-6">
                                <h3 class="font-medium mb-2">Car Type</h3>
                                <select name="car_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    <option value="all" {{ request('car_type') == 'all' ? 'selected' : '' }}>All Types</option>
                                    @foreach($car_types as $type)
                                        <option value="{{ $type }}" {{ request('car_type') == $type ? 'selected' : '' }}>
                                            {{ ucfirst($type) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Fuel Type Filter -->
                            <div class="mb-6">
                                <h3 class="font-medium mb-2">Fuel Type</h3>
                                <select name="fuel_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    <option value="all" {{ request('fuel_type') == 'all' ? 'selected' : '' }}>All Types</option>
                                    @foreach($fuel_types as $type)
                                        <option value="{{ $type }}" {{ request('fuel_type') == $type ? 'selected' : '' }}>
                                            {{ ucfirst($type) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Price Range Filter -->
                            <div class="mb-6">
                                <h3 class="font-medium mb-2">Price Range (per day)</h3>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label for="min_price" class="block text-sm text-gray-700 mb-1">Min (₹)</label>
                                        <input type="number" id="min_price" name="min_price" 
                                            value="{{ request('min_price') }}" min="0" 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    </div>
                                    <div>
                                        <label for="max_price" class="block text-sm text-gray-700 mb-1">Max (₹)</label>
                                        <input type="number" id="max_price" name="max_price" 
                                            value="{{ request('max_price') }}" min="0" 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Show Unavailable Cars -->
                            <div class="mb-6">
                                <div class="flex items-center">
                                    <input type="checkbox" id="show_all" name="show_all" value="1" 
                                        {{ request('show_all') ? 'checked' : '' }}
                                        class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                                    <label for="show_all" class="ml-2 block text-gray-700">Show unavailable cars</label>
                                </div>
                            </div>
                            
                            <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-4 rounded-full transition duration-300">
                                Apply Filters
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Cars Grid -->
                <div class="lg:w-3/4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($cars as $car)
                            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                                <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/350x200?text=No+Image' }}" 
                                    alt="{{ $car->name }}" class="w-full h-52 object-cover">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-3">
                                        <h3 class="text-xl font-bold">{{ $car->name }}</h3>
                                        <span class="bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">₹{{ $car->price_per_day }}/day</span>
                                    </div>
                                    <p class="text-gray-600 mb-4">{{ $car->model }}</p>
                                    <div class="flex flex-wrap items-center text-gray-500 text-sm mb-4 gap-y-2">
                                        <div class="flex items-center mr-4">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-5M5 12h14"></path>
                                            </svg>
                                            {{ ucfirst($car->fuel_type) }}
                                        </div>
                                        <div class="flex items-center mr-4">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            {{ ucfirst($car->car_type) }}
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            {{ $car->seats }} Seats
                                        </div>
                                    </div>
                                    
                                    @if(!$car->available)
                                        <div class="bg-red-100 text-red-700 px-3 py-2 rounded-full text-sm mb-4 text-center font-medium">
                                            Currently Unavailable
                                        </div>
                                    @endif
                                    
                                    <div class="flex flex-col space-y-3">
                                        <a href="{{ route('cars.show', $car) }}" class="bg-primary-600 hover:bg-primary-700 text-white text-center py-2.5 rounded-full transition duration-300 font-medium">
                                            View Details
                                        </a>
                                        
                                        @if($car->available)
                                            @auth
                                                <a href="{{ route('bookings.create', $car) }}" class="bg-accent-500 hover:bg-accent-600 text-white text-center py-2.5 rounded-full transition duration-300 font-medium">
                                                    Book Now
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}" class="bg-accent-500 hover:bg-accent-600 text-white text-center py-2.5 rounded-full transition duration-300 font-medium">
                                                    Login to Book
                                                </a>
                                            @endauth
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-12 bg-white rounded-xl shadow-sm">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                                <p class="text-gray-500 text-lg mb-4">No cars match your search criteria.</p>
                                <a href="{{ route('cars.index') }}" class="inline-block bg-primary-600 hover:bg-primary-700 text-white font-medium py-2 px-6 rounded-full transition duration-300">
                                    Clear all filters
                                </a>
                            </div>
                        @endforelse
                    </div>
                    
                    <!-- Pagination Links -->
                    <div class="mt-10">
                        {{ $cars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection 