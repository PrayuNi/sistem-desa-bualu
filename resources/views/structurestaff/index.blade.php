<x-layout>
  <x-slot:title>
    Struktur Staff Kantor Desa
  </x-slot>
  
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

  <!-- Notifikasi berhasil disimpan -->
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
  
  @include('components.login-modal')
  @include('components.notif-modal')
  <!-- Konten -->
    <section class="strukturprejuru container pt-10 pb-16 mx-auto">

  <!-- Title -->
    <div class="text-center">
      <h2
        class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600  after:mx-auto after:mt-1 m-5 text-amber-600 text-3xl"
        >
        Struktur Staff Kantor Desa
      </h2>
    </div>
  <!-- End Title -->

  <!-- Button Tambah -->
    <div class="row">
      <div class="md:ml-auto mx-auto w-fit">
        @Auth
        @if (Auth::user()->role == 0)
          <a href="{{route('structurestaff.create-structurestaff')}}">
            <button
              type="button"
              class="btn bg-gray-400 hover:bg-gray-500 rounded-full w-fit px-4 py-2 m-5 text-black font-semibold"
              >
              <i class="fa-solid fa-plus"></i> Tambah Data
            </button>
          </a>
        @endif
        @endauth
      </div>
    </div>
  <!-- End button tambah -->

  <!-- Card Staff -->
    <div class="row my-5 flex justify-center flex-wrap">

    <!-- Card Admin -->
      @foreach($structuresstaff as $s)
      <div class="card max-w-70 max-h-120 text-center items-center shadow-xl shadow-amber-700 mx-auto p-10 rounded-xl">
        <div class="row flex float-right">
          @Auth
          @if (Auth::user()->role == 0)
            <a href="{{route('structurestaff.edit-structurestaff', $s->id)}}">
              <button
                type="button"
                class="btn bg-blue-900 hover:bg-blue-800 rounded-full w-fit px-3 py-1 mb-3  text-white font-semibold"
                >
                <i class="fa-solid fa-edit"></i>
              </button>
            </a>
            
            <form action="{{route('structurestaff.delete', $s->id)}}" method="POST" onsubmit="return confirm ('Yakin Mau Dihapus?')" >
              @csrf
              @method('DELETE')
              <button class="btn bg-red-700 hover:bg-red-600 rounded-full w-fit px-3 py-1 text-white font-semibold" type="submit"> <i class="fa-solid fa-trash"></i> </button>
            </form>
          @endif
          @endauth  
        </div>

        <!-- Image Admin -->
          <img class="w-60 mx-auto rounded-xl" src="{{asset('storage/' . ($s->image ?? 'structure_images/default.png'))}}" alt="" />
        
        <!-- Nama Admin -->
          <h4 class="font-bold text-balance mt-2 text-lg">
            {{$s->name}}
          </h4>

        <!-- Jabatan Admin -->
          <p class="text-sm mt-2">{{$s->position}}</p>
      </div>
      @endforeach

    </section>
  <!-- End Konten -->

</x-layout>