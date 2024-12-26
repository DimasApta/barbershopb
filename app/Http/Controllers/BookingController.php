<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar booking aktif (mendatang) pengguna.
     */
    public function index()
    {
        $bookings = Booking::with('service')
            ->where('user_id', Auth::id())
            ->where('booking_date', '>=', now()) // Booking yang masih berlaku
            ->orderBy('booking_date', 'asc')
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Menampilkan form untuk membuat booking baru.
     */
    public function create()
    {
        $services = Service::all(); // Ambil semua layanan tersedia
        return view('bookings.create', compact('services'));
    }

    /**
     * Menyimpan booking baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id', // Validasi ID layanan
            'booking_date' => 'required|date|after_or_equal:today', // Tanggal harus valid dan minimal hari ini
            'booking_time' => 'required', // Waktu booking wajib diisi
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
        ]);

        // Redirect ke bookings.index setelah berhasil
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibuat!');
    }

    /**
     * Menghapus booking berdasarkan ID.
     */
    public function destroy($id)
    {
        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $booking->delete();

        // Redirect ke bookings.index setelah penghapusan
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibatalkan.');
    }

    public function edit($id)
    {
        // Cari booking berdasarkan ID dan user yang login
        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Ambil semua layanan untuk ditampilkan dalam dropdown
        $services = Service::all();

        return view('bookings.edit', compact('booking', 'services'));
    }

    /**
     * Memperbarui data booking di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
        ]);

        $booking = Booking::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $booking->update([
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui.');
    }
}

