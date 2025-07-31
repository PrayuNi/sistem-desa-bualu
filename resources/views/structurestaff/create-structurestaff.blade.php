<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Staff</title>
</head>
<body>
     <form action="{{ route('structurestaff.store') }}" method="POST">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" id="name" placeholder="Isi name"> <br>

    <label>Jabatan:</label>
    <input type="text" name="position" id="position" placeholder="Isi jabatan"> <br>

    <label>Gambar:</label>
    <input type="text" name="image" id="image" placeholder=""> <br>
    <button type="submit">Simpan</button>
</form>
</body>
</html>