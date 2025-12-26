<x-layout>
    <x-slot:title>
        Pengajuan Surat
    </x-slot>

    <!-- Notifikasi berhasil disimpan -->
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

    <!-- Notifikasi berhasil dihapus -->
        @if(session('delete'))
        <div id="toastDelete" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="flex items-center p-4 rounded-xl shadow-xl bg-red-600 text-white animate-fade-in">
            <i class="fa-solid fa-trash-can text-2xl mr-3"></i>
            <span class="text-lg font-semibold">{{ session('delete') }}</span>
            </div>
        </div>

        <style>
            @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
            }
            @keyframes fadeOut {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.9); }
            }
            .animate-fade-in {
            animation: fadeIn 0.25s ease-out forwards;
            }
        </style>

        <script>
            setTimeout(() => {
            const toast = document.getElementById('toastDelete');
            const card = toast.querySelector('div');
            card.style.animation = "fadeOut 0.4s ease-in forwards";
            setTimeout(() => toast.remove(), 500);
            }, 2500);
        </script>
        @endif  
    <!-- End Notifikasi berhasil dihapus -->

    <style>
        .form-card {
            margin: 20px auto;
            max-width: 900px;
            background-color: #fff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 6px 16px rgba(0,0,0,0.12);
        }
        h2{
            text-align:center; 
            margin-bottom:24px; 
            font-size:26px; 
            color:#F99C0F; 
            font-weight:bold;
        }
        /* Form dibagi dua kolom */ 
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }
        .input-group {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: 600;
            margin-bottom: 6px;
        }
        input[type="text"],
        input[type="file"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: border 0.2s;
        }
        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #F99C0F;
        }
        .button-simpan {
            color: white;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 30px;
            font-weight: bold;
            width: fit-content;
        }
        .button-simpan :hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .form-card {
                margin: 20px 15px; /* jarak kiri-kanan biar tidak nempel */
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr; /* 1 kolom */
                gap: 16px; /* jarak antar field */
            }
        }
    </style>

<form class="form-card" action="{{ route('pengajuansurat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="text-center">
        <h2
        class=" h2-form font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600  after:mx-auto after:mt-1 m-5 text-amber-600 text-3xl"
        >
        Form Pengajuan Surat
        </h2>
    </div>

    <br>

    <div class="form-grid">
        <div class="input-group">
            <label>Nama:</label>
            <input type="text" name="name" id="name" placeholder="Isi nama lengkap">
        </div>

        <div class="input-group">
            <label>No Whatsapp:</label>
            <input type="text" name="no_whatsapp" id="no_whatsapp" placeholder="Isi no whatsapp">
        </div>

        <div class="input-group">
            <label>Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="">
        </div>

        <div class="input-group">
            <label>NIK:</label>
            <input type="text" name="nik" id="nik" placeholder="Isi no KTP">
        </div>

        <div class="input-group">
            <label>Jenis Kelamin:</label>
            <input type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder="Isi Jenis Kelamin">
        </div>

        <div class="input-group">
            <label>Tanggal Pengajuan:</label>
            <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder="">
        </div>

        <div class="input-group">
            <label>Alamat:</label>
            <textarea type="text" name="alamat" id="alamat" placeholder="Isi alamat lengkap"></textarea>
        </div>

        <div class="input-group">
        <label>Jenis Surat:</label>
        <select  name="jenis_surat" id="jenis_surat">
            <option selected disabled>Pilih jenis surat</option>
            @foreach ($jenis as $item)
            <option value="{{$item->jenis}}">{{$item->jenis}}</option>
            @endforeach
        </select>
    </div>
        @auth
            @if(Auth::user()->role == 0)
            <div class="input-group">
                <label>Status:</label>
                <select  name="status" id="status">
                    <option value="pending">Pending</option>
                    <option value="diproses">Diproses</option>
                    <option value="disetujui">Disetujui</option>
                </select> 
                <br>
            </div>
            @endif
        @endauth

        <div class="input-group">
            <label>Foto KTP:</label>
            <input type="file" name="image" id="image">
        </div>
    </div>
    <button class="button-simpan btn bg-green-800 hover:bg-green-900" type="submit">Ajukan</button>
