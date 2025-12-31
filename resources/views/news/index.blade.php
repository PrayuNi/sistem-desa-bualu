    <x-layout>
        <x-slot:title>
            Edit Data News 
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
            margin-bottom:10px; 
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
        .btn-tambah {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }
        .btn-tambah button {
            margin: 0 !important; /* override m-5 */
        }
        .btn-tambah button:hover {
            background-color: #718096;
        }
    </style>

    <h2>Edit Data News</h2>

    <!-- Button Tambah -->
    @Auth
        @if (Auth::user()->role == 0)
        <div class="btn-tambah">
            <a href="{{route('news.create-news')}}">
            <button
                type="button"
                class="btn bg-gray-400 rounded-full w-fit px-4 py-2 m-5 text-black font-semibold"
            >
            <i class="fa-solid fa-plus"></i> Tambah Data
            </button>
            </a> <br>
        </div> 
        @endif
    @endauth
    <!-- End Button Tambah -->

    <div class="table-container">
    <!-- ALERT -->
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
    
        <table class="modern-table">
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>

            @foreach($news as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->date}}</td>
                <td> 
                    <div class="justify-center"> <img class="w-20" src="{{asset('storage/' . ($item->image ?? 'news_images/default.png'))}}" alt=""></div>
                </td>

                <!-- Button -->
                <td>
                    <a href="{{route('news.edit-news', $item->id)}}">
                        <button
                            type="button"
                            class="btn-edit"
                        >
                            <i class="fa-solid fa-edit"></i>
                        </button>
                    </a>
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

        