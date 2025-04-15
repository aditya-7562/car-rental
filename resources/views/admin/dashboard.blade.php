@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Admin Dashboard Header -->
    <div class="relative py-10 bg-blue-700">
        <div class="container mx-auto px-4 text-white">
            <h1 class="text-3xl font-bold mb-2">Admin Dashboard</h1>
            <p class="text-lg">Manage cars, bookings, and users from a central location.</p>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
            <!-- Stats Card - Users -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                    <span class="p-2 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </span>
                </div>
                <h2 class="text-3xl font-bold">{{ $totalUsers }}</h2>
                <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">View All Users</a>
            </div>
            
            <!-- Stats Card - Cars -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Cars</h3>
                    <span class="p-2 bg-green-100 rounded-full">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </span>
                </div>
                <h2 class="text-3xl font-bold">{{ $totalCars }}</h2>
                <a href="{{ route('admin.cars.index') }}" class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">View All Cars</a>
            </div>
            
            <!-- Stats Card - Bookings -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Bookings</h3>
                    <span class="p-2 bg-purple-100 rounded-full">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </span>
                </div>
                <h2 class="text-3xl font-bold">{{ $totalBookings }}</h2>
                <a href="{{ route('admin.bookings.index') }}" class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">View All Bookings</a>
            </div>
            
            <!-- Stats Card - Pending Bookings -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Pending Bookings</h3>
                    <span class="p-2 bg-yellow-100 rounded-full">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                </div>
                <h2 class="text-3xl font-bold">{{ $pendingBookings }}</h2>
                <a href="{{ route('admin.bookings.index', ['status' => 'pending']) }}" class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">View Pending Bookings</a>
            </div>
            
            <!-- Stats Card - Unread Messages -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Unread Messages</h3>
                    <span class="p-2 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </span>
                </div>
                <h2 class="text-3xl font-bold">{{ $unreadMessages }}</h2>
                <a href="{{ route('admin.messages.index', ['status' => 'unread']) }}" class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">View Unread Messages</a>
            </div>
        </div>
        
        <!-- Recent Bookings -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="bg-gray-50 px-6 py-4 border-b">
                <h3 class="text-xl font-semibold">Recent Bookings</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-700">
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">User</th>
                            <th class="px-6 py-3">Car</th>
                            <th class="px-6 py-3">Dates</th>
                            <th class="px-6 py-3">Total</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($recentBookings as $booking)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">#{{ $booking->id }}</td>
                                <td class="px-6 py-4">{{ $booking->user->name }}</td>
                                <td class="px-6 py-4">{{ $booking->car->name }}</td>
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
                                    <a href="{{ route('admin.bookings.show', $booking) }}" class="text-blue-600 hover:text-blue-800">View Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">No bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-6 py-3 border-t">
                <a href="{{ route('admin.bookings.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All Bookings</a>
            </div>
        </div>
        
        <!-- Recent Messages -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
            <div class="bg-gray-50 px-6 py-4 border-b">
                <h3 class="text-xl font-semibold">Recent Contact Messages</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-700">
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Subject</th>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($recentMessages as $message)
                            <tr class="hover:bg-gray-50 {{ !$message->isRead() ? 'bg-blue-50' : '' }}">
                                <td class="px-6 py-4">{{ $message->name }}</td>
                                <td class="px-6 py-4">{{ $message->email }}</td>
                                <td class="px-6 py-4">{{ Str::limit($message->subject, 30) }}</td>
                                <td class="px-6 py-4">{{ $message->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4">
                                    @if ($message->isRead())
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Read</span>
                                    @else
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Unread</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.messages.show', $message) }}" class="text-blue-600 hover:text-blue-800">View Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">No messages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-6 py-3 border-t">
                <a href="{{ route('admin.messages.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">View All Messages</a>
            </div>
        </div>
        
        <!-- Quick Links -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">User Management</h3>
                <p class="text-gray-600 mb-4">View and manage user accounts, check user details and booking history.</p>
                <a href="{{ route('admin.users.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Manage Users
                </a>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Car Management</h3>
                <p class="text-gray-600 mb-4">Add, edit, or remove cars from your fleet. Update car details and availability.</p>
                <a href="{{ route('admin.cars.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Manage Cars
                </a>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Booking Management</h3>
                <p class="text-gray-600 mb-4">View all bookings, update booking statuses, and manage reservations.</p>
                <a href="{{ route('admin.bookings.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Manage Bookings
                </a>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Contact Messages</h3>
                <p class="text-gray-600 mb-4">View and respond to customer inquiries and support requests.</p>
                <a href="{{ route('admin.messages.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Manage Messages
                </a>
            </div>
        </div>
    </div>
@endsection 