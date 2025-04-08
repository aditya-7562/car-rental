<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $featuredCars = Car::where('available', true)
            ->take(6)
            ->get();
            
        return view('home', [
            'featuredCars' => $featuredCars
        ]);
    }

    /**
     * Display the about us page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the terms and conditions page.
     */
    public function terms()
    {
        return view('terms');
    }

    /**
     * Display the contact us page.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Store contact form data.
     */
    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store the contact message in the database
        ContactMessage::create($validated);

        return back()->with('success', 'Your message has been sent. We will get back to you soon!');
    }
}
