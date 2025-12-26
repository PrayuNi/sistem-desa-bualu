  <x-layout>
    <x-slot:title>
      Edit Data Struktur Prejuru
    </x-slot>

    <!--Notifikasi berhasil disimpan  -->
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
    <!-- End Notifikasi berhasil disimpan -->

    <!-- Notifikasi berhasil dihapus -->
        @if(session('delete'))
        <div id="toastDelete" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="flex items-center p-4 rounded-xl shadow-xl bg-red-600 text-white animate-fade-in">
            <i class="fa-solid fa-trash-can text-2xl mr-3"></i>
            <span class="text-lg font-semibold">{{ session('delete') }}</span>
            </div>
        </div>

        <style>
            @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
            }
            @keyframes fadeOut {
            from { opacity: 1; transform: scale(1); }
            to { opacity: 0; transform: scale(0.9); }
            }
            .animate-fade-in {
            animation: fadeIn 0.25s ease-out forwards;
            }
        </style>

        <script>
            setTimeout(() => {
            const toast = document.getElementById('toastDelete');
            const card = toast.querySelector('div');
            card.style.animation = "fadeOut 0.4s ease-in forwards";
            setTimeout(() => toast.remove(), 500);
            }, 2500);
        </script>
        @endif  
    <!-- End Notifikasi berhasil dihapus -->

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
        text-align:center; 
        margin-top:20px;
        font-size: xx-large;
        color:#F99C0F; 
        font-weight:bold;
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
        color: white;
      }
      .btn-edit:hover {
        background: #1e3a8a;
      }
      .btn-delete {
        background: #c53030;
        color: white;
      }
      .btn-delete:hover {
        background: #e53e3e;
      }
      .btn-kembali {
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
      .btn-tambah {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
      }
      .btn-tambah button {
        margin: 0 !important; /* override m-5 */
      }
      .btn-tambah button:hover {
        background-color: #718096;
      }
      .aksi-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px; /* jarak antar tombol */
      }
      .aksi-btn a, .aksi-btn button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        font-size: 15px;
        border: none;
        cursor: pointer;
        transition: 0.2s;
      }
    </style>

    <h2>Edit Data Struktur Prejuru</h2>
    <!-- Button Tambah -->
    @Auth
        @if (Auth::user()->role == 0)
        <div class="btn-tambah">
            <a href="{{route('structure.create-structure')}}">
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
    <!-- End Button Tambah -->

    <div class="table-container">
      <table class="modern-table">
        <tr>
          <th>Id</th>
          <th>Nama</th>
          <th>Posisi</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>

        @foreach($structures as $item)
          <tr>
            <td>{{$item->position_id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->position}}</td>
            <td> 
              <div class=" flex justify-center"> <img class="w-20" src="{{asset('storage/' . ($item->image ?? 'structureprejuru_images/default.png'))}}" alt=""></div>
            </td>

            <td>
              <div class="aksi-btn">
                <a href="{{route('structure.edit-structure', $item->id)}}">
                  <button type="button" class="btn-edit">
                    <i class="fa-solid fa-edit"></i>
                  </button>
                </a>
                <form action="{{route('structure.delete', $item->id)}}" 
                  method="POST" 
                  onsubmit="return confirm('Yakin Mau Dihapus?')">
                  @csrf
                  @method('DELETE')
                    <button class="btn-delete" type="submit">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
              </div> 
            </td>
          </tr>
        @endforeach
      </table>
    </div>

    <!-- Tombol Kembali -->
    <div class="flex justify-center my-8">
        <a href="{{ route('structure.index') }}" 
           class="btn-kembali">
           <i class="fa-solid fa-arrow-left mr-2"></i> Kembali Halaman Struktur Prejuru
        </a>
    </div>

    </x-layout> 

        