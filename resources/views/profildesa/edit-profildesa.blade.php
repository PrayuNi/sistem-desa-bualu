<x-layout>
<x-slot:title>
    Edit Struktur Staff Kantor Desa
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

<body>
     <!-- 2.1 tempat untuk menambahkan data enctype-->
    <form class="form-card" action="{{ route('profildesa.update', $profilsdesa->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <h1>
            Edit Profil Desa
        </h1>

        <label>Nama Bendesa:</label>
        <input type="text" name="name" id="name" placeholder="Isi nama lengkap" value="{{old('name', $profilsdesa->name)}}"> <br>

        <label>Sambutan Bendesa:</label>
        <input type="text" name="sambutan_bendesa" id="sambutan_bendesa" placeholder="Isi sambutan" value="{{old('sambutan_bendesa', $profilsdesa->sambutan_bendesa)}}"> <br>

        <label>Sejarah Desa:</label>
        <input type="text" name="sejarah_desa" id="sejarah_desa" placeholder="Isi sejarah" value="{{old('sejarah_desa', $profilsdesa->sejarah_desa)}}"> <br>

        <label>Visi Desa:</label>
        <input type="text" name="visi_desa" id="visi_desa" placeholder="Isi visi" value="{{old('visi_desa', $profilsdesa->visi_desa)}}"> <br>

        <label>Misi Desa:</label>
        <input type="text" name="misi_desa" id="misi_desa" placeholder="Isi misi" value="{{old('misi_desa', $profilsdesa->misi_desa)}}"> <br>

        <!-- 2.2 untuk ubah tipe data input ke file >> 2.3 Di Structure Controller -->
        <label>Gambar Sebelumnya:</label>
        <img src="{{asset('storage/'.  $profilsdesa->image)}}" alt=""> 
        
        <label>Gambar:</label>
        <input type="file" name="image" id="image" value="{{old('image', $profilsdesa->image)}}">
        <button type="submit">Simpan</button>
    </form>
</body>
</x-layout>