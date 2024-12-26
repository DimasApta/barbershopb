@extends('layouts.app')

@section('title', 'Home - BarberShop')

@section('content')
    <div class="hero bg-dark text-white text-center py-5" style="background-image: url('https://example.com/your-image.jpg'); background-size: cover;">
        <div class="container">
            <h1>Welcome to BarberShop</h1>
            <p>Your go-to place for quality haircuts and grooming services</p>
            <a href="{{ route('services.index') }}" class="btn btn-warning btn-lg">See Our Services</a>
        </div>
    </div>

    <!-- Featured Services Section -->
    <section class="services py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://example.com/service1.jpg" class="card-img-top" alt="Service 1">
                        <div class="card-body">
                            <h5 class="card-title">Haircuts</h5>
                            <p class="card-text">Get a fresh new look with our expert barbers.</p>
                            <a href="{{ route('services.index') }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://example.com/service2.jpg" class="card-img-top" alt="Service 2">
                        <div class="card-body">
                            <h5 class="card-title">Shaving</h5>
                            <p class="card-text">Experience a smooth shave with precision.</p>
                            <a href="{{ route('services.index') }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://example.com/service3.jpg" class="card-img-top" alt="Service 3">
                        <div class="card-body">
                            <h5 class="card-title">Beard Grooming</h5>
                            <p class="card-text">Maintain your beard with our professional care.</p>
                            <a href="{{ route('services.index') }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promotions Section -->
    <section class="promotions py-5">
        <div class="container text-center">
            <h2>Special Offers</h2>
            <p>Get 10% off your first booking when you register today!</p>
            <a href="{{ route('bookings.create') }}" class="btn btn-warning btn-lg">Book Now</a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">What Our Clients Say</h2>
            <div class="row">
                @foreach ($testimonials as $testimonial)
                    <div class="col-md-4">
                        <blockquote>
                            "{{ $testimonial->content }}"
                            <footer>- {{ $testimonial->author }}</footer>
                        </blockquote>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


