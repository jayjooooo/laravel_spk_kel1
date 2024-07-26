<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Nilai;

class ProfileMatchingController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $nilai = Nilai::all();
        return view('profile_matching.index', compact('kriteria', 'nilai'));
    }

    public function calculate()
    {
        // Implementasi logika perhitungan profile matching
        $kriteria = Kriteria::all();
        $nilai = Nilai::all();

        // Contoh perhitungan
        $results = [];
        foreach ($nilai as $n) {
            $total = 0;
            foreach ($kriteria as $k) {
                $total += $n[$k->nama] * $k->bobot;
            }
            $results[] = [
                'nama' => $n->nama,
                'total' => $total
            ];
        }

        usort($results, function ($a, $b) {
            return $b['total'] <=> $a['total'];
        });

        return view('profile_matching.result', compact('results'));
    }
}
