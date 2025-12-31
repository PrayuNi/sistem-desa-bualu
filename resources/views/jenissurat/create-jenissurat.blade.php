<x-layout>
    <x-slot:title>
        Form Nambah Jenis Surat
    </x-slot>

    <style>
        .form-container {
            background-color: #f4f4f4;
            padding: 20px 10px;
            min-height: calc(100vh - 200px);
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.6rem;
            color: #F99C0F;
            font-weight: bold;
        }
        .form-card {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            margin-left: 5%;
            font-size: 0.9rem;
        }
        input[type="text"], input[type="file"], textarea, select {
            width: 90%;
            display: block;
            margin: 0 auto 18px auto;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 0.9rem;
        }
        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #F99C0F;
        }
        textarea {
            min-height: 90px;
            resize: vertical;
        }
        .btn-wrap {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
        @media(min-width: 500px){
            .btn-wrap {
                flex-direction: row;
                justify-content: space-between;
            }
        }
        .btn-kembali, .btn-simpan {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }
        @media(min-width: 500px){
            .btn-kembali, .btn-simpan {
                width: 48%;
            }
        }
        .btn-kembali {
            background-color: #6c757d;
            color: white;
        }
        .btn-kembali:hover {
            background-color: #5a6268;
        }
        .btn-simpan {
            background-color: #28a745;
            color: white;
        }
        .btn-simpan:hover {
            background-color: #218838;
        }
        .error-alert {
            background: #f8d7da;
            border-left: 5px solid #dc3545;
            padding: 12px;
            margin: 0 auto 18px auto;
            width: 90%;
            border-radius: 6px;
            font-size: 0.85rem;
        }
        .error-alert ul {
            margin-top: 6px;
            margin-left: 20px;
        }
        @media(max-width: 350px){
            h2 { font-size: 1.3rem; }
            input[type="text"], input[type="file"], textarea {
                width: 95%;
                font-size: 0.85rem;
                padding: 8px;
            }
            .btn-kembali, .btn-simpan {
                font-size: 0.85rem;
                padding: 10px;
            }
        }
        /* Tablet / iPad */
        @media(min-width: 768px) and (max-width: 1024px){
            .form-container {
                align-items: center; 
                padding: 40px 20px; 
            }
            h2 { font-size: 1.8rem; }
            input[type="text"], input[type="file"], textarea {
                width: 85%;
                font-size: 1rem;
                padding: 12px;
            }
            .btn-kembali, .btn-simpan {
                font-size: 1rem;
                padding: 14px;
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

    <div class="form-container">
        <form class="form-card" action="{{ route('jenissurat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2>Form Tambah Jenis Surat</h2>

            <label>Jenis Surat:</label>
            <input type="text" name="jenis" id="jenis" placeholder=""> <br>

            <label>Judul:</label>
            <input type="text" name="judul" id="judul" placeholder=""> <br>
        
            <label>Pendahuluan:</label>
            <textarea type="text" name="pendahuluan" id="pendahuluan" placeholder=""></textarea>

            <label>Penutup:</label>
            <textarea type="text" name="penutup" id="penutup" placeholder=""></textarea>
    
            <label>Boleh diprint:</label>
            <select name="print_able" id="print_able">
                <option value="0">Tidak</option>
                <option value="1">Boleh</option>
            </select> <br>
        
            <div class="btn-wrap">
                <a href="{{ route('jenissurat.index') }}" class="btn-kembali">Kembali</a>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>
        </form>
    </div>
</x-layout>