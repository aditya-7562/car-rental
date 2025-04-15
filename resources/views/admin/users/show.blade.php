@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <!-- Admin Header -->
    <div class="relative py-10 bg-blue-700">
        <div class="container mx-auto px-4 text-white">
            <h1 class="text-3xl font-bold mb-2">User Details</h1>
            <p class="text-lg">View detailed information about {{ $user->name }}.</p>
        </div>
    </div>

    <!-- User Details Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- User Information -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">User Information</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-col gap-4">
                            <div>
                                <p class="text-sm text-gray-600 mb-1">User ID</p>
                                <p class="font-semibold">#{{ $user->id }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Name</p>
                                <p class="font-semibold">{{ $user->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Email</p>
                                <p class="font-semibold">{{ $user->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Phone Number</p>
                                <p class="font-semibold">{{ $user->phone_number }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Driver License</p>
                                <p class="font-semibold">{{ $user->driver_license }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Address</p>
                                <p class="font-semibold">{{ $user->address }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Registered On</p>
                                <p class="font-semibold">{{ $user->created_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Action Links -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">Actions</h3>
                    </div>
                    <div class="p-6">
                        <a href="{{ route('admin.users.index') }}" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold text-center py-2 px-4 rounded mb-3">
                            Back to All Users
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- User Bookings -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b">
                        <h3 class="text-xl font-semibold">Booking History</h3>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead class="bg-gray-50">
                                <tr class="text-left text-gray-700">
                                    <th class="px-6 py-3">ID</th>
                                    <th class="px-6 py-3">Car</th>
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
                                            <a href="{{ route('admin.cars.show', $booking->car) }}" class="text-blue-600 hover:text-blue-800">
                                                {{ $booking->car->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $booking->pickup_date->format('M d, Y') }} to {{ $booking->return_date->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4">${{ $booking->total_price }}</td>
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
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No bookings found for this user</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 