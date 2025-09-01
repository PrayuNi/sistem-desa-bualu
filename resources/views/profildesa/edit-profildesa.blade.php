<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Desa</title>
</head>
<body>
     <!-- 2.1 tempat untuk menambahkan data enctype-->
    <form action="{{ route('profildesa.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Sambutan Bendesa:</label>
    <input type="text" name="sambutan_bendesa" id="sambutan_bendesa" placeholder="Isi sambutan"> <br>

    <label>Sejarah Desa:</label>
    <input type="text" name="sejarah_desa" id="sejarah_desa" placeholder="Isi sejarah"> <br>

    <label>Visi Desa:</label>
    <input type="text" name="visi_desa" id="visi_desa" placeholder="Isi visi"> <br>

    <label>Misi Desa:</label>
    <input type="text" name="misi_desa" id="misi_desa" placeholder="Isi misi"> <br>

    <!-- 2.2 untuk ubah tipe data input ke file >> 2.3 Di Structure Controller -->
    <label>Gambar:</label>
    <input type="file" name="image" id="image">
    <button type="submit">Simpan</button>
</form>
</body>
</html>