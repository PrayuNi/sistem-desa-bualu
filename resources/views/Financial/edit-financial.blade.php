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

    <label>Tahun:</label>
    <input type="number" name="years" id="years" placeholder="Isi Tahun" value="{{old('years', $item->years)}}"> <br>

    <label>Pendapatan:</label>
    <input type="number" name="income" id="income" placeholder="Isi Jumlah" value="{{old('income', $item->income)}}"> <br>

    <label>Pengeluaran:</label>
    <input type="number" name="spending" id="spending" placeholder="Isi Jumlah" value="{{old('spending', $item->spending)}}"> <br>

    <button class="btn" type="submit">Update</button>
</form>
</x-layout>