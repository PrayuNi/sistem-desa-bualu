<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    
<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <label for="name">Name</label>
     <input type="text" name="name" id="name" placeholder="Isi name"> <br>

    <label for="tempat_tanggallahir">Tempat/Tanggal Lahir</label>
     <input type="text" name="tempat_tanggallahir" id="tempat_tanggallahir" placeholder="Isi tempat/tanggal lahir"> <br>

    <label for="alamat">Alamat</label>
    <input type="text" name="alamat" id="alamat" placeholder="Isi alamat"> <br>

    <label for="password">Password</label>
     <input type="password" name="password" id="password" placeholder="Isi password"> <br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Isi email"> <br>

    <button type="submit">Simpan</button>
</form>
</body>
</html>