<x-layout>
<x-slot:title>
    Pengajuan Surat
</x-slot>>

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
        margin: 20px auto;
        max-width: 1200px;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Form dibagi dua kolom */ 
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px 40px;
    }
    .input-group {
        display: flex;
        flex-direction: column;
    }
    label {
        font-weight: bold;
        margin-bottom: 6px;
    }
    input[type="text"],
    input[type="file"],
    select {
        width: 100%;
        padding: 8px 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
    button {
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 25px;
    }
    button:hover {
        background-color: #218838;
    }

    /* Responsif untuk layar kecil
    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    } */
</style>

<form class="form-card" action="{{ route('pengajuansurat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1>
        Form Pengajuan Surat
    </h1>

    <div class="form-grid">
        <!-- Kolom kiri -->
        <div class="input-group">
            <label>Nama:</label>
            <input type="text" name="name" id="name" placeholder="Isi nama lengkap">
        </div>

        <!-- Kolom kanan -->
        <div class="input-group">
            <label>No Whatsapp:</label>
            <input type="text" name="no_whatsapp" id="no_whatsapp" placeholder="Isi no whatsapp">
        </div>

        <!-- Kolom kiri -->
        <div class="input-group">
            <label>NIK:</label>
            <input type="text" name="nik" id="nik" placeholder="Isi no KTP">
        </div>

        <!-- Kolom kanan -->
        <div class="input-group">
            <label>Tanggal Pengajuan:</label>
            <input type="text" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder="">
        </div>

        <!-- Kolom kiri -->
        <!-- <div class="input-group">
            <label>Jenis Surat:</label>
            <input type="text" name="jenis_surat" id="jenis_surat" placeholder="">
        </div> -->

        <div class="input-group">
        <label>Jenis Surat:</label>
        <select  name="jenis_surat" id="jenis_surat">
            <option selected disabled>Pilih jenis surat</option>
            @foreach ($jenis as $item)
            <option value="{{$item->jenis}}">{{$item->jenis}}</option>
            @endforeach
        </select>
    </div>

        <!-- Kolom kanan -->
        <div class="input-group">
            <label>Status:</label>
            <input type="text" name="status" id="status" placeholder="">
        </div>

        <!-- Kolom kiri kosong untuk keseimbangan (bisa dihapus jika ingin) -->
        <div></div>

        <!-- Kolom kanan -->
        <div class="input-group">
            <label>Foto KTP:</label>
            <input type="file" name="image" id="image">
        </div>
    </div>
    <button class="btn bg-green-700" type="submit">Simpan</button>
</form>

<!-- ================= DAFTAR SURAT ================= -->
<div class="row-card"> 
<h2>
    Daftar Pengajuan Surat
</h2>
</div>

<style>
    .row-card {
        margin: 10px auto;
        max-width: 1200px;
        background-color: #fff;
        padding: 5px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    h2{
        text-align: center;
        margin: 20px;
        font-size: xx-large;
        font-weight: bold;
        color: #F79E17;
    }
    table{
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 20px 5px rgba(0,0,0,0,1);
    }
    th, td{
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }
    th{
        background-color: #f4f4f4;
        font-weight: bold;
    }
    tr:nth-child(even){
        background-color: #f9f9f9;
    }
    tr:hover{
        background-color: #f1f1f1;
    }
</style>

<table>
<tr>
    <th>Nama</th>
    <th>NIK</th>
    <th>Jenis Surat</th>
    <th>No Whatsapp</th>
    <th>Tanggal Pengajuan</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

    @foreach($pengajuansurat as $item)
<tr>
    <td>{{$item->name}}</td>
    <td>{{$item->nik}}</td>
    <td>{{$item->jenis_surat}}</td>
    <td>{{$item->no_whatsapp}}</td>
    <td>{{$item->tanggal_pengajuan}}</td>
    <td>{{$item->status}}</td>
    <td>
        <div class="row flex float-right">
        <a class="mx-1" href="{{route('pengajuansurat.edit', $item->id)}}">
            <button
                type="button"
                class="btn bg-blue-900 rounded-full w-fit px-3 py-1 text-white font-semibold"
            >
            <i class="fa-solid fa-edit"></i>
            </button>
        </a>

        <form action="{{route('pengajuansurat.delete', $item->id)}}" method="POST" onsubmit="return confirm ('Yakin Mau Dihapus?')" >
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-red-700 rounded-full w-fit px-3 py-1 text-white font-semibold" type="submit"> <i class="fa-solid fa-trash"></i> </button>
        </form>
        </div> 
    </td>
</tr>
    @endforeach
</table>
</x-layout>