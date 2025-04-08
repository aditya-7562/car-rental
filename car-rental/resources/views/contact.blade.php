@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <!-- Contact Hero Section -->
    <div class="relative py-16 bg-primary-600">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Contact Us</h1>
            <p class="text-xl max-w-3xl mx-auto">Need help with your booking or have questions? We're here for you!</p>
        </div>
    </div>

    <!-- Contact Information and Form Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Contact Information -->
                <div class="lg:w-1/3">
                    <h2 class="text-2xl font-bold mb-6">Get in Touch</h2>
                    
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-2">Campus Location</h3>
                        <address class="text-gray-700 not-italic">
                            Rajeev Pg, Chaheru<br>
                            Law gate road, JALANDHAR<br>
                            PUNJAB 144411, India
                        </address>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-2">Contact Information</h3>
                        <p class="text-gray-700 mb-2">
                            <strong>Phone:</strong> <a href="tel:+1234567890" class="hover:text-primary-600">(123) 456-7890</a>
                        </p>
                        <p class="text-gray-700 mb-2">
                            <strong>Email:</strong> <a href="mailto:campus@pjrentals.com" class="hover:text-primary-600">campus@pjrentals.com</a>
                        </p>
                        <p class="text-gray-700 mb-2">
                            <strong>Student Support:</strong> <a href="tel:+1234567899" class="hover:text-primary-600">(123) 456-7899</a>
                        </p>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold mb-2">Office Hours</h3>
                        <p class="text-gray-700 mb-1">Monday - Friday: 9:00 AM - 9:00 PM</p>
                        <p class="text-gray-700 mb-1">Saturday: 10:00 AM - 6:00 PM</p>
                        <p class="text-gray-700">Sunday: 12:00 PM - 5:00 PM</p>
                        <p class="text-gray-700 mt-3 text-sm italic">*Extended hours available during finals week and move-in/move-out periods</p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-700 hover:text-primary-600" aria-label="Facebook">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-700 hover:text-primary-600" aria-label="Twitter">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-700 hover:text-primary-600" aria-label="Instagram">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-700 hover:text-primary-600" aria-label="TikTok">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V15a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="lg:w-2/3 bg-white p-8 rounded-xl shadow-sm">
                    <h2 class="text-2xl font-bold mb-6">Send Us a Message</h2>
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                            <p class="font-bold">Please correct the following errors:</p>
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" 
                                    required>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" 
                                    required>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" 
                                required>
                        </div>
                        
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                            <textarea id="message" name="message" rows="6" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" 
                                required>{{ old('message') }}</textarea>
                        </div>
                        
                        <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-6 rounded-full transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4">Find Us on Campus</h2>
            <p class="text-center text-gray-600 max-w-3xl mx-auto mb-8">Our campus office is conveniently located near the University Student Center. Free parking is available for customers in the visitor's parking lot.</p>
            
            <div id="map" class="h-96 bg-gray-300 rounded-lg shadow-md"></div>
            
            <div class="mt-4 text-center">
                <a href="#" id="view-larger-map" target="_blank" class="inline-flex items-center text-primary-600 hover:text-primary-700">
                    <span>View Larger Map</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<!-- Replace YOUR_API_KEY with your actual Google Maps API key -->
<!-- To get an API key: 
     1. Go to https://console.cloud.google.com/
     2. Create a project
     3. Enable the Maps JavaScript API
     4. Create credentials (API key)
     5. Add restrictions to your API key for security
-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcwXnpUd_GmQGJ0Ec7O4Je4h49XD67UZo&callback=initMap" defer></script>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of campus office (replace with actual coordinates for 123 College Ave)
        const campusLocation = { lat: 31.261576567985113, lng: 75.7033946826409 };
        // 31.261576567985113, 75.7033946826409// Example coordinates for university area
        // The map, centered at campus location
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: campusLocation,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.TOP_RIGHT,
            },
            streetViewControl: true,
            fullscreenControl: true,
            zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER,
            },
            scaleControl: true,
            rotateControl: true,
            styles: [
                {
                    featureType: "poi.business",
                    elementType: "labels",
                    stylers: [{ visibility: "on" }]
                },
                {
                    featureType: "poi.school",
                    elementType: "labels",
                    stylers: [{ visibility: "on" }]
                }
            ]
        });
        
        // The marker, positioned at campus location
        const marker = new google.maps.Marker({
            position: campusLocation,
            map: map,
            title: "PJ Rentals",
            animation: google.maps.Animation.DROP
        });
        
        // Define the full address for copy functionality
        const fullAddress = "Rajeev Pg, Chaheru, Law gate road, JALANDHAR, PUNJAB 144411, India";
        
        // Info window with additional details
        const infoWindow = new google.maps.InfoWindow({
            content: `
                <div class="p-3">
                    <h3 class="font-bold text-lg mb-1">PJ Rentals</h3>
                    <p class="mb-1">Rajeev Pg, Chaheru</p>
                    <p class="mb-1">Law gate road, JALANDHAR</p>
                    <p class="mb-1">PUNJAB 144411, India</p>
                    <p class="mt-2">
                        <a href="tel:+1234567890" class="text-blue-600 hover:underline">(123) 456-7890</a>
                    </p>
                    <p>
                        <a href="mailto:campus@pjrentals.com" class="text-blue-600 hover:underline">campus@pjrentals.com</a>
                    </p>
                    <p class="mt-2 text-sm text-gray-600">Student support available 7 days a week</p>
                    <div class="mt-3 flex flex-wrap gap-2">
                        <a href="https://www.google.com/maps/dir/?api=1&destination=${campusLocation.lat},${campusLocation.lng}" target="_blank" class="bg-blue-600 text-white px-4 py-2 rounded inline-block hover:bg-blue-700 text-sm font-medium">Get Directions</a>
                        <button onclick="navigator.clipboard.writeText('${fullAddress}').then(() => alert('Address copied to clipboard!'))" class="bg-gray-600 text-white px-4 py-2 rounded inline-block hover:bg-gray-700 text-sm font-medium">Copy Address</button>
                    </div>
                </div>
            `
        });
        
        // Open info window when marker is clicked
        marker.addListener("click", () => {
            infoWindow.open({
                anchor: marker,
                map,
            });
        });
        
        // Open info window by default
        infoWindow.open({
            anchor: marker,
            map,
        });
        
        // Set the View Larger Map link
        document.getElementById('view-larger-map').href = `https://www.google.com/maps/search/?api=1&query=${campusLocation.lat},${campusLocation.lng}`;
    }
</script>
@endsection 