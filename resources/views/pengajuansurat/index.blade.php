<x-layout>
    <x-slot:title>
        Pengajuan Surat
    </x-slot>

        @if(auth()->user()->role == 0)
        <div class="flex flex-wrap gap-4 m-6">
            @foreach($summaryArray ?? [] as $jenis_surat => $status)
            <div class="flex-1 min-w-[220px] p-4 rounded-xl shadow-md bg-white border border-amber-600">
                <h3 class="font-bold text-lg mb-4 text-center">{{ $jenis_surat }}</h3>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <!-- Pending -->
                    <div class="flex flex-col items-center p-3 bg-yellow-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path fill="#ffc800" d="M320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320C64 178.6 178.6 64 320 64zM296 184L296 320C296 328 300 335.5 306.7 340L402.7 404C413.7 411.4 428.6 408.4 436 397.3C443.4 386.2 440.4 371.4 
                            429.3 364L344 307.2L344 184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184z"/>
                        </svg>
                        <p class="text-sm font-medium text-yellow-700">Pending</p>
                        <a href="{{ route('pengajuansurat.index', ['jenis_surat' => $jenis_surat, 'status' => 'pending']) }}"
                            class="text-2xl font-bold text-yellow-800 hover:underline">
                            {{ $status['pending'] ?? 0 }}
                        </a>
                    </div>

                    <!-- Proses -->
                    <div class="flex flex-col items-center p-3 bg-blue-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-2" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path fill="#00518f" d="M160 64C142.3 64 128 78.3 128 96C128 113.7 142.3 128 160 128L160 139C160 181.4 176.9 222.1 206.9 252.1L274.8 320L206.9 387.9C176.9 417.9 160 458.6 160 501L160 512C142.3 512 128 526.3 128 544C128 561.7 142.3 576 160 576L480 
                            576C497.7 576 512 561.7 512 544C512 526.3 497.7 512 480 512L480 501C480 458.6 463.1 417.9 433.1 387.9L365.2 320L433.1 252.1C463.1 222.1 480 181.4 480 139L480 128C497.7 128 512 113.7 512 96C512 78.3 497.7 64 480 64L160 64zM224 139L224 128L416 128L416 
                            139C416 158 410.4 176.4 400 192L240 192C229.7 176.4 224 158 224 139zM240 448C243.5 442.7 247.6 437.7 252.1 433.1L320 365.2L387.9 433.1C392.5 437.7 396.5 442.7 400.1 448L240 448z"/>
                        </svg>
                        <p class="text-sm font-medium text-blue-700">Proses</p>
                        <a href="{{ route('pengajuansurat.index', ['jenis_surat' => $jenis_surat, 'status' => 'proses']) }}"
                            class="text-2xl font-bold text-blue-800 hover:underline">
                            {{ $status['proses'] ?? 0 }}
                        </a>
                    </div>

                    <!-- Disetujui -->
                    <div class="flex flex-col items-center p-3 bg-green-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-700 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-sm font-medium text-green-700">Disetujui</p>
                        <a href="{{ route('pengajuansurat.index', ['jenis_surat' => $jenis_surat, 'status' => 'disetujui']) }}"
                            class="text-2xl font-bold text-green-800 hover:underline">
                            {{ $status['disetujui'] ?? 0 }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        
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
        .button-simpan:hover { 
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

    @if($errors->any())
        <div id="errorAlert"
            class="fixed top-5 left-1/2 -translate-x-1/2 -translate-y-10
                    bg-red-100 border border-red-400 text-red-700 
                    px-4 py-3 rounded shadow-lg 
                    w-11/12 sm:w-3/4 md:w-1/2 lg:w-1/3 
                    text-center z-50 opacity-0 
                    transition-transform  duration-500 ease-out">
            <strong>⚠ Periksa kembali inputan Anda:</strong>
            <ul class="mt-2">
                @foreach($errors->all() as $err)
                    <li>Kolom wajib diisi</li>
                @endforeach
            </ul>
        </div>

        <script>
            const alert = document.getElementById('errorAlert');

            // Slide-in + bounce effect
            setTimeout(() => {
                alert.style.transition = 'transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.5s ease';
                alert.classList.remove('-translate-y-10', 'opacity-0');
                alert.classList.add('translate-y-1', 'opacity-100'); // sedikit bounce ke bawah
                // setelah bounce, kembali ke posisi normal
                setTimeout(() => {
                    alert.classList.remove('translate-y-1');
                    alert.classList.add('translate-y-0');
                }, 300);
            }, 100);

            // Slide-out naik + fade-out
            setTimeout(() => {
                alert.classList.remove('translate-y-0', 'opacity-100');
                alert.classList.add('-translate-y-10', 'opacity-0');
                setTimeout(() => alert.remove(), 600);
            }, 4000);
        </script>
    @endif

    

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
            <!-- <input type="text" name="nik" id="nik" placeholder="Isi no KTP"> -->
            @if(Auth::user()->role == 0)
                <input type="text" name="nik" id="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK masyarakat">
            @else
                <input type="text" name="nik" value="{{ Auth::user()->nik }}" readonly class="bg-gray-200 cursor-not-allowed">
            @endif
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
                <th>No</th>
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
                <td>{{ $loop->iteration }}</td>
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
                    <div class="flex justify-center">
                        <img class="w-20 h-20 object-cover rounded" 
                            src="{{ asset('storage/' . ($item->image ?? 'ktp_images/default.png')) }}" 
                            alt="Lampiran">
                    </div>
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
                                <a class="mx-1" href="{{ route('pengajuansurat.print', $item->id) }} " target="_blank">
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