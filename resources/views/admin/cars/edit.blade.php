@extends('layouts.app')

@section('title', 'Edit Car')

@section('content')
    <!-- Admin Header -->
    <div class="relative py-10 bg-blue-700">
        <div class="container mx-auto px-4 text-white">
            <h1 class="text-3xl font-bold mb-2">Edit Car</h1>
            <p class="text-lg">Update details for {{ $car->name }}</p>
        </div>
    </div>

    <!-- Car Form Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-4xl mx-auto">
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PATCH')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Car Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Car Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $car->name) }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Car Model -->
                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Model *</label>
                        <input type="text" name="model" id="model" value="{{ old('model', $car->model) }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Price Per Day -->
                    <div>
                        <label for="price_per_day" class="block text-sm font-medium text-gray-700 mb-1">Price Per Day (₹) *</label>
                        <input type="number" step="0.01" min="0" name="price_per_day" id="price_per_day" value="{{ old('price_per_day', $car->price_per_day) }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Seats -->
                    <div>
                        <label for="seats" class="block text-sm font-medium text-gray-700 mb-1">Number of Seats *</label>
                        <input type="number" min="1" max="15" name="seats" id="seats" value="{{ old('seats', $car->seats) }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Fuel Type -->
                    <div>
                        <label for="fuel_type" class="block text-sm font-medium text-gray-700 mb-1">Fuel Type *</label>
                        <select name="fuel_type" id="fuel_type" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="petrol" {{ old('fuel_type', $car->fuel_type) == 'petrol' ? 'selected' : '' }}>Petrol</option>
                            <option value="diesel" {{ old('fuel_type', $car->fuel_type) == 'diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="electric" {{ old('fuel_type', $car->fuel_type) == 'electric' ? 'selected' : '' }}>Electric</option>
                            <option value="hybrid" {{ old('fuel_type', $car->fuel_type) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                        </select>
                    </div>
                    
                    <!-- Car Type -->
                    <div>
                        <label for="car_type" class="block text-sm font-medium text-gray-700 mb-1">Car Type *</label>
                        <select name="car_type" id="car_type" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="sedan" {{ old('car_type', $car->car_type) == 'sedan' ? 'selected' : '' }}>Sedan</option>
                            <option value="suv" {{ old('car_type', $car->car_type) == 'suv' ? 'selected' : '' }}>SUV</option>
                            <option value="hatchback" {{ old('car_type', $car->car_type) == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                            <option value="luxury" {{ old('car_type', $car->car_type) == 'luxury' ? 'selected' : '' }}>Luxury</option>
                            <option value="sport" {{ old('car_type', $car->car_type) == 'sport' ? 'selected' : '' }}>Sport</option>
                        </select>
                    </div>
                    
                    <!-- Air Conditioned -->
                    <div>
                        <div class="flex items-center mt-6">
                            <input type="checkbox" name="air_conditioned" id="air_conditioned" value="1" {{ old('air_conditioned', $car->air_conditioned) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <label for="air_conditioned" class="ml-2 block text-sm text-gray-700">Air Conditioned</label>
                        </div>
                    </div>
                    
                    <!-- Available -->
                    <div>
                        <div class="flex items-center mt-6">
                            <input type="checkbox" name="available" id="available" value="1" {{ old('available', $car->available) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <label for="available" class="ml-2 block text-sm text-gray-700">Available for Booking</label>
                        </div>
                    </div>
                </div>
                
                <!-- Car Image -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Car Image</label>
                    
                    @if($car->image)
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full max-w-xs h-auto rounded-md">
                        </div>
                    @endif
                    
                    <input type="file" name="image" id="image" accept="image/*"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <p class="text-xs text-gray-500 mt-1">Upload a new image to replace the current one (optional)</p>
                </div>
                
                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('description', $car->description) }}</textarea>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex justify-between">
                    <a href="{{ route('admin.cars.show', $car) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Cancel
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update Car
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 