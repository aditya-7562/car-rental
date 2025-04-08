@extends('layouts.app')

@section('title', 'Terms and Conditions')

@section('content')
    <!-- Terms Hero Section -->
    <div class="relative py-16 bg-blue-600">
        <div class="container mx-auto px-4 text-center text-white">
            <h1 class="text-4xl font-bold mb-4">Terms and Conditions</h1>
            <p class="text-xl max-w-3xl mx-auto">Please read these terms carefully before using our services.</p>
        </div>
    </div>

    <!-- Terms Content Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <div class="mb-10">
                    <h2 class="text-2xl font-bold mb-4">1. Acceptance of Terms</h2>
                    <p class="text-gray-700 mb-4">
                        By accessing or using the RentMyRide website and services, you agree to be bound by these Terms and Conditions. If you do not agree to all the terms and conditions, you must not use our services.
                    </p>
                </div>

                <div class="mb-10">
                    <h2 class="text-2xl font-bold mb-4">2. Rental Eligibility</h2>
                    <p class="text-gray-700 mb-4">
                        To rent a vehicle from RentMyRide, you must:
                    </p>
                    <ul class="list-disc pl-8 mb-4 text-gray-700 space-y-2">
                        <li>Be at least 21 years of age</li>
                        <li>Possess a valid driver's license that has been held for at least one year</li>
                        <li>Present a valid credit or debit card in your name for payment</li>
                        <li>Meet our insurance and credit requirements</li>
                    </ul>
                    <p class="text-gray-700">
                        RentMyRide reserves the right to refuse service to anyone who does not meet these requirements.
                    </p>
                </div>

                <div class="mb-10">
                    <h2 class="text-2xl font-bold mb-4">3. Reservation and Cancellation</h2>
                    <p class="text-gray-700 mb-4">
                        Reservations can be made through our website, mobile app, or by contacting our customer service team. A valid credit card is required to secure all reservations.
                    </p>
                    <p class="text-gray-700 mb-4">
                        <strong>Cancellation Policy:</strong>
                    </p>
                    <ul class="list-disc pl-8 mb-4 text-gray-700 space-y-2">
                        <li>Cancellations made more than 48 hours before the pickup time will receive a full refund.</li>
                        <li>Cancellations made between 24-48 hours before the pickup time will incur a fee of 25% of the total rental cost.</li>
                        <li>Cancellations made less than 24 hours before the pickup time will incur a fee of 50% of the total rental cost.</li>
                        <li>No-shows will be charged the full rental amount.</li>
                    </ul>
                </div>

                <div class="mb-10">
                    <h2 class="text-2xl font-bold mb-4">4. Vehicle Pickup and Return</h2>
                    <p class="text-gray-700 mb-4">
                        The vehicle must be picked up and returned at the agreed-upon location, date, and time as specified in the rental agreement. Late returns will be subject to additional charges.
                    </p>
                    <p class="text-gray-700 mb-4">
                        Upon pickup, the renter must inspect the vehicle for any existing damage and report it immediately. Failure to report pre-existing damage may result in the renter being held responsible for such damage upon return.
                    </p>
                </div>

                <div class="mb-10">
                    <h2 class="text-2xl font-bold mb-4">5. Usage Restrictions</h2>
                    <p class="text-gray-700 mb-4">
                        The rental vehicle must not be used:
                    </p>
                    <ul class="list-disc pl-8 mb-4 text-gray-700 space-y-2">
                        <li>For any illegal purpose</li>
                        <li>To transport hazardous materials</li>
                        <li>To push or tow another vehicle</li>
                        <li>In a race or competition</li>
                        <li>By a driver under the influence of alcohol, drugs, or any intoxicating substance</li>
                        <li>By any person not listed as an authorized driver in the rental agreement</li>
                        <li>Outside the designated geographic area specified in the rental agreement</li>
                    </ul>
                    <p class="text-gray-700">
                        Violation of these restrictions may result in the termination of the rental agreement, additional charges, and the forfeiture of all insurance coverage.
                    </p>
                </div>

                <div class="mb-10">
                    <h2 class="text-2xl font-bold mb-4">6. Insurance and Liability</h2>
                    <p class="text-gray-700 mb-4">
                        Basic insurance coverage is included in the rental fee. However, the renter is responsible for any damage to the vehicle not covered by the insurance policy, up to the amount of the deductible.
                    </p>
                    <p class="text-gray-700 mb-4">
                        Additional insurance options are available for purchase at the time of reservation or pickup.
                    </p>
                    <p class="text-gray-700">
                        The renter is fully responsible for any traffic violations, parking tickets, or other fines incurred during the rental period.
                    </p>
                </div>

                <div class="mb-10">
                    <h2 class="text-2xl font-bold mb-4">7. Privacy Policy</h2>
                    <p class="text-gray-700 mb-4">
                        RentMyRide collects and processes personal data in accordance with our Privacy Policy. By using our services, you consent to our data practices as described in the Privacy Policy.
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold mb-4">8. Modifications to Terms</h2>
                    <p class="text-gray-700 mb-4">
                        RentMyRide reserves the right to modify these Terms and Conditions at any time. Updated terms will be posted on our website, and the changes will be effective immediately upon posting.
                    </p>
                    <p class="text-gray-700">
                        It is the user's responsibility to check these Terms and Conditions periodically for changes.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Have Questions?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto text-gray-700">
                If you have any questions about our Terms and Conditions, please contact our customer service team.
            </p>
            <a href="{{ route('contact') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md text-lg transition duration-300">
                Contact Us
            </a>
        </div>
    </section>
@endsection 