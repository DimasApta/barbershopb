@extends('layouts.app')

@section('title', 'Your Bookings')

@section('content')
<div class="container">
    <h1>Your Bookings</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($bookings->isEmpty())
    <div class="text-center">
        <p class="fs-5">You have no bookings at the moment.</p>
        <a href="{{ route('bookings.create') }}" class="btn btn-lg btn-primary shadow-lg" style="background-color: #d4af37; border: none;">
            <i class="bi bi-calendar-check-fill"></i> Book Now
        </a>
    </div>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Service</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->service->name }} - ${{ $booking->service->price }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->booking_time }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-warning shadow-sm">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</div>
@endsection
