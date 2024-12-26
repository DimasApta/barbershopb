@extends('layouts.app')

@section('title', 'Services - BarberShop')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Our Services</h1>
        
        <div class="row">
            <!-- Haircut Service -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Haircut">
                    <div class="card-body">
                        <h5 class="card-title">Haircut</h5>
                        <p class="card-text">Get a fresh new look with our professional haircut services. We offer a variety of styles to suit your preferences.</p>
                        <p class="text-muted">Starting from $15</p>
                    </div>
                </div>
            </div>

            <!-- Beard Trim Service -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Beard Trim">
                    <div class="card-body">
                        <h5 class="card-title">Beard Trim</h5>
                        <p class="card-text">Keep your beard sharp and neat with our beard trimming services. We shape and define your beard to perfection.</p>
                        <p class="text-muted">Starting from $10</p>
                    </div>
                </div>
            </div>

            <!-- Shave Service -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Shave">
                    <div class="card-body">
                        <h5 class="card-title">Shave</h5>
                        <p class="card-text">Experience the classic shave with our expert barbers. Enjoy a smooth and comfortable shave with hot towels.</p>
                        <p class="text-muted">Starting from $20</p>
                    </div>
                </div>
            </div>

            <!-- Hair Styling Service -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Hair Styling">
                    <div class="card-body">
                        <h5 class="card-title">Hair Styling</h5>
                        <p class="card-text">Get your hair styled for any occasion. Whether it's a casual look or something more formal, we've got you covered.</p>
                        <p class="text-muted">Starting from $25</p>
                    </div>
                </div>
            </div>

            <!-- Facial Treatment Service -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Facial Treatment">
                    <div class="card-body">
                        <h5 class="card-title">Facial Treatment</h5>
                        <p class="card-text">Relax and rejuvenate with our facial treatments designed to refresh your skin and make you feel great.</p>
                        <p class="text-muted">Starting from $30</p>
                    </div>
                </div>
            </div>

            <!-- Hair Color Service -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Hair Color">
                    <div class="card-body">
                        <h5 class="card-title">Hair Color</h5>
                        <p class="card-text">Want to change your look? Try our professional hair coloring service with a variety of colors to choose from.</p>
                        <p class="text-muted">Starting from $50</p>
                    </div>
                </div>
            </div>

            <!-- Hot Towel Shave Service -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Hot Towel Shave">
                    <div class="card-body">
                        <h5 class="card-title">Hot Towel Shave</h5>
                        <p class="card-text">Indulge in a relaxing hot towel shave, leaving your skin smooth and refreshed after a luxurious shave experience.</p>
                        <p class="text-muted">Starting from $25</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
