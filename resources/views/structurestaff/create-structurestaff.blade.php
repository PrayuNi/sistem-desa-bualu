<x-layout>
<x-slot:title>
    Form Tambah Struktur Staff Kantor Desa
</x-slot>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    h1 {
        text-align: center;
        color: #F99C0F;
        font-weight: bold;
        font-size: larger;
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
        width: 93%;
        margin: 0 auto;
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }
    input[type="text"],
    input[type="file"] {
        margin: 0 auto;
        display: block;
        width: 90%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
    button {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        background-color: #218838;
    }
    .input-group{
        padding: 0 20px;
        margin: 10px;
        height: fit-content;
    }
    .input-group label{
        margin: 0;
    }
    .input-group input{
        border: 0.5px lightgray solid;
        border-radius: 4px;
        width: 100%;
        height: fit-content;
        padding: 5px 10px;
        display: inline-block;
    }

    .input-group select{
        padding: 0 20px;
        border: 0.5px lightgray solid;
        border-radius: 4px;
        width: 100%;
        height: fit-content;
        padding: 5px 10px;
        display: inline-block;
    }
</style>

<body>
    <form class="form-card" action="{{ route('structurestaff.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1>
        Form Tambah Struktur Staff Kantor Desa
    </h1>

    <label>Nama:</label>
    <input type="text" name="name" id="name" placeholder="Isi nama lengkap"> <br>

    <label>Jabatan:</label>
    <input type="text" name="position" id="position" placeholder="Isi jabatan"> <br>

    <label>Gambar:</label>
    <input type="file" name="image" id="image"><br>
    <button type="submit">Simpan</button>
</form>
</body>
</x-layout>