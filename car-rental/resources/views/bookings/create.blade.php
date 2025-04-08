@extends('layouts.app')

@section('title', 'Book Car')

@section('content')
    <!-- Booking Form Section -->
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Car Information -->
                <div class="lg:w-1/2">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-bold mb-6">Car Information</h2>
                        
                        <div class="flex mb-6">
                            <div class="w-1/3">
                                <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/350x200?text=No+Image' }}" 
                                    alt="{{ $car->name }}" class="w-full h-32 object-cover rounded-lg">
                            </div>
                            <div class="w-2/3 pl-6">
                                <h3 class="text-xl font-bold">{{ $car->name }}</h3>
                                <p class="text-gray-600 mb-2">{{ $car->model }}</p>
                                <div class="flex items-center text-gray-700 mb-2">
                                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-5M5 12h14"></path>
                                    </svg>
                                    {{ ucfirst($car->fuel_type) }}
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    {{ ucfirst($car->car_type) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-100 p-4 rounded-md mb-6">
                            <p class="text-gray-700 font-medium mb-1">Price per day:</p>
                            <p class="text-xl font-bold text-blue-600">₹{{ $car->price_per_day }}</p>
                        </div>
                        
                        <div class="text-gray-700">
                            <h3 class="font-medium mb-2">Car Features:</h3>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>{{ $car->seats }} Seats</li>
                                <li>{{ $car->air_conditioned ? 'Air Conditioning' : 'No Air Conditioning' }}</li>
                                <li>{{ ucfirst($car->fuel_type) }} Engine</li>
                                <li>{{ ucfirst($car->car_type) }} Type</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Booking Form -->
                <div class="lg:w-1/2">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl font-bold mb-6">Book This Car</h2>
                        
                        @if ($errors->any())
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                                <p class="font-bold">Please correct the following errors:</p>
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
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
                            
                            <div id="price-calculation" class="mb-6 p-4 bg-gray-100 rounded-md">
                                <p class="text-gray-700 mb-2">Price: <span class="font-bold">₹{{ $car->price_per_day }}</span> per day</p>
                                <p class="text-gray-700 text-sm">Select dates to calculate total price</p>
                            </div>
                            
                            <div class="flex items-center mb-6">
                                <input type="checkbox" id="terms" name="terms" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="terms" class="ml-2 block text-gray-700">
                                    I agree to the <a href="{{ route('terms') }}" class="text-blue-600 hover:text-blue-800">Terms and Conditions</a>
                                </label>
                            </div>
                            
                            <div class="flex space-x-4">
                                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-md transition duration-300">
                                    Book Now
                                </button>
                                <a href="{{ route('cars.show', $car) }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 text-center font-bold py-3 rounded-md transition duration-300">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Calculate total price based on selected dates
    document.addEventListener('DOMContentLoaded', function() {
        const pickupDateInput = document.getElementById('pickup_date');
        const returnDateInput = document.getElementById('return_date');
        const priceCalculation = document.getElementById('price-calculation');
        
        const calculateDays = function() {
            const pickupDate = new Date(pickupDateInput.value);
            const returnDate = new Date(returnDateInput.value);
            
            if (pickupDate && returnDate && returnDate > pickupDate) {
                const timeDiff = returnDate - pickupDate;
                const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
                const pricePerDay = {{ $car->price_per_day }};
                const totalPrice = daysDiff * pricePerDay;
                
                priceCalculation.innerHTML = `
                    <p class="text-gray-700 mb-2">Price: <span class="font-bold">₹${pricePerDay}</span> per day × ${daysDiff} days</p>
                    <p class="text-xl font-bold text-blue-600">Total: ₹${totalPrice}</p>
                `;
            }
        };
        
        pickupDateInput.addEventListener('change', calculateDays);
        returnDateInput.addEventListener('change', calculateDays);
    });
</script>
@endsection 