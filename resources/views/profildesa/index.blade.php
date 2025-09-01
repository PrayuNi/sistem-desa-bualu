<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Profil Desa</title>
</head>
<body>
    <h1>Data Profil Desa</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Sambutan Bendesa</th>
                <th>Sejarah Desa</th>
                <th>Visi Desa</th>
                <th>Misi Desa</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profilsdesa as $profil)
            <tr>
                <td>{{ $profil->id }}</td>
                <td>{{ $profil->sambutan_bendesa }}</td>
                <td>{{ $profil->sejarah_desa }}</td>
                <td>{{ $profil->visi_desa }}</td>
                <td>{{ $profil->misi_desa }}</td>
                <!-- 2.4 Untuk menampilkan gambar, dan menjalankan link >> 2.5 ada di profildesa controller -->
                <td><img src="{{asset('storage/' . ($profil->image ?: 'profil_images/default.png')) }}" alt="gambar" width="100"></td>
                <td>
                    <form action="{{route('profildesa.delete', $profil->id)}}" method="POST" onsubmit="return confirm ('Yakin Mau Dihapus?')" >
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>