<!DOCTYPE html>
<html>
<head>
    <title>Profile Matching</title>
     <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" type="image/svg+xml">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: black;
            color: white;
        }
        .matrix {
            background-color: black;
            color: lime;
            font-family: 'Courier New', Courier, monospace;
            animation: matrixEffect 60s linear infinite;
        }
        @keyframes matrixEffect {
            0% {background-position: 0 0;}
            100% {background-position: 100% 100%;}
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(0, 0, 0, 0.8);
        }
        th, td {
            border: 1px solid #730202;
            padding: 8px;
            text-align: center;
            background-color: rgba(139, 0, 0, 0.6);
        }
        th {
            background-color: #a40000;
        }
        .aspek-header {
            background-color: #870202;
            font-weight: bold;
        }
        .highlight {
            background-color: #ff1c1c;
            border: 2px solid red;
        }
        a {
            color: #ff6347;
        }
        div {
            color: #ffb6c1;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ff6347;
            background-color: rgba(139, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <h1 contenteditable="true" id="editableTitle" class="editable">Pencarian Anggota Tim Design Web Itechno</h1>

    <script>
        function saveTitle() {
            var title = document.getElementById('editableTitle').innerText;
            alert("Title saved as: " + title);
            // Add AJAX call to send 'title' to server here if needed
        }
    </script>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('nilai.create') }}">Tambah Data</a>

    <h2>Kriteria Penilaian</h2>
    <h3>Aspek Kecerdasan</h3>
    <ul>
        <li>Penguasaan Web Programming (A1)</li>
        <li>Penguasaan UI dan UX (A2)</li>
        <li>Kreatif (A3)</li>
        <li>Logika (A4)</li>
        <li>Inovatif (A5)</li>
    </ul>

    <h3>Aspek Target Kerja</h3>
    <ul>
        <li>Komitmen (A6)</li>
        <li>Fokus (A7)</li>
        <li>Terukur (A8)</li>
    </ul>

    <h3>Aspek Sikap Kerja</h3>
    <ul>
        <li>Jujur (A9)</li>
        <li>Teliti dan Bertanggung Jawab (A10)</li>
        <li>Disiplin (A11)</li>
        <li>Kemampuan Berkomunikasi (A12)</li>
        <li>Kerja Sama (A13)</li>
        <li>Percaya Diri (A14)</li>
    </ul>
    <h2> Nilai Awal </h2></h2>
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">Nama</th>
                <th colspan="5" class="aspek-header">Aspek Kecerdasan</th>
                <th colspan="3" class="aspek-header">Aspek Target Kerja</th>
                <th colspan="6" class="aspek-header">Aspek Sikap Kerja</th>
                <th rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th>A1</th>
                <th>A2</th>
                <th>A3</th>
                <th>A4</th>
                <th>A5</th>
                <th>A6</th>
                <th>A7</th>
                <th>A8</th>
                <th>A9</th>
                <th>A10</th>
                <th>A11</th>
                <th>A12</th>
                <th>A13</th>
                <th>A14</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $n)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $n->nama }}</td>
                    <td>{{ $n->A1 }}</td>
                    <td>{{ $n->A2 }}</td>
                    <td>{{ $n->A3 }}</td>
                    <td>{{ $n->A4 }}</td>
                    <td>{{ $n->A5 }}</td>
                    <td>{{ $n->A6 }}</td>
                    <td>{{ $n->A7 }}</td>
                    <td>{{ $n->A8 }}</td>
                    <td>{{ $n->A9 }}</td>
                    <td>{{ $n->A10 }}</td>
                    <td>{{ $n->A11 }}</td>
                    <td>{{ $n->A12 }}</td>
                    <td>{{ $n->A13 }}</td>
                    <td>{{ $n->A14 }}</td>
                    <td>
                        <a href="{{ route('nilai.edit', $n->id) }}">Edit</a>
                        <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Pemetaan GAP</h2>
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">Nama</th>
                <th colspan="5" class="aspek-header">Aspek Kecerdasan</th>
                <th colspan="3" class="aspek-header">Aspek Target Kerja</th>
                <th colspan="6" class="aspek-header">Aspek Sikap Kerja</th>
            </tr>
            <tr>
                <th>A1</th>
                <th>A2</th>
                <th>A3</th>
                <th>A4</th>
                <th>A5</th>
                <th>A6</th>
                <th>A7</th>
                <th>A8</th>
                <th>A9</th>
                <th>A10</th>
                <th>A11</th>
                <th>A12</th>
                <th>A13</th>
                <th>A14</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>Nilai Standar</td>
                @foreach($nilaiStandar as $nilai)
                    <td>{{ $nilai }}</td>
                @endforeach
            </tr>
            @foreach($data as $index => $n)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $n->nama }}</td>
                    @foreach($n->gaps as $gap)
                        <td>{{ $gap }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Pembobotan Nilai GAP</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Selisih</th>
                <th>Bobot Nilai</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>0</td>
                <td>5</td>
                <td>Tidak ada selisih (Kompetensi sesuai yang dibutuhkan)</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1</td>
                <td>4.5</td>
                <td>Kompetensi individu kelebihan 1 tingkat/level</td>
            </tr>
            <tr>
                <td>3</td>
                <td>-1</td>
                <td>4</td>
                <td>Kompetensi individu kekurangan 1 tingkat/level</td>
            </tr>
            <tr>
                <td>4</td>
                <td>2</td>
                <td>3.5</td>
                <td>Kompetensi individu kelebihan 2 tingkat/level</td>
            </tr>
            <tr>
                <td>5</td>
                <td>-2</td>
                <td>3</td>
                <td>Kompetensi individu kekurangan 2 tingkat/level</td>
            </tr>
            <tr>
                <td>6</td>
                <td>3</td>
                <td>2.5</td>
                <td>Kompetensi individu kelebihan 3 tingkat/level</td>
            </tr>
            <tr>
                <td>7</td>
                <td>-3</td>
                <td>2</td>
                <td>Kompetensi individu kekurangan 3 tingkat/level</td>
            </tr>
            <tr>
                <td>8</td>
                <td>4</td>
                <td>1.5</td>
                <td>Kompetensi individu kelebihan 4 tingkat/level</td>
            </tr>
            <tr>
                <td>9</td>
                <td>-4</td>
                <td>1</td>
                <td>Kompetensi individu kekurangan 4 tingkat/level</td>
            </tr>
        </tbody>
    </table>

    <h2>Konversi Nilai ke Bobot</h2>
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">Nama</th>
                <th colspan="5" class="aspek-header">Aspek Kecerdasan</th>
                <th colspan="3" class="aspek-header">Aspek Target Kerja</th>
                <th colspan="6" class="aspek-header">Aspek Sikap Kerja</th>
            </tr>
            <tr>
                <th>A1</th>
                <th>A2</th>
                <th>A3</th>
                <th>A4</th>
                <th>A5</th>
                <th>A6</th>
                <th>A7</th>
                <th>A8</th>
                <th>A9</th>
                <th>A10</th>
                <th>A11</th>
                <th>A12</th>
                <th>A13</th>
                <th>A14</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $n)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $n->nama }}</td>
                    @foreach($n->bobotNilai as $bobot)
                        <td>{{ $bobot }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Core Factor dan Secondary Factor</h2>
    <table>
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">Nama</th>
                <th colspan="2" class="aspek-header">Aspek Kecerdasan</th>
                <th colspan="2" class="aspek-header">Aspek Target Kerja</th>
                <th colspan="2" class="aspek-header">Aspek Sikap Kerja</th>
            </tr>
            <tr>
                <th>CF</th>
                <th>SF</th>
                <th>CF</th>
                <th>SF</th>
                <th>CF</th>
                <th>SF</th>
            </tr>
        </thead>
        <tbody>
            // lanjutan perhitungan nilai dari controller tadi (untuk perhitungan core factor dan secondary factor)
            @foreach($data as $index => $n)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $n->nama }}</td>
                    <td>{{ ($n->bobotNilai['A1'] + $n->bobotNilai['A2'] + $n->bobotNilai['A4']) / 3 }}</td>
                    <td>{{ ($n->bobotNilai['A3'] + $n->bobotNilai['A5']) / 2 }}</td>
                    <td>{{ ($n->bobotNilai['A6'] + $n->bobotNilai['A8']) / 2 }}</td>
                    <td>{{ $n->bobotNilai['A7'] }}</td>
                    <td>{{ ($n->bobotNilai['A9'] + $n->bobotNilai['A10'] + $n->bobotNilai['A12'] + $n->bobotNilai['A14']) / 4 }}</td>
                    <td>{{ ($n->bobotNilai['A11'] + $n->bobotNilai['A13']) / 2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <h2>Perhitungan Nilai Total</h2>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Kecerdasan</th>
                <th>Target Kerja</th>
                <th>Sikap</th>
            </tr>
        </thead>
        <tbody>
            // lanjutan perhitungan langsung untuk perhitungan nilai total
            @foreach($data as $index => $n)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $n->nama }}</td>
                    <td>{{ (0.6 * ($n->bobotNilai['A1'] + $n->bobotNilai['A2'] + $n->bobotNilai['A4']) / 3) + (0.4 * ($n->bobotNilai['A3'] + $n->bobotNilai['A5']) / 2) }}</td>
                    <td>{{ (0.6 * ($n->bobotNilai['A6'] + $n->bobotNilai['A8']) / 2) + (0.4 * $n->bobotNilai['A7']) }}</td>
                    <td>{{ (0.6 * ($n->bobotNilai['A9'] + $n->bobotNilai['A10'] + $n->bobotNilai['A12'] + $n->bobotNilai['A14']) / 4) + (0.4 * ($n->bobotNilai['A11'] + $n->bobotNilai['A13']) / 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Perangkingan</h2>
    @php
        $ranking = $data->map(function ($n) {
            $nk = (0.6 * ($n->bobotNilai['A1'] + $n->bobotNilai['A2'] + $n->bobotNilai['A4']) / 3) + (0.4 * ($n->bobotNilai['A3'] + $n->bobotNilai['A5']) / 2);
            $nt = (0.6 * ($n->bobotNilai['A6'] + $n->bobotNilai['A8']) / 2) + (0.4 * $n->bobotNilai['A7']);
            $ns = (0.6 * ($n->bobotNilai['A9'] + $n->bobotNilai['A10'] + $n->bobotNilai['A12'] + $n->bobotNilai['A14']) / 4) + (0.4 * ($n->bobotNilai['A11'] + $n->bobotNilai['A13']) / 2);
            $ha = (0.2 * $nk) + (0.5 * $nt) + (0.3 * $ns);
            return [
                'nama' => $n->nama,
                'nk' => $nk,
                'nt' => $nt,
                'ns' => $ns,
                'ha' => $ha,
            ];
        });
        $highestRank = $ranking->max('ha');
    @endphp
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NK</th>
                <th>NT</th>
                <th>NS</th>
                <th>HA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranking as $rank)
                <tr @if($rank['ha'] == $highestRank) class="highlight" @endif>
                    <td>{{ $rank['nama'] }}</td>
                    <td>{{ number_format($rank['nk'], 2) }}</td>
                    <td>{{ number_format($rank['nt'], 2) }}</td>
                    <td>{{ number_format($rank['ns'], 2) }}</td>
                    <td>{{ number_format($rank['ha'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
