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
    <input type="text" name="name" id="name" placeholder="Isi name">
    <input type="email" name="email" id="email" placeholder="Isi email">
    <input type="password" name="password" id="password" placeholder="Isi password">
    <button type="submit">Simpan</button>
</form>
</body>
</html>