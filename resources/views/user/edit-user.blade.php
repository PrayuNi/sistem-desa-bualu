
<x-layout>
<x-slot:title>
    Edit Profile User
</x-slot>

<style>
   body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    h2{
        text-align:center; 
        margin-top:20px; 
        font-size:26px; 
        color:#F99C0F; 
        font-weight:bold;
    }
    .form-card {
        margin: 10px auto;
        max-width: 600px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        margin-left: 5%;
    }
    input[type="text"], input[type="email"], input[type="password"], textarea {
        width: 90%;
        display: block;
        margin: 0 auto 15px auto;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
    .btn-wrap {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .btn-kembali, .btn-simpan {
        width: 48%;
        padding: 12px;
        border-radius: 6px;
        text-align: center;
        font-weight: bold;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }
    .btn-kembali {
        background-color: #6c757d;
        color: white;
    }
    .btn-kembali:hover {
    background-color: #5a6268;
    }
    .btn-simpan {
        background-color: #28a745;
        color: white;
    
    }
    .btn-simpan:hover {
        background-color: #218838;
    }
    #previewImage {
        width: 200px;
        display: block;
        margin: 10px auto 15px auto;
        border-radius: 6px;
        border: 1px solid #ddd;
    }
</style>

<body>
    
<form class="form-card" action="{{ route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

    <h2>Edit Profile User</h2>

    <label for="name">Name</label>
    <input type="text" name="name" id="name" placeholder="Isi name" value="{{ old('name', $user->name)}}"> <br>

    <label for="nik">NIK KTP</label>
    <input type="text" name="nik" id="nik" placeholder="Isi NIK KTP"  value="{{ old('nik', $user->nik)}}"> <br>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Isi password" minlength="8"  value="{{ old('password', $user->password)}}"> <br>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Isi email"  value="{{ old('email', $user->email)}}"> <br>

    <div class="btn-wrap">
            <a href="{{ route('user.index') }}" class="btn-kembali">Kembali</a>
            <button type="submit" class="btn-simpan">Simpan</button>
        </div>
</form>
</body>
</x-layout>