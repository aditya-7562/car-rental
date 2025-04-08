@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <!-- About Hero Section -->
    <div class="relative py-16 bg-blue-600">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">About Us</h1>
            <p class="text-xl max-w-3xl mx-auto">Learn more about our commitment to providing exceptional car rental services.</p>
        </div>
    </div>

    <!-- Our Story Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-12">
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold mb-6">Our Story</h2>
                    <p class="mb-4 text-gray-700">
                        Founded in 2020, PJ Rentals began with a simple mission: to provide high-quality car rentals with exceptional customer service. What started as a small fleet of just three cars has grown into one of the most trusted car rental services in the region.
                    </p>
                    <p class="mb-4 text-gray-700">
                        Our founder, JasVinder Singh, noticed a gap in the market for reliable, transparent car rental services. After experiencing frustration with hidden fees and poor customer service from other rental companies, Jassi decided to create a better alternative.
                    </p>
                    <p class="text-gray-700">
                        Today, PJ Rentals operates a diverse fleet of over 35 vehicles, ranging from economical compact cars to luxury SUVs and sports cars. We continue to adhere to our core values of transparency, reliability, and customer satisfaction in everything we do.
                    </p>
                </div>
                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1560179707-f14e90ef3623?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                         alt="Our company building" class="w-full h-full object-cover rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-8">Our Mission</h2>
            <p class="text-xl max-w-3xl mx-auto mb-12 text-gray-700">
                To provide our customers with safe, reliable, and convenient car rental services that enhance their travel experiences.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Safety First</h3>
                    <p class="text-gray-600">We maintain all our vehicles to the highest standards and conduct regular safety inspections.</p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Transparent Pricing</h3>
                    <p class="text-gray-600">No hidden fees or surprises. We believe in clear, upfront pricing for all our rental services.</p>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="bg-blue-100 w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Customer Satisfaction</h3>
                    <p class="text-gray-600">We go above and beyond to ensure our customers have the best possible rental experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Leadership Team</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                         alt="JasVinder Singh - CEO" class="w-40 h-40 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-semibold">JasVinder Singh</h3>
                    <p class="text-blue-600 mb-3">Founder & CEO</p>
                    <p class="text-gray-600 max-w-xs mx-auto">Jassi founded PJ Rentals with a vision to transform the car rental industry.</p>
                </div>
                
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                         alt="Sarah Johnson - COO" class="w-40 h-40 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-semibold">Aman Singh</h3>
                    <p class="text-blue-600 mb-3">Chief Operations Officer</p>
                    <p class="text-gray-600 max-w-xs mx-auto">Aman oversees all operational aspects of our business, ensuring smooth service delivery.</p>
                </div>
                
                <div class="text-center">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" 
                         alt="Michael Brown - CTO" class="w-40 h-40 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="text-xl font-semibold">Anurag Singh</h3>
                    <p class="text-blue-600 mb-3">Chief Technology Officer</p>
                    <p class="text-gray-600 max-w-xs mx-auto">Anurag leads our technology initiatives, focusing on enhancing the customer experience through innovation.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 bg-blue-600 text-white text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Join Our Journey</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Experience the PJ Rentals difference today. Book a car and be part of our growing family of satisfied customers.</p>
            <a href="{{ route('register') }}" class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-6 rounded-md text-lg transition duration-300">
                Get Started Now
            </a>
        </div>
    </section>
@endsection