@extends('layouts.app')

@section('title', 'Manage Cars')

@section('content')
    <!-- Admin Header -->
    <div class="relative py-10 bg-blue-700">
        <div class="container mx-auto px-4 text-white">
            <h1 class="text-3xl font-bold mb-2">Car Management</h1>
            <p class="text-lg">View and manage all cars in the fleet.</p>
        </div>
    </div>

    <!-- Car Management Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Action Button -->
        <div class="mb-6">
            <a href="{{ route('admin.cars.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Car
            </a>
        </div>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        
        <!-- Cars Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-700">
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Image</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Model</th>
                            <th class="px-6 py-3">Type</th>
                            <th class="px-6 py-3">Fuel</th>
                            <th class="px-6 py-3">Price/Day</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($cars as $car)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">#{{ $car->id }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/80x60?text=No+Image' }}" 
                                        alt="{{ $car->name }}" class="w-20 h-14 object-cover rounded">
                                </td>
                                <td class="px-6 py-4">{{ $car->name }}</td>
                                <td class="px-6 py-4">{{ $car->model }}</td>
                                <td class="px-6 py-4">{{ ucfirst($car->car_type) }}</td>
                                <td class="px-6 py-4">{{ ucfirst($car->fuel_type) }}</td>
                                <td class="px-6 py-4">${{ $car->price_per_day }}</td>
                                <td class="px-6 py-4">
                                    @if ($car->available)
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Available</span>
                                    @else
                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Unavailable</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.cars.show', $car) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                                        View
                                    </a>
                                    <a href="{{ route('admin.cars.edit', $car) }}" class="text-green-600 hover:text-green-800">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-gray-500">No cars found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
@endsection 