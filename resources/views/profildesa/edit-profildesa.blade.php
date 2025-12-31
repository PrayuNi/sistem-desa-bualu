<x-layout>
    <x-slot:title>
        Edit Profil Desa Adat Bualu
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
        input[type="text"], input[type="file"], textarea {
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
        #oldImage, #newImagePreview {
            width: 200px;
            max-width: 90%;
            display: block;
            margin: 10px auto 18px auto;
            border-radius: 6px;
            border: 1px solid #ddd;
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
            #oldImage, #newImagePreview {
                width: 150px;
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
            #oldImage, #newImagePreview {
                width: 220px;
            }
            .btn-kembali, .btn-simpan {
                font-size: 1rem;
                padding: 14px;
            }
        }      
    </style>

    <div class="form-container">
        <form class="form-card" action="{{ route('profildesa.update', $profilsdesa->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h2>Edit Profil Desa</h2>

@if($errors->any())
    <div id="toastWarning" class="fixed top-5 right-5 bg-yellow-400 text-black p-4 rounded-lg shadow-lg z-50 transform translate-x-20 opacity-0 transition-all duration-500">
        ⚠ Seluruh kolom wajib diisi
    </div>

    <script>
        const toast = document.getElementById('toastWarning');
        setTimeout(() => {
            toast.classList.remove('translate-x-20', 'opacity-0');
            toast.classList.add('translate-x-0', 'opacity-100');
        }, 100);

        setTimeout(() => {
            toast.classList.add('translate-x-20', 'opacity-0');
            setTimeout(() => toast.remove(), 500);
        }, 4000);
    </script>
@endif


            <label>Nama Bendesa:</label>
            <input type="text" name="name" value="{{ old('name', $profilsdesa->name) }}">

            <label>Sambutan Bendesa:</label>
            <textarea name="sambutan_bendesa">{{ old('sambutan_bendesa', $profilsdesa->sambutan_bendesa) }}</textarea>

            <label>Sejarah Desa:</label>
            <textarea name="sejarah_desa">{{ old('sejarah_desa', $profilsdesa->sejarah_desa) }}</textarea>

            <label>Visi Desa:</label>
            <textarea name="visi_desa">{{ old('visi_desa', $profilsdesa->visi_desa) }}</textarea>

            <label>Misi Desa:</label>
            <textarea name="misi_desa">{{ old('misi_desa', $profilsdesa->misi_desa) }}</textarea>

            <label>Gambar Sebelumnya:</label>
            <img id="oldImage" src="{{ asset('storage/' . $profilsdesa->image) }}">

            <label>Ganti Gambar:</label>
            <input type="file" name="image" id="imageInput">

            <img id="newImagePreview" style="display:none;">

            <div class="btn-wrap">
                <a href="{{ route('profil.index') }}" class="btn-kembali">Kembali</a>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function(event){
            const file = event.target.files[0];
            const newPreview = document.getElementById('newImagePreview');

            if(file){
                const reader = new FileReader();
                reader.onload = e => {
                    newPreview.src = e.target.result;
                    newPreview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</x-layout>
