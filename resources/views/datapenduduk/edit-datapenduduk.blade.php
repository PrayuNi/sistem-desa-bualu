<x-layout>
    <x-slot:title>
        Edit Data Penduduk Gegem Desa Adat Bualu
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
            text-align:center; 
            margin-top:20px; 
            margin-bottom: 20px;
            font-size:1.6rem; 
            color:#F99C0F; 
            font-weight:bold;
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
            margin: 0 auto 1px auto;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 0.9rem;
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
            margin: 10px auto 19px auto;
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
        /* Responsive font dan spacing untuk HP sangat kecil */
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
        <form class="form-card" action="{{route('datapenduduk.update', $datapenduduk->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2>Edit Jumlah Penduduk Gegem/Adat</h2>

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

            <label>Jumlah Penduduk Keseluruhan:</label>
            <input type="text" name="penduduk" id="penduduk" placeholder="Isi Jumlah" value="{{old('penduduk', $datapenduduk->penduduk)}}"> <br>

            <label>Jumlah Penduduk Laki-Laki:</label>
            <input type="text" name="laki_laki" id="laki_laki" placeholder="Isi Jumlah" value="{{old('laki_laki', $datapenduduk->laki_laki)}}"> <br>

            <label>Jumlah Penduduk Perempuan:</label>
            <input type="text" name="perempuan" id="perempuan" placeholder="Isi Jumlah" value="{{old('perempuan', $datapenduduk->perempuan)}}"> <br>

            <label>Jumlah Mutasi Penduduk:</label>
            <input type="text" name="mutasi_penduduk" id="mutasi_penduduk" placeholder="Isi Jumlah" value="{{old('mutasi_penduduk', $datapenduduk->mutasi_penduduk)}}"> <br>

            <div class="btn-wrap">
                <a href="{{ route('datapenduduk.index') }}" class="btn-kembali">Kembali</a>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>
        </form>
    </div>

</x-layout>