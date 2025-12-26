<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        /* untuk reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #ffb84d, #ff8800);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper {
            display: flex;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            width: 90%;
            max-width: 800px;
            transition: all 0.3s ease;
        }

        .image-section {
            flex: 1;
            flex-direction: column;
            background: linear-gradient(180deg, #ffe082, #ffcc66);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #ff6f00;
            padding: 30px;
        }

        .image-section img {
            width: 100%;
            max-width: 230px;
            object-fit: contain;
            padding: 8px;
        }

        .image-section h1 {
            font-size: 22px;
            font-weight: 700;
            color: #a66a00;
            margin-top: 5px;
        }

        .form-section {
            flex: 1;
            background: linear-gradient(180deg, #ffffd6, #ffffd9);
            padding: 40px 30px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            margin-bottom: 25px;
            color: #a66a00;
            font-size: 26px;
            font-weight: 700;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 18px;
            border: 2px solid #ffd54f;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
            background: #fffbea;
        }

        input:focus {
            border-color: #ff9800;
            background: #fff3cd;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #ffb300, #ff6f00);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(255, 111, 0, 0.3);
        }

        button:hover {
            background: linear-gradient(90deg, #ff9800, #ff6f00);
            transform: scale(1.02);
        }

        p {
            margin-top: 20px;
            color: #777;
            font-size: 14px;
        }

        a {
            color: #a66a00;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* untuk responsive mobile */
        @media (max-width: 768px) {
            .wrapper {
                flex-direction: column;
                max-width: 400px;
            }

            .image-section {
                padding: 25px;
                background: linear-gradient(180deg, #fff3cd, #ffe082);
            }

            .image-section img {
                max-width: 160px;
                margin-bottom: 10px;
            }

            .image-section h1 {
                font-size: 20px;
            }

            .form-section {
                padding: 30px 25px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- untuk posisi gambar -->
        <div class="image-section">
            <img src="{{ asset('storage/assets/logodesa.png') }}" alt="logodesa">
            <h1>Selamat Datang Di Sistem Informasi Desa Adat Bualu</h1>
        </div>

        <!-- untuk form register -->
        <form class="form-section" action="/register" method="POST">
            @csrf
            <h2>Register</h2>
            <input type="name" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="nik" name="nik" placeholder="NIK KTP" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">Daftar</button>
            <p>Sudah punya akun? <a href="/login">Login</p>
        </form>
    </div>
</body>
</html>


