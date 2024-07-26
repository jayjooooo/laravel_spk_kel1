<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::all();
        // Nilai Standar yang diterapkan untuk menilai kandidat
        $nilaiStandar = [
            'A1' => 4, 'A2' => 4, 'A3' => 3, 'A4' => 3, 'A5' => 3,
            'A6' => 3, 'A7' => 3, 'A8' => 3, 'A9' => 4, 'A10' => 4,
            'A11' => 4, 'A12' => 4, 'A13' => 3, 'A14' => 3
        ];
        // Pembobotan Nilai GAP

        $pembobotan = [
            0 => 5,
            1 => 4.5,
            -1 => 4,
            2 => 3.5,
            -2 => 3,
            3 => 2.5,
            -3 => 2,
            4 => 1.5,
            -4 => 1,
        ];

        // untuk konversi nilai ke bobot 
        $data = $nilai->map(function ($item) use ($nilaiStandar, $pembobotan) {
            $gaps = [];
            $bobotNilai = [];
            foreach ($nilaiStandar as $key => $value) {
                $gap = $item->$key - $value;
                $gaps[$key] = $gap;

                // Pastikan nilai gap ada dalam array pembobotan
                if (array_key_exists($gap, $pembobotan)) {
                    $bobotNilai[$key] = $pembobotan[$gap];
                } else {
                    $bobotNilai[$key] = 0; // nilai default lainnya
                }
            }
            $item->gaps = $gaps;
            $item->bobotNilai = $bobotNilai;

            // Hitung CF dan SF (ini tidak terpakai karena error, jadi perhitungan ada di views nilai/index.blade.php)
            $item->cf_kecerdasan = ($bobotNilai['A1'] + $bobotNilai['A2'] + $bobotNilai['A4']) / 3;
            $item->sf_kecerdasan = ($bobotNilai['A3'] + $bobotNilai['A5']) / 2;

            $item->cf_target_kerja = ($bobotNilai['A6'] + $bobotNilai['A8']) / 2;
            $item->sf_target_kerja = $bobotNilai['A7'];

            $item->cf_sikap_kerja = ($bobotNilai['A9'] + $bobotNilai['A10'] + $bobotNilai['A12'] + $bobotNilai['A14']) / 4;
            $item->sf_sikap_kerja = ($bobotNilai['A11'] + $bobotNilai['A13']) / 2;

            return $item;
        });

        return view('nilai.index', compact('data', 'nilaiStandar', 'pembobotan'));
    }

    public function create()
    {
        return view('nilai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'A1' => 'required|integer',
            'A2' => 'required|integer',
            'A3' => 'required|integer',
            'A4' => 'required|integer',
            'A5' => 'required|integer',
            'A6' => 'required|integer',
            'A7' => 'required|integer',
            'A8' => 'required|integer',
            'A9' => 'required|integer',
            'A10' => 'required|integer',
            'A11' => 'required|integer',
            'A12' => 'required|integer',
            'A13' => 'required|integer',
            'A14' => 'required|integer',
        ]);

        Nilai::create($request->all());

        return redirect('/')->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilai.edit', compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'A1' => 'required|integer',
            'A2' => 'required|integer',
            'A3' => 'required|integer',
            'A4' => 'required|integer',
            'A5' => 'required|integer',
            'A6' => 'required|integer',
            'A7' => 'required|integer',
            'A8' => 'required|integer',
            'A9' => 'required|integer',
            'A10' => 'required|integer',
            'A11' => 'required|integer',
            'A12' => 'required|integer',
            'A13' => 'required|integer',
            'A14' => 'required|integer',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());

        return redirect('/')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect('/')->with('success', 'Nilai berhasil dihapus.');
    }
}
