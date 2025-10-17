<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {font-family: Arial; background: #f7f7f7; display: flex; justify-content: center; align-items: center; height: 100vh;};
        form {background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba (0,0,0,0.1);}
        input {display: block; width: 100%; margin-bottom: 15px; padding: 10px;}
        button {padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;}
        button:hover {background: #0056b3;}
    </style>
</head>
<body>
   <form action="/register" method="POST">
        @csrf
        <h2>Register</h2>
        <input type="name" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
        <button type="submit">Daftar</button>
        <p>Sudah punya akun? <a href="/register">Login</p>
   </form> 
</body>
</html>