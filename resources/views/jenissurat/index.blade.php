    <x-layout>
        <x-slot:title>
            Jenis Surat
        </x-slot>

        <h2>Jenis Surat</h2>
        <style>
            h2{
                text-align: center;
                margin: 20px;
                font-size: xx-large;
                font-weight: bold;
                color: #F79E17;
            }
            table{
                width: fit-content;
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
             .row{
                display: flex;
                width: fit-content;
             }
        </style>
        <table>
            <tr>
                <th>Id</th>  
                <th>Jenis Surat</th>
                <th>Aksi</th>
            </tr>

            @foreach($jenissurat as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->jenis}}</td>
            <td>
                <div class="row">
                    <a href="{{route('jenissurat.edit', $item->id)}}">
                        <button
                            type="button"
                            class="btn bg-blue-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
                        >
                            <i class="fa-solid fa-edit"></i>
                        </button>
                    </a>
                    <form action="{{route('jenissurat.delete', $item->id)}}" method="POST" onsubmit="return confirm ('Yakin Mau Dihapus?')" >
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-red-700 rounded-full w-fit px-6 py-3 text-white font-semibold" type="submit"> <i class="fa-solid fa-trash"></i> </button>
                    </form>    
                </div>
            </td>

               
            
            </tr>
            @endforeach
        </table>
    </x-layout> 

        