<x-layout>
<x-slot:title>
    Edit Struktur Prejuru Desa
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

</style>

    <!-- 2.1 tempat untuk menambahkan data enctype-->
     
<form class="form-card" action="{{route('structure.update', $structure->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>
        Edit Struktur Prejuru Desa
    </h1>
    <label>Nama:</label>
    <input type="text" name="name" id="name" placeholder="Isi name" value="{{old('name', $structure->name)}}"> <br>

    <label>Jabatan:</label>
    <input type="text" name="position" id="position" placeholder="Isi jabatan" value="{{old('position', $structure->position)}}"> <br>

    <label>Gambar Sebelumnya:</label>
    <img src="{{asset('storage/'.  $structure->image)}}" alt=""> 
    <!-- 2.2 untuk ubah tipe data input ke file >> 2.3 Di Structure Controller -->
    <label>Input Gambar Baru:</label>
    <input type="file" name="image" id="image" value="{{asset('storage/'.  $structure->image)}}"> 
    <button type="submit">Update</button>
</form>    
</x-layout>