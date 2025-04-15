@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section flex items-center justify-center text-center text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">Affordable Car Rentals <br>For Students</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">Weekend trips, campus moves, or spontaneous adventures. We've got wheels for every student budget.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('cars.index') }}" class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-3 px-8 rounded-full text-lg transition duration-300">
                    Browse Cars
                </a>
                <a href="{{ route('about') }}" class="bg-white text-primary-800 hover:bg-gray-100 font-bold py-3 px-8 rounded-full text-lg transition duration-300">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Student Benefits Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-3">Why Students Choose Us</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Everything you need for a hassle-free rental experience at student-friendly prices.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-md transition duration-300">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Student Discounts</h3>
                    <p class="text-gray-600">Valid student ID gets you extra savings on every rental.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-md transition duration-300">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Quick Booking</h3>
                    <p class="text-gray-600">Reserve your car in minutes with our easy online system.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-md transition duration-300">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fully Insured</h3>
                    <p class="text-gray-600">All cars come with comprehensive insurance coverage.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-md transition duration-300">
                    <div class="bg-primary-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                    <p class="text-gray-600">Help is always just a call or message away.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Popular Student Picks</h2>
                    <p class="text-gray-600">Most booked cars for weekend getaways and road trips</p>
                </div>
                <a href="{{ route('cars.index') }}" class="text-primary-600 hover:text-primary-800 font-semibold flex items-center">
                    View All Cars 
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($featuredCars as $car)
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                        <img src="{{ $car->image ? asset('storage/' . $car->image) : 'https://via.placeholder.com/350x200?text=No+Image' }}" 
                            alt="{{ $car->name }}" class="w-full h-56 object-cover">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="text-xl font-bold">{{ $car->name }}</h3>
                                <span class="bg-primary-600 text-white px-3 py-1 rounded-full text-sm font-medium">₹{{ $car->price_per_day }}/day</span>
                            </div>
                            <p class="text-gray-600 mb-4">{{ $car->model }}</p>
                            <div class="flex flex-wrap items-center text-gray-500 text-sm mb-5 gap-y-2">
                                <div class="flex items-center mr-4">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-5M5 12h14"></path>
                                    </svg>
                                    {{ ucfirst($car->fuel_type) }}
                                </div>
                                <div class="flex items-center mr-4">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    {{ ucfirst($car->car_type) }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    {{ $car->seats }} Seats
                                </div>
                            </div>
                            <a href="{{ route('cars.show', $car) }}" class="block w-full bg-primary-600 hover:bg-primary-700 text-white text-center py-3 rounded-full font-medium transition duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-8">
                        <p class="text-gray-500">No cars available at the moment. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Student Testimonial Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-3">What Students Say</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Hear from fellow students who've used our services</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="text-accent-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"Perfect for weekend trips! The pricing is student-friendly and the booking process is super easy. Will definitely rent again for our next beach trip."</p>
                    <div class="flex items-center">
                        <div class="mr-3 bg-primary-100 text-primary-700 rounded-full w-10 h-10 flex items-center justify-center font-bold">
                            JS
                        </div>
                        <div>
                            <p class="font-medium">Tarun Mathur</p>
                            <p class="text-sm text-gray-500">Biology Major</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="text-accent-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"Saved me during move-out day! When I couldn't fit everything in my car, I rented an SUV and it made moving so much easier. The staff were super helpful too."</p>
                    <div class="flex items-center">
                        <div class="mr-3 bg-primary-100 text-primary-700 rounded-full w-10 h-10 flex items-center justify-center font-bold">
                            MT
                        </div>
                        <div>
                            <p class="font-medium">Vikash Kumar</p>
                            <p class="text-sm text-gray-500">Computer Science</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="text-accent-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"My friends and I rented a car for a road trip during spring break and had an amazing experience. The prices are reasonable and the cars are well-maintained."</p>
                    <div class="flex items-center">
                        <div class="mr-3 bg-primary-100 text-primary-700 rounded-full w-10 h-10 flex items-center justify-center font-bold">
                            AL
                        </div>
                        <div>
                            <p class="font-medium">Nitin Sharma</p>
                            <p class="text-sm text-gray-500">Psychology Student</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 bg-primary-600 text-white text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Ready for Your Next Adventure?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Whether it's a weekend getaway, a campus move, or a spontaneous road trip with friends, we've got you covered.</p>
            <a href="{{ route('register') }}" class="bg-white text-primary-700 hover:bg-gray-100 font-bold py-3 px-8 rounded-full text-lg inline-block transition duration-300">
                Sign Up Here!
            </a>
        </div>
    </section>
@endsection 