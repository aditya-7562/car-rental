@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-center mb-6">Create an Account</h1>
                
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p class="font-bold">Please correct the following errors:</p>
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required autofocus>
                    </div>
                    
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="phone_number" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="driver_license" class="block text-gray-700 font-medium mb-2">Driver License Number</label>
                        <input type="text" id="driver_license" name="driver_license" value="{{ old('driver_license') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" id="password" name="password" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" 
                            required>
                    </div>
                    
                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                        <label for="terms" class="ml-2 block text-gray-700">
                            I agree to the <a href="{{ route('terms') }}" class="text-blue-600 hover:text-blue-800">Terms and Conditions</a>
                        </label>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-md transition duration-300">
                        Register
                    </button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-700">
                        Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection 