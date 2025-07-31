<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Structure Staff</title>
</head>
<body>
     <h1>Data Structure Staff</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($structuresstaff as $staff)
            <tr>
                <td>{{ $staff->id }}</td>
                <td>{{ $staff->name }}</td>
                <td>{{ $staff->position }}</td>
                <!-- 2.4 Untuk menampilkan gambar, dan menjalankan link >> 2.5 ada di structure controller -->
                <td><img src="{{asset('storage/' . ($staff->image ?: 'structure_images/default.png')) }}" alt="gambar" width="100"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>