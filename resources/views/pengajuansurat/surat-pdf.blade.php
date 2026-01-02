<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan</title>
    <style>
        body{ 
            font-family:'Times New Roman', Times, serif; 
            font-size: 14px; 
        } 
        .title-wrapper {
            text-align: center; /* ini yang membuat judul berada di tengah */
        }
        .title{ 
            display: inline-block; 
            text-align: center; 
            font-weight: bold; 
            font-size: 20px; 
            margin-bottom: 0px; 
            text-transform: uppercase; 
            position: relative 
        }
        .nomor-surat {
            margin-top: 20px;
            margin-bottom: 0px;
        }
        .title::after { 
            content: ''; 
            display: block; 
            width: 100%; /* panjang garis */ 
            height: 2px; /* tebal garis */ 
            background: #000; 
            margin: 6px auto 0; /* auto = agar ke tengah */ 
            border-radius: 2px; /* opsional */ 
        } 
        .tembusan::after { 
            content: ''; 
            display: block; 
            width: 200px; /* panjang garis */ 
            height: 2px; /* tebal garis */ 
            background: #000; 
            border-radius: 2px; /* opsional */ 
        } 
        .indent { 
            text-indent: 40px; /* jarak tab dari kiri */ 
        } 
        .content{ 
            margin: 0 40px; 
            line-height: 1.3; 
        } 
        .kop-surat{ 
            text-align: center; 
            /* margin-bottom: 20px;  */
        } 
        .tanda-tangan{ 
            float: right; 
        } 
        .ttd-space{ 
            height: 70px; 
        } 
        .img-ttd{ 
            width: auto; 
            height: 80px; 
            float: right; 
            margin-right: 
            40px; 
        } 
        .kop{ 
            margin: 0 auto;
             height: 200px; 
             width: 800px; 
        } 
        .jabatan{ 
            text-align: right; 
            margin-right: 40px; 
        } 
        .nama-bandesa{ 
            text-align: right; 
            margin-right: 40px; /* margin-top: 50px; */ 
        }
    </style>

</head>
    <body>
        <div class="kop-surat">
            <img class="kop" src="./storage/assets/kop-desa.png" alt="">
        </div> 
        <!-- Judul Surat -->
        <div class="title-wrapper">
            <h2 class="title">{{$data_jenis->judul}}</h2>
        </div>

        <!-- Nomor Surat -->
        <div class="content">
        @if($data->jenis_surat === 'Keterangan Krama')
                <p style="text-align: center">Nomor: 00/S-KET/DAB/<?php 
                    $bulanRomawi = [
                        1 => 'I',
                        2 => 'II',
                        3 => 'III',
                        4 => 'IV',
                        5 => 'V',
                        6 => 'VI',
                        7 => 'VII',
                        8 => 'VIII',
                        9 => 'IX',
                        10 => 'X',
                        11 => 'XI',
                        12 => 'XII',
                        ];

                    $bulan = (int) today()->format('m');

                    echo $bulanRomawi[$bulan];
                ?>
                /{{today()->format('Y')}}</p>
            @else
            <table>
                <tr class="nomor-surat">
                    <td>Nomor</td>
                    <td>: 00/REK/DAB/{{today()->format('m')}}/{{today()->format('Y')}}</td>
                </tr>
                <tr>
                    <td>Prihal</td>
                    <td>: Rekomendasi</td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>: -</td>
                </tr>
            </table>
            @endif
            <!-- End Nomor Surat -->

            <!-- Pendahuluan Surat -->
            @if($data->jenis_surat === 'Keterangan Krama')
                <p class="indent">{{$data_jenis->pendahuluan}}</p>
            @else
                <p class="indent">{{$data_jenis->pendahuluan}}</p>
            @endif

            <!-- Isi Surat -->
            <table>
                <tr>
                    <td>Nama</td>
                    <td>: {{$data->name}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{$data->tanggal_lahir}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{$data->alamat}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{$data->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>No. Handphone</td>
                    <td>: {{$data->no_whatsapp}}</td>
                </tr>
            </table>

            <!-- Penutup Surat -->
            @if($data->jenis_surat === 'Keterangan Krama')
                <p class="indent">{{$data_jenis->penutup}}</p>
            @else
                <p class="indent">{{$data_jenis->penutup}}</p>
            @endif

            <br>

            <!-- Jabatan -->
            <div class="jabatan">
                <p>
                    Bualu, {{ now()->format('d F Y') }} 
                    <br>
                    <p>Bandesa Adat Bualu</p>
                </p>
            </div>

            <!-- TTD Bandesa -->
            <div class="ttd-space">
                <!-- <img class="img-ttd" src="./storage/assets/ttd-contoh.png" alt=""> -->
            </div>

            <!-- Nama Bandesa -->
            <div class="nama-bandesa">
                <p>I Made Suarma</p>
            </div>
                    
            <br>

            <!-- Tembusan Surat -->
            <div>
                @if($data->jenis_surat === 'Keterangan Krama')
                <p class="tembusan">Tembusan disampaikan kepada Yth:</p>
                    <ol>
                        <li>Sabha Desa Adat Bualu</li>
                        <li>Kerta Desa Adat Bualu</li>
                        <li>Prajuru Desa< Desa Adat Bualu/li>
                        <li>Arsipan</li>
                    </ol>
                @else
                <p class="tembusan">Tembusan disampaikan kepada Yth:</p>
                    <ol>
                        <li>Arsipan</li>
                    </ol>
                @endif
            </div>
        </div>
    </body>
</html>