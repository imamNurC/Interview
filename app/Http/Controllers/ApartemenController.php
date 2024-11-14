<?php

namespace App\Http\Controllers;

use App\Models\Apartemen;
use Illuminate\Http\Request;

class ApartemenController extends Controller
{
    public function index()
    {
        $apartemens = Apartemen::all();
        return view('apartemen.index', compact('apartemens'));
    }

    // Menampilkan form untuk menambahkan apartemen baru
    public function create()
    {
        return view('apartemen.create');
    }

    // Menyimpan apartemen baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nomor_apartemen' => 'required|string|max:255',
            'lantai' => 'required|integer',
            'status' => 'required|in:tersedia,terisi,maintenance',
        ]);

        Apartemen::create($request->all());
        return redirect()->route('apartemen.index')->with('success', 'Apartemen berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengupdate apartemen
    public function edit($id)
    {
        $apartemen = Apartemen::findOrFail($id);
        return view('apartemen.edit', compact('apartemen'));
    }

    // Mengupdate apartemen
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_apartemen' => 'required|string|max:255',
            'lantai' => 'required|integer',
            'status' => 'required|in:tersedia,terisi,maintenance',
        ]);

        $apartemen = Apartemen::findOrFail($id);
        $apartemen->update($request->all());
        return redirect()->route('apartemen.index')->with('success', 'Apartemen berhasil diperbarui!');
    }

    // Menghapus apartemen
    public function destroy($id)
    {
        $apartemen = Apartemen::findOrFail($id);
        $apartemen->delete();
        return redirect()->route('apartemen.index')->with('success', 'Apartemen berhasil dihapus!');
    }

    public function daftarApartemenPenghuni()
    {
        // Mengambil semua apartemen beserta penghuni yang tinggal di dalamnya
        $apartemens = Apartemen::with('penghuni')->get();  // Mengambil relasi penghuni pada setiap apartemen

        return view('apartemen_penghuni.index', compact('apartemens'));
    }
}
