@extends('layouts.app')

@section('title', 'Add Testimonial - BarberShop')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Add Testimonial</h2>

        <!-- Form untuk menambah testimonial -->
        <form action="{{ route('testimonials.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Testimonial Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit Testimonial</button>
        </form>
    </div>
@endsection
