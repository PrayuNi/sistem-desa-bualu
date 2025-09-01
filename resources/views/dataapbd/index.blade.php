<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data APBD</title>
</head>
<body>
    <h1>Data APBD</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pendapatan</th>
                <th>Pengeluaran</th>
                <th>Belanja</th>
                <th>Surplus/Defisit</th>
                <th>File APBD</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataapbd as $dataapbd)
            <tr>
                <td>{{ $dataapbd->id }}</td>
                <td>{{ $dataapbd->pendapatan }}</td>
                <td>{{ $dataapbd->pengeluaran }}</td>
                <td>{{ $dataapbd->belanja }}</td>
                <td>{{ $dataapbd->surplus_defisit }}</td>
                <!-- 2.4 Untuk menampilkan gambar, dan menjalankan link >> 2.5 ada di profildesa controller -->
                <td>{{ $dataapbd->pdf }}</td>
                <td>
                    <form action="{{route('dataapbd.delete', $dataapbd->id)}}" method="POST" onsubmit="return confirm ('Yakin Mau Dihapus?')" >
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