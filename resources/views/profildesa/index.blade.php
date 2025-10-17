 <!-- Ex-Layout -->
     <x-layout>
      <x-slot:title>
        Profil Desa Adat Bualu
      </x-slot>

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
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-4 py-2 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
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
      <div class="text-center my-10">
        <div class="sambutan">
          <p class="font-medium text-2xl">
            {{$p->sambutan_bendesa}}
          </p>
        </div>
      </div>

      <!-- End Sambutan -->

      <!-- Visi Misi -->
      <div class="row container mx-auto flex justify-center">
        <div
          class="visi text-center p-10 shadow-lg shadow-amber-400 bg-amber-500 rounded-lg m-5"
        >
          <h4 class="font-bold text-4xl text-amber-50">Visi</h4>
          <p class="mt-5 text-white text-justify">
            {{$p->visi_desa}}
          </p>
        </div>
        <div
          class="misi p-10 text-center  shadow-lg shadow-amber-400 bg-amber-500 rounded-lg m-5 text-white"
        >
          <h4 class="font-bold text-4xl text-amber-50">Misi</h4>
          <div class="text-left">
            <li>
              {{$p->misi_desa}}
            </li>
            <li>
              {{$p->misi_desa}}
            </li>
            <li>
              {{$p->misi_desa}}
            </li>
          </div>
        </div>
      </div>
      <!-- End Visi Misi -->

      <!-- Sejarah Desa -->
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Sejarah Desa Adat Bualu
        </h2>
      </div>

      <div class="text-justify px-5">
        <p class="text-lg font-thin text-center">
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
        class="flex flex-wrap shadow-lg shadow-amber-600 rounded-lg m-5 p-5 justify-around items-center md:justify-end"
      >
        <div class="col flex flex-wrap text-center md:text-left mx-10">
          <i class="fa-solid fa-city text-9xl m-3"></i>
          <div class="col">
            <h4 class="font-bold text-3xl">Luas Desa Adat Bualu</h4>
            <h2 class="text-2xl">100.000 <span class="text-sm">m2 </span></h2>
          </div>
        </div>
        <div class="col min-w-70 mt-5">
          <div class="space-y-4 text-2xl w-full md:w-auto">
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a
                href="https://maps.app.goo.gl/6RjoGcNxsTV8UyTs7?g_st=com.google.maps.preview.copy"
              >
                <span>Banjar Terora</span>
              </a>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a
                href="https://maps.app.goo.gl/C3qUkpFEDQM25Xat8?g_st=com.google.maps.preview.copy"
              >
                <span>Banjar Celuk</span>
              </a>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a
                href="https://maps.app.goo.gl/X1Ad2w3Jn97FzsEV7?g_st=com.google.maps.preview.copy"
              >
                <span>Banjar Peken</span>
              </a>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a
                href="https://maps.app.goo.gl/zSBWSgVUPec7Xevs8"
              >
                <span>Banjar Penyarikan</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col min-w-70 mt-5">
          <div class="space-y-4 text-2xl w-full md:w-auto">
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
               <a
                href="https://maps.app.goo.gl/EhbGEKFDHRdrJU1M6"
              >
              <span>Banjar Pande</span>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
               <a
                href="https://maps.app.goo.gl/PYfg4U3vG1bJyUi78"
              >
              <span>Banjar Balekembar</span>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
               <a
                href="https://maps.app.goo.gl/Yvqp1uqoLYgot1mK8"
              >
              <span>Banjar Bualu</span>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
               <a
                href="https://maps.app.goo.gl/k4qZbMkoD4ZZgcZeA"
              >
              <span>Banjar Mumbul</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      <!-- End Informasi Geografis -->
    </section>
    <!-- End Content -->

</x-layout>