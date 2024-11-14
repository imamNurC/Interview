<?php

namespace App\Http\Controllers;

use App\Models\Apartemen;
use App\Models\Penghuni;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PenghuniController extends Controller
{
    // Menampilkan semua penghuni
    public function index()
    {
        $penghunis = Penghuni::all();
        return view('penghuni.index', compact('penghunis'));
    }

    // Menampilkan form untuk menambahkan penghuni baru
    public function create()
    {
        $apartemens = Apartemen::all();
        return view('penghuni.create', compact('apartemens'));
    }

    // Menyimpan penghuni baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'apart_id' => 'required|exists:apartemens,id',
            // 'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'jenis_kelamin' => 'required|in:pria,wanita',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        // Menghitung umur berdasarkan tanggal lahir
        $dob = Carbon::parse($request->tanggal_lahir);
        $age = $dob->age;

        // Menyimpan penghuni baru
        Penghuni::create([
            'nama' => $request->nama,
            'apart_id' => $request->apart_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $age,
            'status' => $request->status,
        ]);

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil ditambahkan!');
    }


    // Menampilkan form untuk mengupdate penghuni
    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $apartemens = Apartemen::all();

        // Pastikan tanggal lahir adalah objek Carbon
        $penghuni->tanggal_lahir = Carbon::parse($penghuni->tanggal_lahir);

        return view('penghuni.edit', compact('penghuni', 'apartemens'));
    }



    // Mengupdate penghuni
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'apart_id' => 'required|exists:apartemens,id',
            'jenis_kelamin' => 'required|in:pria,wanita',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        $penghuni = Penghuni::findOrFail($id);

        // Menghitung umur berdasarkan tanggal lahir
        $dob = Carbon::parse($request->tanggal_lahir);
        $age = $dob->age;

        // Update data penghuni
        $penghuni->update([
            'nama' => $request->nama,
            'apart_id' => $request->apart_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $age,
            'status' => $request->status,
        ]);

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil diperbarui!');
    }

    // Menghapus penghuni
    public function destroy($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        $penghuni->delete();
        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil dihapus!');
    }
}
