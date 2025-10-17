<x-layout>
<x-slot:title>
    Edit Pengajuan Surat
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
        font-size: large;
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

</style>

    <!-- 2.1 tempat untuk menambahkan data enctype-->
     
<form class="form-card" action="{{route('pengajuansurat.update', $pengajuansurat->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>
        Edit Pengajuan Surat
    </h1>

    <div class="input-group">
        <label>Nama:</label>
        <input type="text" value="{{old('name', $pengajuansurat->name)}}" name="name" id="name" placeholder="Isi nama lengkap"> <br>
    </div>

    <div class="input-group">   
        <label>NIK:</label>
        <input type="text" value="{{old('nik', $pengajuansurat->nik)}}" name="nik" id="nik" placeholder="Isi no KTP"> <br>
    </div>
    
    <div class="input-group">
        <label>Jenis Surat:</label>
        <input type="text" value="{{old('jenis_surat', $pengajuansurat->jenis_surat)}}" name="jenis_surat" id="jenis_surat" placeholder="Isi jenis surat yang diperlukan"> <br>
    </div>

    <div class="input-group">
        <label>No Whatsapp:</label>
        <input type="text" value="{{old('no_whatsapp', $pengajuansurat->no_whatsapp)}}" name="no_whatsapp" id="no_whatsapp" placeholder="Isi no whatsapp"> <br>
    </div>

    <div class="input-group">
        <label>Tanggal Pengajuan:</label>
        <input type="text" value="{{ old('tanggal_pengajuan', $pengajuansurat->tanggal_pengajuan) }}" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder=""> <br>
    </div>

    <div class="input-group">
        <label>Status:</label>
        <input type="text" value="{{ old('status', $pengajuansurat->status) }}" name="status" id="status" placeholder=""> <br>
    </div>

    <div class="input-group">
        <label>Foto KTP Sebelumnya:</label>
        <img src="{{asset('storage/'. $pengajuansurat->image)}}" alt=""> 
     </div>

    <!-- 2.2 untuk ubah tipe data input ke file >> 2.3 Di Structure Controller -->
    <div class="input-group">
        <label>Input Foto KTP Baru:</label>
        <input type="file" name="image" id="image" value="{{old('image', $pengajuansurat->image)}}">
    </div>
    <button type="submit">Update</button>
</form>    
</x-layout>