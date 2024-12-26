<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class HistoryController extends Controller
{
    /**
     * Display a listing of the booking history.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $bookings = Booking::where('user_id', $user->id)
            ->orderBy('booking_date', 'desc')
            ->orderBy('booking_time', 'desc')
            ->get();

        return view('history.index', compact('bookings'));
    }
}
