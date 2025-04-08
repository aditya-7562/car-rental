@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
    <!-- Admin Header -->
    <div class="relative py-10 bg-blue-700">
        <div class="container mx-auto px-4 text-white">
            <h1 class="text-3xl font-bold mb-2">User Management</h1>
            <p class="text-lg">View and manage all registered users.</p>
        </div>
    </div>

    <!-- User Management Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-700">
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Phone</th>
                            <th class="px-6 py-3">Driver License</th>
                            <th class="px-6 py-3">Registered On</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($users as $user)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">#{{ $user->id }}</td>
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4">{{ $user->phone_number }}</td>
                                <td class="px-6 py-4">{{ $user->driver_license }}</td>
                                <td class="px-6 py-4">{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.users.show', $user) }}" class="text-blue-600 hover:text-blue-800">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection 