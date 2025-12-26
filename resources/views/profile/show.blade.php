<x-layout>
    <x-slot:title>
        Profil Saya
    </x-slot:title>

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

    <style>
        .btn-wrap {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn-kembali, .btn-edit {
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
        .btn-edit {
            background-color: #28a745;
            color: white;
        
        }
        .btn-edit:hover {
            background-color: #218838;
        }
    </style>

    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Profil Saya
        </h2>

        <div class="flex items-center space-x-6">
            <!-- Foto Profil -->
            <div>
                @if(Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Foto Profil" class="w-24 h-24 rounded-full object-cover border">
                @else
                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-400 text-3xl">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            <!-- Info Pengguna -->
            <div class="flex-1">
                <p class="text-gray-700"><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p class="text-gray-700"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p class="text-gray-700"><strong>Role:</strong> 
                    @if(Auth::user()->role == 0)
                        Admin
                    @elseif(Auth::user()->role == 1| Auth::user()->role == 2)
                        User
                    @else
                        Guest
                    @endif
                </p>
            </div>
        </div>

        <div class="btn-wrap">
            <a href="{{ route('dashboard') }}" class="btn-kembali">Kembali</a>
            <a href="{{ route('profile.edit') }}" class="btn-edit">Edit</a>
        </div>
    </div>
</x-layout>
