<x-layout>
    <x-slot:title>
        Edit Pengajuan Surat
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
    h2{
        text-align: center;
        margin-top: 10px;
        margin-bottom: 20px;
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
    input[type="text"], input[type="file"], input[type="date"], textarea, select {
        width: 90%;
        display: block;
        margin: 0 auto 8px auto;
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
        input[type="text"], input[type="file"], textarea, select {
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
            padding: 50px 20px; 
        }
        h2 { font-size: 1.8rem; }
        input[type="text"], input[type="file"], textarea, select {
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
        <form class="form-card" action="{{route('pengajuansurat.update', $pengajuansurat->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>Edit Pengajuan Surat</h2>

        @if($errors->any())
            <div class="error-alert">
                <strong>Periksa kembali inputan Anda:</strong>
                <ul>
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label>Nama:</label>
        <input type="text" value="{{ old('name', $pengajuansurat->name) }}" name="name" id="name" placeholder="Isi nama lengkap"> <br>
    
        <label>Tanggal Lahir:</label>
        <input type="date" value="{{ old('tanggal_lahir', $pengajuansurat->tanggal_lahir) }}" name="tanggal_lahir" id="tanggal_lahir" placeholder=""> <br>

        <label>Jenis Kelamin:</label>
        <input type="text" value="{{ old('jenis_kelamin', $pengajuansurat->jenis_kelamin) }}" name="jenis_kelamin" id="jenis_kelamin" placeholder="Isi jenis kelamin"> <br>

        <label>Alamat:</label>
        <textarea type="text" value="{{ old('alamat', $pengajuansurat->alamat) }}" name="alamat" id="alamat" placeholder="Isi alamat lengkap">{{old('alamat', $pengajuansurat->alamat)}}</textarea> <br>

        <label>NIK:</label>
        <input type="text" value="{{ old('nik', $pengajuansurat->nik) }}" name="nik" id="nik" placeholder="Isi no KTP"> <br>

        <label>Jenis Surat:</label>
        <input type="text" value="{{ old('jenis_surat', $pengajuansurat->jenis_surat) }}" name="jenis_surat" id="jenis_surat" placeholder="Isi jenis surat yang diperlukan"> <br>
  
        <label>No Whatsapp:</label>
        <input type="text" value="{{ old('no_whatsapp', $pengajuansurat->no_whatsapp) }}" name="no_whatsapp" id="no_whatsapp" placeholder="Isi no whatsapp"> <br>
  
        <label>Tanggal Pengajuan:</label>
        <input type="text" value="{{ old('tanggal_pengajuan', $pengajuansurat->tanggal_pengajuan) }}" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder=""> <br>
  
        <label>Boleh di print?:</label>
        <input type="text" value="{{ old('print_able', $pengajuansurat->print_able) }}" name="print_able" id="print_able" disabled> <br>

        @auth
            @if(Auth::user()->role == 0)
            <label>Status:</label>
            <select  name="status" id="status">
                <option value="pending">Pending</option>
                <option value="diproses">Diproses</option>
                <option value="disetujui">Disetujui</option>
            </select> 
            <br>
            @endif
        @endauth

        <label>Foto KTP Sebelumnya:</label>
        <img id="oldImage" src="{{asset('storage/'. $pengajuansurat->image)}}">

        <label>Input Foto KTP Baru:</label>
        <input type="file" name="image" id="imageInput">

        <!-- Preview untuk gambar baru -->
            <img id="newImagePreview" style="display:none;">
        
            <div class="btn-wrap">
                <a href="{{ route('pengajuansurat.index') }}" class="btn-kembali">Kembali</a>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Preview gambar baru -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event){
            const file = event.target.files[0];
            const newPreview = document.getElementById('newImagePreview');

            if(file){
                const reader = new FileReader();
                reader.onload = e => {
                    newPreview.src = e.target.result;
                    newPreview.style.display = "block"; // Tampilkan preview baru
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
   
</x-layout>