<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Menampilkan semua testimonial
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.index', compact('testimonials')); 
    }

    // Menampilkan form untuk menambah testimonial
    public function create()
    {
        // Cek apakah pengguna sudah memiliki testimonial
        if (auth()->user()->testimonial) {
            return redirect()->route('testimonials.index')->with('error', 'You can only submit one testimonial.');
        }

        return view('testimonials.create');
    }

    // Menyimpan testimonial baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'content' => 'required|string|max:1000',
            'author' => 'required|string|max:255',
        ]);

        // Menyimpan testimonial ke database
        Testimonial::create([
            'content' => $request->content,
            'author' => $request->author,
            'user_id' => auth()->id(), // Menambahkan user_id yang terhubung dengan pengguna yang sedang login
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit testimonial
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Pastikan hanya pengguna yang membuat testimonial yang bisa mengeditnya
        if ($testimonial->user_id != auth()->id()) {
            return redirect()->route('testimonials.index')->with('error', 'You are not authorized to edit this testimonial.');
        }

        return view('testimonials.edit', compact('testimonial'));
    }

    // Memperbarui testimonial
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'author' => 'required|string|max:255',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update([
            'content' => $request->content,
            'author' => $request->author,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil diperbarui!');
    }

    // Menghapus testimonial
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Pastikan hanya pengguna yang membuat testimonial yang bisa menghapusnya
        if ($testimonial->user_id != auth()->id()) {
            return redirect()->route('testimonials.index')->with('error', 'You are not authorized to delete this testimonial.');
        }

        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus!');
    }
}
