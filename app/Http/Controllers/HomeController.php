<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua testimonial dari database
        $testimonials = Testimonial::all();

        // Kirim data testimonial ke view home
        return view('home', compact('testimonials'));
    }
}
