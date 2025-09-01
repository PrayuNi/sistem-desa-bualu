<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Surat</title>
</head>
<body>
    <!-- 2.1 tempat untuk menambahkan data enctype-->
    <form action="{{ route('pengajuansurat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" id="name" placeholder="Isi name"> <br>

    <label>NIK:</label>
    <input type="text" name="nik" id="nik" placeholder="Isi No KTP"> <br>

    <label>Jenis Surat:</label>
    <input type="text" name="jenis_surat" id="jenis_surat" placeholder="Isi Jenis Surat Yang Diperlukan"> <br>

    <label>No Whatsapp:</label>
    <input type="text" name="no-whatsapp" id="no_whatsapp" placeholder="Isi No Whatsapp"> <br>

    <label>Tanggal Pengajuan:</label>
    <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder=""> <br>

    <label>Status:</label>
    <input type="text" name="status" id="status" placeholder=""> <br>


    <!-- 2.2 untuk ubah tipe data input ke file >> 2.3 Di Structure Controller -->
    <label>Gambar:</label>
    <input type="file" name="image" id="image">
    <button type="submit">Simpan</button>
</form>
</body>
</html>