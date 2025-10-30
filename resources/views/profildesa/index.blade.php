 <!-- Ex-Layout -->
     <x-layout>
      <x-slot:title>
        Profil Desa Adat Bualu
      </x-slot>

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
        animation: slideIn 0.4s ease-out forwards;
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


      <script>
      setTimeout(() => {
          const msg = document.getElementById('successMessage');
          if(msg){
              msg.style.opacity = '0';
              setTimeout(() => msg.remove(), 1000);
          }
      }, 3000);
      </script>
      <!-- End Notifikasi berhasil disimpan -->

    <!-- Content -->
    <section class="min-h-screen mx-auto container">
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Sambutan Kepala Desa
        </h2>
      </div>

      <!-- Btn Edit -->
      @foreach ($profilsdesa as $p)
      <div class="row">
        <div class="md:ml-auto mx-auto w-fit my-10">
          <a href="{{route('profildesa.edit-profildesa', $p->id)}}">

          @auth
          @if (Auth::user()-> role == 0)
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-4 py-2 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
          @endif
          @endauth
        </div>
      </div>
      <!-- End Btn Edit -->

      <!-- Sambutan Kepala Desa -->
      <div class="row my-5 flex">
        <div
          class="card max-w-full text-center items-center shadow-amber-600 shadow-xl mx-auto p-5 rounded-2xl"
        >
          <img class="w-60 mx-auto" src="{{asset('storage/' . ($p->image ?: 'profil_images/default.png'))}}" alt="" />
          <h4 class="font-bold text-balance mt-2 text-lg">
            {{$p->name}}
          </h4>
          <p class="text-sm mt-2">BENDESA ADAT BUALU</p>
        </div>
      </div>
     

      <!-- Text Sambutan -->
      <div class="flex-wrap m-5 p-5 text-center my-10 px-2 md:px-16">
        <div class="sambutan">
          <p class="text-xl text-justify font-medium leading-relaxed">
            {{$p->sambutan_bendesa}}
          </p>
        </div>
      </div>
      <!-- End Sambutan -->

      <!-- Visi Misi -->
      <div class="flex-wrap m-5 p-5 grid md:grid-cols-2 gap-6 my-12">
      
        <!-- Visi -->
         <div class="bg-amber-500 shadow-lg shadow-amber-400 rounded-xl p-8 text-center text-white">
            <h4 class="font-bold text-3xl mb-4">Visi</h4>
            <p class="text-justify">{{ $p->visi_desa }}</p>
        </div>

        <!-- Misi -->
        <div class="bg-amber-500 shadow-lg shadow-amber-400 rounded-xl p-8 text-center text-white">
          <h4 class="font-bold text-3xl mb-4">Misi</h4>
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
      <div class="text-center mt-10">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Sejarah Desa Adat Bualu
        </h2>
      </div>

      <div class="flex-wrap m-5 p-5 text-justify px-5">
        <p class="text-lg font-thin text-justify">
          {{$p->sejarah_desa}}
        </p>
      </div>
      <!-- End Sejarah Desa -->

      <!-- Informasi Geografis -->
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Letak Geografis
        </h2>
      </div>

      <div
      class="flex flex-col md:flex-row shadow-lg shadow-amber-600 rounded-lg m-5 p-5 
            justify-center md:justify-between items-center gap-6">

      <!-- Box Luas Desa -->
      <div class="flex items-center text-center md:text-left">
        <i class="fa-solid fa-city text-6xl md:text-9xl m-3"></i>
        <div>
          <h4 class="font-bold text-2xl md:text-3xl">Luas Desa Adat Bualu</h4>
          <h2 class="text-xl md:text-2xl">100.000 <span class="text-sm">m2</span></h2>
        </div>
      </div>

      <!-- Kolom Banjar Kiri -->
      <div class="mt-5">
        <div class="space-y-3 text-lg md:text-2xl">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-house-chimney"></i>
            <a href="https://maps.app.goo.gl/6RjoGcNxsTV8UyTs7?g_st=com.google.maps.preview.copy" class="hover:text-amber-700">
              Banjar Terora
            </a>
          </div>
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-house-chimney"></i>
            <a href="https://maps.app.goo.gl/C3qUkpFEDQM25Xat8?g_st=com.google.maps.preview.copy" class="hover:text-amber-700">
              Banjar Celuk
            </a>
          </div>
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-house-chimney"></i>
            <a href="https://maps.app.goo.gl/X1Ad2w3Jn97FzsEV7?g_st=com.google.maps.preview.copy" class="hover:text-amber-700">
              Banjar Peken
            </a>
          </div>
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-house-chimney"></i>
            <a href="https://maps.app.goo.gl/zSBWSgVUPec7Xevs8" class="hover:text-amber-700">
              Banjar Penyarikan
            </a>
          </div>
        </div>
      </div>

      <!-- Kolom Banjar Kanan -->
      <div class="mt-5">
        <div class="space-y-3 text-lg md:text-2xl">
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-house-chimney"></i>
            <a href="https://maps.app.goo.gl/EhbGEKFDHRdrJU1M6" class="hover:text-amber-700">Banjar Pande</a>
          </div>
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-house-chimney"></i>
            <a href="https://maps.app.goo.gl/PYfg4U3vG1bJyUi78" class="hover:text-amber-700">Banjar Balekembar</a>
          </div>
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-house-chimney"></i>
            <a href="https://maps.app.goo.gl/Yvqp1uqoLYgot1mK8" class="hover:text-amber-700">Banjar Bualu</a>
          </div>
          <div class="flex items-center space-x-3">
            <i class="fa-solid fa-house-chimney"></i>
            <a href="https://maps.app.goo.gl/k4qZbMkoD4ZZgcZeA" class="hover:text-amber-700">Banjar Mumbul</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <!-- End Informasi Geografis -->
  </section>
  <!-- End Content -->
</x-layout>