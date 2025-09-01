<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
</head>
<body>
    <h1>List User</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Password</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->tempat_tanggallahir}}</td>
                <td>{{ $user->alamat}}</td>
                <td>{{ $user->password}}</td>
                <td>{{ $user->email}}</td>
                <td>
                    <form action="{{route('user.delete', $user->id)}}" method="POST" onsubmit="return confirm ('Yakin Mau Dihapus?')" >
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