<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data APBD</title>
</head>
<body>
     <!-- 2.1 tempat untuk menambahkan data enctype-->
    <form action="{{ route('dataapbd.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Pendapatan:</label>
    <input type="number" name="pendapatan" id="pendapatan" placeholder="Isi jumlah"> <br>

    <label>Pengeluaran:</label>
    <input type="number" name="pengeluaran" id="pengeluaran" placeholder="Isi jumlah"> <br>

    <label>Belanja:</label>
    <input type="number" name="belanja" id="belanja" placeholder="Isi jumlah"> <br>

    <label>Surplus/Defisit:</label>
    <input type="number" name="surplus_defisit" id="surplus_defisit" placeholder="Isi jumlah"> <br>

    <!-- 2.2 untuk ubah tipe data input ke file >> 2.3 Di Structure Controller -->
    <label>file APBD:</label>
    <input type="file" name="pdf" id="pdf" accept="application/pdf">
    <button type="submit">Simpan</button>
</form>
</body>
</html>