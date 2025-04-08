@extends('layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="container px-6 mx-auto">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">
        Contact Messages
    </h2>

    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <form action="{{ route('admin.messages.index') }}" method="GET" class="flex items-center">
                    <div class="mr-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Filter by Status</label>
                        <select id="status" name="status" class="rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                            <option value="all" {{ request('status') == 'all' || !request('status') ? 'selected' : '' }}>All Messages</option>
                            <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                            <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                        </select>
                    </div>
                    <button type="submit" class="inline-flex items-center mt-6 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Filter
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($messages as $message)
                        <tr class="{{ $message->isRead() ? '' : 'bg-blue-50' }}">
                            <td class="py-3 px-4">{{ $message->name }}</td>
                            <td class="py-3 px-4">{{ $message->email }}</td>
                            <td class="py-3 px-4">{{ Str::limit($message->subject, 30) }}</td>
                            <td class="py-3 px-4">{{ $message->created_at->format('M d, Y H:i') }}</td>
                            <td class="py-3 px-4">
                                @if($message->isRead())
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Read
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Unread
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.messages.show', $message) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                
                                @if(!$message->isRead())
                                    <form action="{{ route('admin.messages.read', $message) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-green-600 hover:text-green-900 mr-3">
                                            Mark as Read
                                        </button>
                                    </form>
                                @endif
                                
                                <form action="{{ route('admin.messages.delete', $message) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-6 px-4 text-center text-gray-500">
                                No messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection 