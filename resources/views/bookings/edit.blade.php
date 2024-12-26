@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Booking</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input.</strong><br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="service_id" class="form-label">Service</label>
            <select class="form-select" id="service_id" name="service_id" required>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ $booking->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="booking_date" class="form-label">Date</label>
            <input type="date" class="form-control" id="booking_date" name="booking_date" required 
                value="{{ $booking->booking_date }}" min="{{ \Carbon\Carbon::today()->toDateString() }}">
        </div>

        <div class="mb-3">
            <label for="booking_time" class="form-label">Time</label>
            <input type="time" class="form-control" id="booking_time" name="booking_time" required 
                value="{{ $booking->booking_time }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Booking</button>
        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
