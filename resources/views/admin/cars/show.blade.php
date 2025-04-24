@extends('layouts.app')

@section('title', 'Car Details')

@section('content')
    <!-- Admin Header -->
    <div class="relative py-10 bg-blue-700">
        <div class="container mx-auto px-4 text-white">
            <h1 class="text-3xl font-bold mb-2">Car Details</h1>
            <p class="text-lg">View and manage details for {{ $car->name }}.</p>
        </div>
    </div>

    <!-- Car Details Content -->
    <div class="container mx-auto px-4 py-8">
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Car Information -->
            <div class="lg:w-2/3">
                <!-- Car Details Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="bg-gray-50 px-6 py-4 border-b flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Car Information</h3>
                        <div>
                            @if ($car->available)
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Available</span>
                            @else
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">Unavailable</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="md:w-1/3">
                                <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}" 
                                    alt="{{ $car->name }}" class="w-full h-48 object-cover rounded">
                            </div>
                            <div class="md:w-2/3">
                                <h4 class="text-xl font-bold mb-2">{{ $car->name }}</h4>
                                <p class="text-gray-600 mb-3">{{ $car->model }}</p>
                                
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <p class="text-sm text-gray-600">Car ID</p>
                                        <p class="font-semibold">#{{ $car->id }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Price Per Day</p>
                                        <p class="font-semibold">₹{{ $car->price_per_day }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Fuel Type</p>
                                        <p class="font-semibold">{{ ucfirst($car->fuel_type) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Car Type</p>
                                        <p class="font-semibold">{{ ucfirst($car->car_type) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Seats</p>
                                        <p class="font-semibold">{{ $car->seats }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Air Conditioned</p>
                                        <p class="font-semibold">{{ $car->air_conditioned ? 'Yes' : 'No' }}</p>
                                    </div>
                                </div>
                                
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Description</p>
                                    <p>{{ $car->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Car Bookings -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">Booking History</h3>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead class="bg-gray-50">
                                <tr class="text-left text-gray-700">
                                    <th class="px-6 py-3">ID</th>
                                    <th class="px-6 py-3">User</th>
                                    <th class="px-6 py-3">Dates</th>
                                    <th class="px-6 py-3">Total</th>
                                    <th class="px-6 py-3">Status</th>
                                    <th class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($bookings as $booking)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4">#{{ $booking->id }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.users.show', $booking->user) }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $booking->user->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->pickup_date->format('M d, Y') }} to {{ $booking->return_date->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4">₹{{ $booking->total_price }}</td>
                                        <td class="px-6 py-4">
                                            @if ($booking->status == 'confirmed')
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Confirmed</span>
                                            @elseif ($booking->status == 'pending')
                                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Pending</span>
                                            @elseif ($booking->status == 'cancelled')
                                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Cancelled</span>
                                            @elseif ($booking->status == 'completed')
                                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Completed</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.bookings.show', $booking) }}" class="text-blue-600 hover:text-blue-800">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No bookings found for this car</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:w-1/3">
                <!-- Update Availability -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">Update Availability</h3>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('admin.cars.availability', $car) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            
                            <div class="mb-4">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="available" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ $car->available ? 'checked' : '' }}>
                                    <span class="ml-2">Car is available for booking</span>
                                </label>
                            </div>
                            
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Availability
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
                        <a href="{{ route('admin.cars.edit', $car) }}" class="block w-full bg-green-600 hover:bg-green-700 text-white font-bold text-center py-2 px-4 rounded mb-3">
                            Edit Car
                        </a>
                        
                        <a href="{{ route('admin.cars.index') }}" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold text-center py-2 px-4 rounded mb-3">
                            Back to All Cars
                        </a>
                        
                        <a href="{{ route('cars.show', $car) }}" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold text-center py-2 px-4 rounded mb-3">
                            View on Public Site
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 