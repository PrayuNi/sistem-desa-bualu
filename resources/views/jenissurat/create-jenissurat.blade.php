<x-layout>
<x-slot:title>
    Form Nambah Jenis Surat
</x-slot>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    h2{
        text-align:center; 
        margin-bottom:20px; 
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
        margin-left: 5%;
        display: block;
        margin-bottom: 6px;
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
</style>

    <!-- 2.1 tempat untuk menambahkan data enctype-->
    <form class="form-card" action="{{ route('jenissurat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h2>
        Form Tambah Jenis Surat
    </h2>

    <div class="input-group">
        <label>Jenis Surat:</label>
        <input type="text" name="jenis" id="jenis" placeholder=""> <br>
    </div>

    <div class="input-group">
        <label>Judul:</label>
        <input type="text" name="judul" id="judul" placeholder=""> <br>
    </div>

    <div class="input-group">
        <label>Pendahuluan:</label>
        <textarea type="text" name="pendahuluan" id="pendahuluan" placeholder=""></textarea>
    </div>

    <div class="input-group">
        <label>Penutup:</label>
        <textarea type="text" name="penutup" id="penutup" placeholder=""></textarea>
    </div>

    <div class="input-group">
        <label>Boleh diprint:</label>
        <select name="print_able" id="print_able">
            <option value="0">Tidak</option>
            <option value="1">Boleh</option>
        </select> <br>
    </div>
      
    <div class="btn-wrap">
        <a href="{{ route('jenissurat.index') }}" class="btn-kembali">Kembali</a>
        <button type="submit" class="btn-simpan">Simpan</button>
    </div>
</form>
</x-layout>