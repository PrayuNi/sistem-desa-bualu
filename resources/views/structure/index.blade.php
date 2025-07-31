<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Structure</title>
</head>
<body>
    <h1>Data Structure</h1>
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
            @foreach ($structures as $structure)
            <tr>
                <td>{{ $structure->id }}</td>
                <td>{{ $structure->name }}</td>
                <td>{{ $structure->position }}</td>
                <!-- 2.4 Untuk menampilkan gambar, dan menjalankan link >> 2.5 ada di structure controller -->
                <td><img src="{{asset('storage/' . ($structure->image ?: 'structure_images/default.png')) }}" alt="gambar" width="100"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>