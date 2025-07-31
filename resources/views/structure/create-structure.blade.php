<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Desa</title>
</head>
<body>
    <!-- 2.1 tempat untuk menambahkan data enctype-->
    <form action="{{ route('structure.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" id="name" placeholder="Isi name"> <br>

    <label>Jabatan:</label>
    <input type="text" name="position" id="position" placeholder="Isi jabatan"> <br>

    <!-- 2.2 untuk ubah tipe data input ke file >> 2.3 Di Structure Controller -->
    <label>Gambar:</label>
    <input type="file" name="image" id="image">
    <button type="submit">Simpan</button>
</form>
</body>
</html>