</form>

<!-- ================= DAFTAR SURAT ================= -->
    <style>
        .row-card {
            margin: 10px auto;
            max-width: 1200px;
            background-color: #fff;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .h2-tabel{
            text-align: center;
            margin: 40px 0 15px; /* atas | kiri-kanan | bawah */
            font-size: xx-large;
            font-weight: bold;
            color:#F99C0F; 
            font-weight:bold;
        }
        table{
            width: 80%;
            margin: 0 auto 40px; /* jarak dari judul sudah diatur oleh h2 */
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
            color: white;
        }
        .btn-edit:hover {
            background: #1e3a8a;
        }
        .btn-print {
            background: #15803d;
            color: white;
            text-decoration: none;
        }
        .btn-print:hover {
            background: #166534;
        }
        .btn-delete {
            background: #c53030;
            color: white;
        }
        .btn-delete:hover {
            background: #e53e3e;
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
        .aksi-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px; /* jarak antar tombol */
        }
        .aksi-btn a, .aksi-btn button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }
        .text-status {
            margin-top: 6px;
            font-size: 12px;
            color: red;
            text-align: center;
        }
    </style>

    <h2 class="h2-tabel">Daftar Pengajuan Surat</h2>

    <div class="table-container">
        <table class="modern-table">
            <tr>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>NIK</th>
                <th>Jenis Surat</th>
                <th>No Whatsapp</th>
                <th>Tanggal Pengajuan</th>
                <th>Boleh Di Print</th>
                <th>Foto KTP</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            @foreach($pengajuansurat as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->tanggal_lahir}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>{{$item->nik}}</td>
                <td>{{$item->jenis_surat}}</td>
                <td>{{$item->no_whatsapp}}</td>
                <td>{{$item->tanggal_pengajuan}}</td>
                
                    @if ($item->print_able == 0)
                        <td>Tidak</td>
                        @else
                        <td>Boleh</td>
                    @endif

                <td> 
                    <div class="justify-center"> <img class="w-20" src="{{asset('storage/' . ($item->image ?? 'file_ktp/default.png'))}}" alt=""></div>
                </td>
                <td>{{$item->status}}</td>

                <!-- Button -->
                <td>
                    <div class="aksi-btn">
                        <a href="{{route('pengajuansurat.edit', $item->id)}}">
                        <button type="button" class="btn-edit">
                            <i class="fa-solid fa-edit"></i>
                        </button>
                        </a>

                        @if(strtolower($item->status) === 'disetujui')
                            @if($item->print_able == 1)
                                <a class="mx-1" href="{{ route('pengajuansurat.print', $item->id) }}">
                                    <button type="button" class="btn bg-green-800 hover:bg-green-900 rounded-full w-fit px-3 py-1 text-white font-semibold">
                                        <i class="fa-solid fa-print"></i>
                                    </button>
                                </a>
                            @endif
                        @else
                            <span class="text-status">
                                Surat belum disetujui
                            </span>
                        @endif

                        <form action="{{route('pengajuansurat.delete', $item->id)}}" 
                            method="POST" 
                            onsubmit="return confirm('Yakin Mau Dihapus?')">
                            @csrf
                            @method('DELETE')
                                <button class="btn-delete" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                        </form>
                    </div> 
                </td>
                <!-- End Button -->
            </tr>
            @endforeach
        </table>
    </div>

    <div class="flex justify-center my-8">
        <a href="{{ route('dashboard') }}" 
           class="btn-kembali">
           <i class="fa-solid fa-arrow-left mr-2"></i> Kembali Halaman Dashboard
        </a>
    </div>

</x-layout>