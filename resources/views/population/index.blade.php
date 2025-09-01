    <x-layout>
        <x-slot:title>
            Edit Grafik Data Penduduk
        </x-slot>

        <h2>Edit Grafik Data Penduduk</h2>
        <style>
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
                <th>Jenis</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>

            @foreach($datapopulations as $item)
            <tr>
                <td>{{$item->type}}</td>
                <td>{{$item->years}}</td>
                <td>{{$item->total}}</td>
                <td>
                    <a href="{{route('population.edit', $item->id)}}">
                        <button
                            type="button"
                            class="btn bg-blue-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
                        >
                            <i class="fa-solid fa-edit"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </x-layout> 

        