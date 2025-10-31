<x-layout>
<x-slot:title>
    Form Tambah Struktur Staff Kantor Desa
</x-slot>

<style>
   body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    h2{
        text-align:center; 
        margin-top:20px; 
        font-size:26px; 
        color:#F99C0F; 
        font-weight:bold;
    }
    .form-card {
        margin: 10px auto;
        max-width: 600px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        margin-left: 5%;
    }
    input[type="text"], input[type="file"], textarea {
        width: 90%;
        display: block;
        margin: 0 auto 15px auto;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
    .btn-wrap {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .btn-kembali, .btn-simpan {
        width: 48%;
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
    .btn-simpan {
        background-color: #28a745;
        color: white;
    
    }
    .btn-simpan:hover {
        background-color: #218838;
    }
    #previewImage {
        width: 200px;
        display: block;
        margin: 10px auto 15px auto;
        border-radius: 6px;
        border: 1px solid #ddd;
    }
</style>

<body>
    <!-- ALERT -->
    @if($errors->any())
        <div style="background:#f8d7da; border-left: 5px solid #dc3545; padding:10px; margin:15px auto; width:600px; border-radius:6px;">
            <strong>Periksa kembali inputan Anda:</strong>
            <ul style="margin-top:8px; margin-left:20px;">
                @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-card" action="{{ route('structurestaff.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h2>Form Tambah Struktur Staff Kantor Desa</h2>

    <label>Nama:</label>
    <input type="text" name="name" id="name" placeholder="Isi nama lengkap"> <br>

    <label>Jabatan:</label>
    <input type="text" name="position" id="position" placeholder="Isi jabatan"> <br>

    <label>Gambar:</label>
    <input type="file" name="image" id="imageInput"><br>

    <!-- Preview untuk gambar baru -->
        <img id="newImagePreview" style="width:200px; display:none; margin:10px auto; border-radius:6px; border:1px solid #ddd;">

        <div class="btn-wrap">
            <a href="{{ route('staff.index') }}" class="btn-kembali">Kembali</a>
            <button type="submit" class="btn-simpan">Simpan</button>
        </div>
    </form>
    
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

</body>
</x-layout>