@extends('layouts.app')

@section('title', 'Manage Bookings')

@section('content')
    <!-- Admin Header -->
    <div class="relative py-10 bg-blue-700">
        <div class="container mx-auto px-4 text-white">
            <h1 class="text-3xl font-bold mb-2">Booking Management</h1>
            <p class="text-lg">View and manage all car bookings in the system.</p>
        </div>
    </div>

    <!-- Booking Management Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Filtering Options -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h3 class="text-lg font-semibold mb-4">Filter Bookings</h3>
            
            <form action="{{ route('admin.bookings.index') }}" method="GET" class="flex flex-wrap gap-4 items-end">
                <div class="w-64">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Apply Filters
                </button>
                
                <a href="{{ route('admin.bookings.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                    Reset Filters
                </a>
            </form>
        </div>
        
        <!-- Bookings Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-700">
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">User</th>
                            <th class="px-6 py-3">Car</th>
                            <th class="px-6 py-3">Pickup Date</th>
                            <th class="px-6 py-3">Return Date</th>
                            <th class="px-6 py-3">Total Price</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Created At</th>
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
                                    <a href="{{ route('admin.cars.show', $booking->car) }}" class="text-blue-600 hover:text-blue-800">
                                        {{ $booking->car->name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">{{ $booking->pickup_date->format('M d, Y') }}</td>
                                <td class="px-6 py-4">{{ $booking->return_date->format('M d, Y') }}</td>
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
                                <td class="px-6 py-4">{{ $booking->created_at->format('M d, Y H:i') }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.bookings.show', $booking) }}" class="text-blue-600 hover:text-blue-800 mr-3">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-4 text-center text-gray-500">No bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4">
                {{ $bookings->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection 