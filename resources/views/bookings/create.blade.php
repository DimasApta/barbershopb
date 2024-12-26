@extends('layouts.app')

@section('title', 'Book an Appointment')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Book an Appointment</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="service_id" class="form-label">Choose a Service</label>
            <select class="form-select" id="service_id" name="service_id" required>
                <option selected disabled value="">Choose a service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} - ${{ $service->price }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="booking_date" class="form-label">Date</label>
            <input 
                type="date" 
                class="form-control" 
                id="booking_date" 
                name="booking_date" 
                required 
                min="{{ \Carbon\Carbon::today()->toDateString() }}">
        </div>

        <div class="mb-3">
            <label for="booking_time" class="form-label">Time</label>
            <input 
                type="time" 
                class="form-control" 
                id="booking_time" 
                name="booking_time" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Confirm Booking</button>
    </form>
</div>
@endsection
