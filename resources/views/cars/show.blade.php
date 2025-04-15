@extends('layouts.app')

@section('title', $car->name)

@section('content')
    <!-- Car Details Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Car Images and Details -->
                <div class="lg:w-2/3">
                    <!-- Car Image -->
                    <div class="bg-white p-4 rounded-lg shadow-md mb-8">
                        <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/800x500?text=No+Image' }}" 
                            alt="{{ $car->name }}" class="w-full h-96 object-cover rounded-lg">
                    </div>
                    
                    <!-- Car Details -->
                    <div class="bg-white p-8 rounded-lg shadow-md mb-8">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h1 class="text-3xl font-bold mb-2">{{ $car->name }}</h1>
                                <p class="text-gray-600 text-lg">{{ $car->model }}</p>
                            </div>
                            <div class="bg-blue-600 text-white px-4 py-2 rounded-md text-lg font-bold">
                                ₹{{ $car->price_per_day }}/day
                            </div>
                        </div>
                        
                        <!-- Car Features -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-5M5 12h14"></path>
                                </svg>
                                <span>{{ ucfirst($car->fuel_type) }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span>{{ ucfirst($car->car_type) }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span>{{ $car->seats }} Seats</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 {{ $car->air_conditioned ? 'text-blue-600' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span>Air Conditioning</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 {{ $car->available ? 'text-green-600' : 'text-red-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span>{{ $car->available ? 'Available' : 'Unavailable' }}</span>
                            </div>
                        </div>
                        
                        <!-- Car Description -->
                        <div>
                            <h2 class="text-xl font-bold mb-4">Description</h2>
                            <p class="text-gray-700">
                                {{ $car->description ?? 'No description available for this car.' }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Booking Form -->
                <div class="lg:w-1/3">
                    <div class="bg-white p-6 rounded-lg shadow-md sticky top-24">
                        <h2 class="text-xl font-bold mb-6">Book This Car</h2>
                        
                        @if(!$car->available)
                            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
                                <p class="font-bold">This car is currently unavailable for booking.</p>
                                <p>Please check back later or browse our other available cars.</p>
                            </div>
                            
                            <a href="{{ route('cars.index') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-md transition duration-300">
                                Browse Other Cars
                            </a>
                        @else
                            @auth
                                <form action="{{ route('bookings.store', $car) }}" method="POST">
                                    @csrf
                                    
                                    <div class="mb-6">
                                        <label for="pickup_date" class="block text-gray-700 font-medium mb-2">Pickup Date</label>
                                        <input type="date" id="pickup_date" name="pickup_date" 
                                            min="{{ date('Y-m-d') }}" value="{{ old('pickup_date') }}"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                            required>
                                    </div>
                                    
                                    <div class="mb-6">
                                        <label for="return_date" class="block text-gray-700 font-medium mb-2">Return Date</label>
                                        <input type="date" id="return_date" name="return_date" 
                                            min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ old('return_date') }}"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                            required>
                                    </div>
                                    
                                    <div class="mb-6">
                                        <label for="special_requests" class="block text-gray-700 font-medium mb-2">Special Requests (Optional)</label>
                                        <textarea id="special_requests" name="special_requests" rows="3" 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('special_requests') }}</textarea>
                                    </div>
                                    
                                    <div class="mb-6 p-4 bg-gray-100 rounded-md">
                                        <p class="text-gray-700 font-medium mb-1">Price per day:</p>
                                        <p class="text-xl font-bold text-blue-600">₹{{ $car->price_per_day }}</p>
                                        <p class="text-gray-700 text-sm">Final price will be calculated based on your selected dates.</p>
                                    </div>
                                    
                                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-md transition duration-300">
                                        Book Now
                                    </button>
                                </form>
                            @else
                                <div class="bg-yellow-100 text-yellow-800 p-4 rounded-md mb-6">
                                    <p>You need to log in to book this car.</p>
                                </div>
                                
                                <a href="{{ route('login') }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-md transition duration-300 mb-4">
                                    Login
                                </a>
                                
                                <a href="{{ route('register') }}" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 text-center py-3 rounded-md transition duration-300">
                                    Register
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Similar Cars Section -->
            @if($similar_cars->count() > 0)
                <div class="mt-12">
                    <h2 class="text-2xl font-bold mb-6">Similar Cars You Might Like</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($similar_cars as $similar_car)
                            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                                <img src="{{ $similar_car->image ? asset('storage/' . $similar_car->image) : 'https://via.placeholder.com/350x200?text=No+Image' }}" 
                                    alt="{{ $similar_car->name }}" class="w-full h-48 object-cover">
                                <div class="p-6">
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="text-xl font-bold">{{ $similar_car->name }}</h3>
                                        <span class="bg-blue-600 text-white px-2 py-1 rounded-md text-sm">₹{{ $similar_car->price_per_day }}/day</span>
                                    </div>
                                    <p class="text-gray-600 mb-4">{{ $similar_car->model }}</p>
                                    <a href="{{ route('cars.show', $similar_car) }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded-md transition duration-300">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Calculate total price based on selected dates
    document.addEventListener('DOMContentLoaded', function() {
        const pickupDateInput = document.getElementById('pickup_date');
        const returnDateInput = document.getElementById('return_date');
        
        if (pickupDateInput && returnDateInput) {
            const calculateDays = function() {
                const pickupDate = new Date(pickupDateInput.value);
                const returnDate = new Date(returnDateInput.value);
                
                if (pickupDate && returnDate && returnDate > pickupDate) {
                    const timeDiff = returnDate - pickupDate;
                    const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
                    const pricePerDay = {{ $car->price_per_day }};
                    const totalPrice = daysDiff * pricePerDay;
                    
                    document.querySelector('.mb-6.p-4.bg-gray-100 p.text-gray-700.mb-2').innerHTML = 
                        `Price: <span class="font-bold">₹${pricePerDay}</span> per day × ${daysDiff} days = <span class="font-bold">₹${totalPrice}</span>`;
                }
            };
            
            pickupDateInput.addEventListener('change', calculateDays);
            returnDateInput.addEventListener('change', calculateDays);
        }
    });
</script>
@endsection 