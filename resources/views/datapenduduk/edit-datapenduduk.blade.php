<x-layout>
<x-slot:title>
    Edit Data Penduduk Gegem Desa Adat Bualu
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
<form class="form-card" action="{{route('datapenduduk.update', $datapenduduk->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>
        Edit Jumlah Data Penduduk Gegem Desa Adat Bualu
    </h1>
    <br>
    <label>Jumlah Penduduk Keseluruhan:</label>
    <input type="text" name="penduduk" id="penduduk" placeholder="Isi Jumlah" value="{{old('penduduk', $datapenduduk->penduduk)}}"> <br>

    <label>Jumlah Penduduk Laki-Laki:</label>
    <input type="text" name="laki_laki" id="laki_laki" placeholder="Isi Jumlah" value="{{old('laki_laki', $datapenduduk->laki_laki)}}"> <br>

    <label>Jumlah Penduduk Perempuan:</label>
    <input type="text" name="perempuan" id="perempuan" placeholder="Isi Jumlah" value="{{old('perempuan', $datapenduduk->perempuan)}}"> <br>

    <label>Jumlah Mutasi Penduduk:</label>
    <input type="text" name="mutasi_penduduk" id="mutasi_penduduk" placeholder="Isi Jumlah" value="{{old('mutasi_penduduk', $datapenduduk->mutasi_penduduk)}}"> <br>

    <button type="submit">Update</button>
</form>
</x-layout>