@extends('layouts.app')

@section('title', 'Testimonials - BarberShop')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">What Our Clients Say</h2>
        
        <!-- Menampilkan pesan sukses atau error -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tombol untuk menambah testimonial hanya jika pengguna sudah login dan belum memiliki testimonial -->
        @if (auth()->check() && !auth()->user()->testimonial)
            <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Add Testimonial</a>
        @endif

        <!-- Menampilkan semua testimonial -->
        <div class="row">
            @foreach ($testimonials as $testimonial)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p class="mb-0">{{ $testimonial->content }}</p>
                                <footer class="blockquote-footer mt-3" style="font-size: 1.1rem; font-weight: 600;">
                                    {{ $testimonial->author }}
                                </footer>
                            </blockquote>

                            <!-- Tombol Edit dan Delete hanya jika pengguna adalah pemilik testimonial -->
                            @if(auth()->check() && auth()->id() == $testimonial->user_id)
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
