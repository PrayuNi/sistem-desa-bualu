    <x-layout>
        <x-slot:title>
            Edit Data APBD
        </x-slot>

    <!--Notifikasi berhasil disimpan  -->
        @if(session('success'))
        <div id="toastSuccess" class="fixed top-5 right-5 flex items-center p-4 rounded-lg shadow-lg bg-green-600 text-white animate-slide-in">
            <i class="fa-solid fa-circle-check text-2xl mr-3"></i>
            <span class="text-lg font-semibold">{{ session('success') }}</span>
        </div>

        <style>
            @keyframes slideIn {
            from { opacity: 0; transform: translateX(100%); }
            to { opacity: 1; transform: translateX(0); }
            }
            @keyframes slideOut {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(100%); }
            }
            .animate-slide-in{
            animation: slideIn 0.10s ease-out forwards;
            }
        </style>

        <script>
            setTimeout(() => {
            const toast = document.getElementById('toastSuccess');
            toast.style.animation = "slideOut 0.5s ease-in forwards";
            setTimeout(() => toast.remove(), 600);
            }, 3000);
        </script>
        @endif
    <!-- End Notifikasi berhasil disimpan -->
    
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
            text-align:center; 
            margin-top:20px;
            font-size: xx-large;
            color:#F99C0F; 
            font-weight:bold;
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
        .table-container {
            width: 90%;
            margin: 20px auto;
            overflow-x: auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0, 0.8);
        }
        .modern-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 16px;
            overflow: hidden;
            min-width: 850px;
        }
        .modern-table th {
            background: linear-gradient(to top, #f59e0b, #fbbf24);
            color: white;
            padding: 14px;
            text-align: center;
            font-weight: bold;
            font-size: 15px;
        }
        .modern-table td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        .modern-table tr:hover {
            background: #fff7e6;
            transition: 0.2s;
        }
        .table-container::-webkit-scrollbar {
            height: 7px;
        }
        .table-container::-webkit-scrollbar-thumb {
            background: #fbbf24;
            border-radius: 20px;
        }
        .btn-edit {
            background: #1e40af;
            padding: 8px 16px;
            border-radius: 20px;
            color: white;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }
        .btn-edit:hover {
            background: #1e3a8a;
        }
        .btn-kembali {
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
    </style>

    <h2>Edit Data APBDes/Pendapatan dan Pengeluaran Desa</h2>

    <div class="table-container">
        <table class="modern-table">
            <tr>
                <th>Tahun</th>
                <th>Pendapatan</th>
                <th>Pengeluaran</th>
                <th>Aksi</th>
            </tr>

            @foreach($datafinancials as $item)
            <tr>
                <td>{{$item->years}}</td>
                <td>{{$item->income}}</td>
                <td>{{$item->spending}}</td>
                <td>
                <a href="{{ route('financial.edit-financial', $item->id) }}">
                    <button
                        type="button"
                        class="btn-edit"
                    >
                        <i class="fa-solid fa-edit"></i>
                    </button>
                </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="flex justify-center my-8">
        <a href="{{ route('dataapbd.index') }}" 
           class="btn-kembali">
           <i class="fa-solid fa-arrow-left mr-2"></i> Kembali Halaman APBD
        </a>
    </div>

    </x-layout> 

        