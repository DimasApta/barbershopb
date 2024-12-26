@extends('layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="container">
        <h2>Edit Testimonial</h2>

        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $testimonial->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $testimonial->author) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Testimonial</button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
