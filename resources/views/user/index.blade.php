<x-layout>
        <x-slot:title>
            Edit Profile
        </x-slot>
    
    <!-- Notifikasi Berhasil Disimpan -->
    @if(session('success'))
      <div id="toastSuccess" class="fixed top-5 right-5 flex items-center p-4 rounded-lg shadow-lg bg-green-600 text-white animate-slide-in">
        <i class="fa-solid fa-circle-check text-2xl mr-3"></i>
        <span class="text-lg font-semibold">{{ session('success') }}</span>
      </div>

      <style>
        @keyframes slideIn {
          from { opacity: 0; transform: translateX(100%); }
          to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideOut {
          from { opacity: 1; transform: translateX(0); }
          to { opacity: 0; transform: translateX(100%); }
        }
        .animate-slide-in{
          animation: slideIn 0.10s ease-out forwards;
        }
      </style>

      <script>
        setTimeout(() => {
          const toast = document.getElementById('toastSuccess');
          toast.style.animation = "slideOut 0.5s ease-in forwards";
          setTimeout(() => toast.remove(), 600);
        }, 3000);
      </script>
      @endif
      <!-- End Notifikasi Berhasil Disimpan -->

        <h2>Edit Profile User</h2>
<style>
    .row-card {
        margin: 10px auto;
        max-width: 1200px;
        background-color: #fff;
        padding: 5px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    h2{
        text-align: center;
        margin: 20px;
        font-size: xx-large;
        font-weight: bold;
        color: #F79E17;
    }
    table{
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 20px 5px rgba(0,0,0,0,1);
    }
    th, td{
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }
    th{
        background-color: #f4f4f4;
        font-weight: bold;
    }
    tr:nth-child(even){
        background-color: #f9f9f9;
    }
    tr:hover{
        background-color: #f1f1f1;
    }
    .table-container {
        width: 90%;
        margin: 20px auto;
        overflow-x: auto;
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0, 0.8);
        padding: 15px;
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 16px;
        overflow: hidden;
        min-width: 850px;
    }

    .modern-table th {
        background: linear-gradient(to top, #f59e0b, #fbbf24);
        color: white;
        padding: 14px;
        text-align: center;
        font-weight: bold;
        font-size: 15px;
    }

    .modern-table td {
        padding: 14px;
        text-align: center;
        border-bottom: 1px solid #eee;
    }

    .modern-table tr:hover {
        background: #fff7e6;
        transition: 0.2s;
    }

    .table-container::-webkit-scrollbar {
        height: 7px;
    }
    .table-container::-webkit-scrollbar-thumb {
        background: #fbbf24;
        border-radius: 20px;
    }
    .btn-edit {
       background: #1e40af;
       padding: 8px 16px;
       border-radius: 20px;
       color: white;
       font-weight: 600;
       border: none;
       cursor: pointer;
       transition: 0.2s;
    }

    .btn-edit:hover {
        background: #1e3a8a;
    }
</style>
    <div class="table-container">
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

    @Auth
        @if (Auth::user()->role == 0)
        <div class="row flex float-right">
            <a href="{{route('user.create-user')}}">
            <button
                type="button"
                class="btn bg-gray-400 rounded-full w-fit px-4 py-2 m-5 text-black font-semibold"
            >
            <i class="fa-solid fa-plus"></i> Tambah Data
            </button>
            </a> <br>
        </div> 
        @endif
  @endauth
    <table class="modern-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NIK</th>
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
                <td>{{ $user->nik }}</td>
                <td>{{ $user->password}}</td>
                <td>{{ $user->email}}</td>
                <td>
                    <div class="row flex justify-center">
                        <a href="{{route('user.edit-user', $user->id)}}">
                            <button
                                type="button"
                                class="btn-edit bg-blue-700"
                            >
                                <i class="fa-solid fa-edit"></i>
                            </button>
                        </a>
                        <form action="{{route('user.delete', $user->id)}}" method="POST" onsubmit="return confirm ('Yakin Mau Dihapus?')" >
                            @csrf
                            @method('DELETE')
                            <button class="btn-edit bg-red-700" type="submit"> <i class="fa-solid fa-trash"></i> </button>
                        </form>    
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</x-layout> 