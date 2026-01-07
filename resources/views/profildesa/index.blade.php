<x-layout>
  <x-slot:title>
    Profil Desa Adat Bualu
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

  @include('components.login-modal')
  <!-- Content -->
    <section class="min-h-screen mx-auto container">
      <div class="text-center mt-12 mb-6">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-1 text-amber-600 text-3xl"
        >
          Sambutan Kepala Desa
        </h2>
      </div>

    <!-- Btn Edit -->
    @foreach ($profilsdesa as $p)
      <div class="row">
        <div class="md:ml-auto mx-auto w-fit my-4">
        @auth
          @if (Auth::user()->role == 0)
          <a href="{{route('profildesa.edit-profildesa', $p->id)}}">
            <button
              type="button"
              class="btn bg-blue-900  hover:bg-blue-800 rounded-full w-fit px-4 py-2 text-white font-semibold"
            >
              <i class="fa-solid fa-edit"></i>
              Edit Data
            </button>
          </a>
          @endif
        @endauth
        </div>
      </div>
    <!-- End Btn Edit -->

    <!-- Sambutan Kepala Desa -->
      <div class="row my-8 flex">
        <div
          class="card max-w-full text-center items-center shadow-amber-600 shadow-xl mx-auto p-5 rounded-2xl"
        >
          <img class="w-60 mx-auto" src="{{asset('storage/' . ($p->image ?: 'profil_images/default.png'))}}" alt="" />
          <h4 class="font-bold text-balance mt-2 text-lg">
            {{$p->name}}
          </h4>
          <p class="text-sm mt-2">BANDESA ADAT BUALU</p>
        </div>
      </div>
     
    <!-- Text Sambutan -->
      <div class="flex-wrap mx-auto my-10 px-4 md:px-16 max-w-5xl">
        <div class="sambutan">
          <p class="text-lg md:text-xl text-justify font-medium leading-relaxed indent-10 p-4">
            {{$p->sambutan_bendesa}}
          </p>
        </div>
      </div>
    <!-- End Sambutan -->

    <!-- Visi Misi -->
      <div class="grid md:grid-cols-2 gap-8 my-14 px-4 mx-5 md:px-0">
        <!-- Visi -->
          <div class="bg-amber-500 shadow-lg shadow-amber-400 rounded-xl p-8 text-center text-white">
            <h4 class="font-bold text-3xl mb-5">Visi</h4>
            <p class="text-left">{{ $p->visi_desa }}</p>
          </div>

        <!-- Misi -->
          <div class="bg-amber-500 shadow-lg shadow-amber-400 rounded-xl p-8 text-center text-white">
            <h4 class="font-bold text-3xl mb-5">Misi</h4>
              <ul class="text-left space-y-2 list-disc list-inside">
                  @foreach(explode("\n", $p->misi_desa) as $misi)
                    @if(trim($misi) !== '')
                      <li>{{ $misi }}</li>
                    @endif
                  @endforeach
              </ul>
          </div>
      </div>
    <!-- End Visi Misi -->

    <!-- Sejarah Desa -->
      <div class="text-center mt-14">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 text-amber-600 text-3xl"
        >
          Sejarah Desa Adat Bualu
        </h2>
      </div>

      <div class="m-4 p-4">
        <p class="text-lg font-thin text-justify">
          {{$p->sejarah_desa}}
        </p>
      </div>
    <!-- End Sejarah Desa -->

    <!-- Informasi Geografis -->
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 text-amber-600 text-3xl"
        >
          Letak Geografis
        </h2>
      </div>

      <div
        class="flex flex-col md:flex-row shadow-lg shadow-amber-600 rounded-lg m-5 p-5 
            justify-center md:justify-between items-center gap-0 md:gap-6">

      <!-- Box Luas Desa -->
        <div class="flex items-center text-center md:text-left">
          <i class="fa-solid fa-city text-6xl md:text-9xl m-3"></i>
          <div>
            <h4 class="font-bold text-2xl md:text-3xl">Lokasi Banjar Adat</h4>
            <h2 class="text-xl md:text-2xl">Desa Adat Bualu <span class="text-sm"></span></h2>
          </div>
        </div>

      <!-- DEKSTOP Kolom Banjar Kiri -->
        <div class="mt-5 w-full md:w-auto">
          <div class="space-y-3 text-lg md:text-2xl">

            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a href="https://maps.app.goo.gl/6RjoGcNxsTV8UyTs7?g_st=com.google.maps.preview.copy" class="hover:text-amber-700">
                Br. Terora
              </a>
            </div>

            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a href="https://maps.app.goo.gl/C3qUkpFEDQM25Xat8?g_st=com.google.maps.preview.copy" class="hover:text-amber-700">
                Br. Celuk
              </a>
            </div>

            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a href="https://maps.app.goo.gl/X1Ad2w3Jn97FzsEV7?g_st=com.google.maps.preview.copy" class="hover:text-amber-700">
                Br. Peken
              </a>
            </div>

            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a href="https://maps.app.goo.gl/zSBWSgVUPec7Xevs8" class="hover:text-amber-700">
                Br. Penyarikan
              </a>
            </div>

          </div>
        </div>
      <!-- End DESTOP Kolom Banjar Kiri -->

      <!-- DEKSTOP Kolom Banjar Kanan -->
        <div class="mt-5 w-full md:w-auto">
          <div class="space-y-3 text-lg md:text-2xl">
            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a href="https://maps.app.goo.gl/EhbGEKFDHRdrJU1M6" class="hover:text-amber-700">
                Br. Pande
              </a>
            </div>

            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a href="https://maps.app.goo.gl/PYfg4U3vG1bJyUi78" class="hover:text-amber-700">
                Br. Balekembar
              </a>
            </div>

            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a href="https://maps.app.goo.gl/Yvqp1uqoLYgot1mK8" class="hover:text-amber-700">
                Br. Bualu
              </a>
            </div>

            <div class="flex items-center space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a href="https://maps.app.goo.gl/k4qZbMkoD4ZZgcZeA" class="hover:text-amber-700">
                Br. Mumbul
              </a>
            </div>

          </div>
        </div>
      <!-- End DEKSTOP Kolom Banjar Kanan -->
    @endforeach
    <!-- End Informasi Geografis -->

    </section>
  <!-- End Content -->
   
</x-layout>