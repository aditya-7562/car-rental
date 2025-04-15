<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PJ Rentals - @yield('title', 'Car Rentals for Students')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        accent: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            200: '#fde68a',
                            300: '#fcd34d',
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                            700: '#b45309',
                            800: '#92400e',
                            900: '#78350f',
                        },
                    },
                },
                fontFamily: {
                    sans: ['Poppins', 'sans-serif'],
                }
            }
        }
    </script>
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            height: 600px;
        }
    </style>
    
    <!-- Additional Styles -->
    @yield('styles')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Admin Bar - Only visible to admins -->
    <!-- @auth
        @if(Auth::user()->is_admin)
            <div class="bg-gray-900 text-white">
                <div class="container mx-auto px-4 py-2">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <span class="font-semibold mr-4">Admin Panel</span>
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white mr-4">Dashboard</a>
                            <a href="{{ route('admin.users.index') }}" class="text-gray-300 hover:text-white mr-4">Users</a>
                            <a href="{{ route('admin.cars.index') }}" class="text-gray-300 hover:text-white mr-4">Cars</a>
                            <a href="{{ route('admin.bookings.index') }}" class="text-gray-300 hover:text-white mr-4">Bookings</a>
                            <a href="{{ route('admin.messages.index') }}" class="text-gray-300 hover:text-white">Messages
                                @php
                                    $unreadCount = \App\Models\ContactMessage::whereNull('read_at')->count();
                                @endphp
                                @if($unreadCount > 0)
                                    <span class="bg-red-500 text-white rounded-full text-xs px-1.5 py-0.5 ml-1">{{ $unreadCount }}</span>
                                @endif
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">
                                <span>Exit Admin</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth -->

    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-2xl font-bold text-primary-600">
                    {{ config('app.name', 'RentMyRide') }}
                </a>
                
                <!-- Navigation Links - Desktop -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-600 font-medium">Home</a>
                    <a href="{{ route('cars.index') }}" class="text-gray-700 hover:text-primary-600 font-medium">Our Cars</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary-600 font-medium">About Us</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-600 font-medium">Contact</a>
                </div>
                
                <!-- Authentication Links - Desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-primary-600 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="px-5 py-2 bg-primary-600 text-white rounded-full hover:bg-primary-700 font-medium transition duration-300">Register</a>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-gray-700 hover:text-primary-600 font-medium">
                                {{ Auth::user()->name }}
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('bookings.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Bookings</a>
                                @if(Auth::user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Admin Dashboard</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-primary-600">Home</a>
                <a href="{{ route('cars.index') }}" class="block py-2 text-gray-700 hover:text-primary-600">Our Cars</a>
                <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-primary-600">About Us</a>
                <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-primary-600">Contact</a>
                
                @guest
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('login') }}" class="block py-2 text-gray-700 hover:text-primary-600">Login</a>
                        <a href="{{ route('register') }}" class="block py-2 text-gray-700 hover:text-primary-600">Register</a>
                    </div>
                @else
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('bookings.index') }}" class="block py-2 text-gray-700 hover:text-primary-600">My Bookings</a>
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}" class="block py-2 text-gray-700 hover:text-primary-600">Admin Dashboard</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left py-2 text-gray-700 hover:text-primary-600">Logout</button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
    
    <!-- Flash Messages -->
    @if (session('success'))
        <div class="container mx-auto px-4 mt-4">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md shadow-sm" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif
    
    @if (session('error'))
        <div class="container mx-auto px-4 mt-4">
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md shadow-sm" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif
    
    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">{{ config('app.name', 'PJ Rentals') }}</h3>
                    <p class="text-gray-400">Affordable car rentals for students. Perfect for weekend trips, vacations, or just getting around campus. No hidden fees, just easy driving.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="{{ route('cars.index') }}" class="text-gray-400 hover:text-white">Our Cars</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="{{ route('terms') }}" class="text-gray-400 hover:text-white">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Car Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('cars.index', ['car_type' => 'sedan']) }}" class="text-gray-400 hover:text-white">Sedan</a></li>
                        <li><a href="{{ route('cars.index', ['car_type' => 'suv']) }}" class="text-gray-400 hover:text-white">SUV</a></li>
                        <li><a href="{{ route('cars.index', ['car_type' => 'luxury']) }}" class="text-gray-400 hover:text-white">Luxury</a></li>
                        <li><a href="{{ route('cars.index', ['car_type' => 'sport']) }}" class="text-gray-400 hover:text-white">Sport</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <address class="text-gray-400 not-italic">
                        Rajeev Pg, Chaheru<br>
                        Law gate road, JALANDHAR<br>
                        PUNJAB 144411, India<br>
                        <a href="tel:+1234567890" class="hover:text-white">Phone: 9780512489</a><br>
                        <a href="mailto:campus@pjrentals.com" class="hover:text-white">Email: info@pjrentals.in</a>
                    </address>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'PJ Rentals') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Mobile Menu JavaScript -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    
    <!-- Additional Scripts -->
    @yield('scripts')
</body>
</html> 