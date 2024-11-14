<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use Illuminate\Http\Request;

class ParkirController extends Controller
{


    // tembak fungsi ini dengan post method
    public function hitungBiaya(Request $request)
    {
        // Mendapatkan data JSON dari request
        $data = $request->input('data');

        $result = [];

        foreach ($data as $item) {
            $biaya = $this->hitungBiayaParkir($item['kendaraan'], $item['waktu_parkir']);

            Parkir::create([
                'nopol' => $item['nopol'],
                'kendaraan' => $item['kendaraan'],
                'waktu_parkir' => $item['waktu_parkir'],
            ]);
            // Menyimpan hasil perhitungan ke array result
            $result[] = [
                'nopol' => $item['nopol'],
                'kendaraan' => $item['kendaraan'],
                'waktu_parkir' => $item['waktu_parkir'],
                'biaya' => $biaya
            ];
        }

        return response()->json($result);
    }

    private function str() {}
    // Method untuk mendapatkan data biaya parkir yang telah dihitung
    public function getBiayaParkir()
    {
        // Mengambil semua data parkir yang sudah dihitung dan disimpan di database
        $parkirs = Parkir::all();

        // Format data dalam bentuk array untuk response
        $result = [];

        foreach ($parkirs as $item) {
            $biaya = $this->hitungBiayaParkir($item['kendaraan'], $item['waktu_parkir']);

            // Menyimpan hasil perhitungan ke array result
            $result[] = [
                'nopol' => $item['nopol'],
                'kendaraan' => $item['kendaraan'],
                'waktu_parkir' => $item['waktu_parkir'],
                'biaya' => $biaya
            ];
        }

        return response()->json($result);
    }

    private function hitungBiayaParkir($kendaraan, $waktu_parkir)
    {
        // Tarif dasar
        $tarif_masuk_motor = 2000;
        $tarif_masuk_mobil = 5000;
        $tarif_parkir_motor_perjam = 2000;
        $tarif_parkir_mobil_perjam = 3000;
        $diskon = 5000;

        // Menentukan biaya berdasarkan jenis kendaraan
        if ($kendaraan == 'motor') {
            $biaya_masuk = $tarif_masuk_motor;
            $tarif_per_jam = $tarif_parkir_motor_perjam;
        } else {
            $biaya_masuk = $tarif_masuk_mobil;
            $tarif_per_jam = $tarif_parkir_mobil_perjam;
        }

        // Menghitung biaya parkir
        $wp = $waktu_parkir - 1;
        $biaya_parkir = $biaya_masuk + ($wp * $tarif_per_jam);

        // Diskon untuk parkir >= 5 jam
        if ($waktu_parkir >= 5) {
            $kelipatan_diskon = floor($waktu_parkir / 5);
            $biaya_parkir -= $kelipatan_diskon * $diskon;
        }

        // Memastikan biaya tidak melebihi batas maksimal 15 jam
        if ($waktu_parkir > 15) {
            $waktu_parkir = 15;
        }

        return $biaya_parkir;
    }
}
