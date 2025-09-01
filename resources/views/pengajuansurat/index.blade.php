    <x-layout>
        <x-slot:title>
            Edit Pengajuan Surat
        </x-slot>

        <h2>Edit Pengajuan Surat</h2>
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
                <td>{{$item->type}}</td>
                <td>{{$item->no_whatsapp}}</td>
                <td>{{$item->date}}</td>
                <td>{{$item->image}}</td>
                <td>
                    <a href="{{route('pengajuansurat.edit', $item->id)}}">
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

        