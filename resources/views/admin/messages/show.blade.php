@extends('layouts.app')

@section('title', 'Contact Message Details')

@section('content')
<div class="container px-6 mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">
            Contact Message Details
        </h2>
        <div class="flex space-x-2">
            <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Back to Messages
            </a>
            
            @if(!$message->isRead())
                <form action="{{ route('admin.messages.read', $message) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-800 focus:outline-none focus:border-green-800 focus:ring ring-green-200 disabled:opacity-25 transition ease-in-out duration-150">
                        Mark as Read
                    </button>
                </form>
            @endif
            
            <form action="{{ route('admin.messages.delete', $message) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-800 focus:ring ring-red-200 disabled:opacity-25 transition ease-in-out duration-150">
                    Delete
                </button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="p-6">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ $message->subject }}</h3>
                    <p class="text-sm text-gray-600">From: {{ $message->name }} ({{ $message->email }})</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">{{ $message->created_at->format('M d, Y H:i') }}</p>
                    @if($message->isRead())
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Read {{ $message->read_at->format('M d, Y H:i') }}
                        </span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Unread
                        </span>
                    @endif
                </div>
            </div>

            <div class="mt-6 border-t border-gray-200 pt-6">
                <div class="prose max-w-none">
                    <p class="text-gray-800 whitespace-pre-line">{{ $message->message }}</p>
                </div>
            </div>

            <div class="mt-6 border-t border-gray-200 pt-6">
                <h4 class="text-md font-medium text-gray-900 mb-2">Quick Reply</h4>
                <div class="flex items-center space-x-2">
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-200 disabled:opacity-25 transition ease-in-out duration-150">
                        Reply via Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 