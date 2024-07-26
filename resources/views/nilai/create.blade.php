<!DOCTYPE html>
<html>
<head>
    <title>Tambah Nilai</title>
     <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" type="image/svg+xml">

    <style>
        body {
            font-size: 12px;
            background-color: black;
            color: white;
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            justify-content: space-between;
            overflow-x: hidden; /* Mencegah scroll horizontal */
        }

        .form-container, .info-container {
            flex: 1;
            padding: 10px;
            margin: 10px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid;
            border-image-slice: 1;
            border-width: 2px;
            animation: borderAnim 2s infinite;
            overflow: auto; /* Menambahkan scroll pada form jika diperlukan */
        }

        @keyframes borderAnim {
            0% { border-color: red; }
            50% { border-color: white; }
            100% { border-color: red; }
        }

        .draggable {
            position: fixed;
            top: 10px; /* Posisi awal top */
            right: 10px; /* Posisi awal right */
            cursor: move;
            background: rgba(0, 0, 0, 0.8);
            border: 1px solid #999;
            padding: 5px;
            z-index: 1000;
            width: 200px; /* Menentukan lebar */
            height: auto; /* Menentukan tinggi otomatis */
        }

        label, input, button, a {
            display: block;
            margin: 2px 0;
        }

        input, button {
            padding: 4px;
        }

        a {
            color: lightblue;
            text-decoration: none;
            padding: 4px;
            border: 1px solid lightblue;
            display: inline-block;
            margin-top: 10px;
        }

        a:hover {
            background: lightblue;
            color: black;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Nilai</h1>

        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required><br>

            @for ($i = 1; $i <= 14; $i++)
                <label for="A{{ $i }}">A{{ $i }}:</label>
                <input type="number" name="A{{ $i }}" required><br>
            @endfor

            <button type="submit">Simpan</button>
        </form>

        <a href="{{ url('/') }}">Kembali</a>
    </div>

    <div class="info-container draggable" id="draggable">
        <h3>Kriteria Penilaian</h3>
        <p><strong>Aspek Kecerdasan</strong></p>
        <p>Penguasaan Web Programming (A1)<br>
        Penguasaan UI dan UX (A2)<br>
        Kreatif (A3)<br>
        Logika (A4)<br>
        Inovatif (A5)</p>
        <p><strong>Aspek Target Kerja</strong></p>
        <p>Komitmen (A6)<br>
        Fokus (A7)<br>
        Terukur (A8)</p>
        <p><strong>Aspek Sikap Kerja</strong></p>
        <p>Jujur (A9)<br>
        Teliti dan Bertanggung Jawab (A10)<br>
        Disiplin (A11)<br>
        Kemampuan Berkomunikasi (A12)<br>
        Kerja Sama (A13)<br>
        Percaya Diri (A14)</p>
    </div>

    <script>
        // Drag and Drop functionality
        dragElement(document.getElementById("draggable"));

        function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            elmnt.onmousedown = dragMouseDown;

            function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                document.onmousemove = elementDrag;
            }

            function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
            }

            function closeDragElement() {
                document.onmouseup = null;
                document.onmousemove = null;
            }
        }
    </script>
</body>
</html>
