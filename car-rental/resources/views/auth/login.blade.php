@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-center mb-6">Login</h1>
                
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p>{{ $errors->first() }}</p>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required autofocus>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" id="password" name="password" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required>
                    </div>
                    
                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-gray-700">Remember me</label>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-300">
                        Login
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-700">
                        Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Register now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection 