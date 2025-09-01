<x-layout>
<x-slot:title>
    Edit Grafik Financial
</x-slot>

<style>
    body {
        background-color: #f4f4f4;
    }
    h1 {
        text-align: center;
        color: #F79E17;
        font-weight: bold;
        font-size: xx-large;
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
    input {
        margin: 0 auto;
        display: block;
        width: 90%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
    .btn {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #218838;
    }
</style>

<form class="form-card" action="{{route('financial.update', $item->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>
        Edit Grafik Data Pendapatan dan Pengeluaran Desa
    </h1>
    <label>Jenis:</label>
    <input type="text" name="type" id="type" placeholder="Isi Jenis Penduduk" value="{{old('type', $item->type)}}"> <br>

    <label>Tahun:</label>
    <input type="number" name="years" id="years" placeholder="Isi Tahun" value="{{old('years', $item->years)}}"> <br>

    <label>Nominal:</label>
    <input type="number" name="nominal" id="nominal" placeholder="Isi Jumlah" value="{{old('nominal', $item->total)}}"> <br>
    <button class="btn" type="submit">Update</button>
</form>
</x-layout>