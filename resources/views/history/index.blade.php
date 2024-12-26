@extends('layouts.app')

@section('title', 'History')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Booking History</h1>
    @if($bookings->isEmpty())
        <p>You have no booking history yet.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Booking Date</th>
                    <th>Booking Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->service }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->booking_time }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
