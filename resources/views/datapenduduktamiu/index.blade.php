 <!-- Ex-Layout -->
    <x-layout>
      <x-slot:title>
        Data Penduduk Tamiu Desa Adat Bualu
      </x-slot>

  <!-- Konten -->
    <!-- Title -->
    <section class="content h-fit container mx-auto py-7">
      <div
        class="title w-fit px-7 py-5 border-solid border-2 border-black mx-auto rounded-lg m-2 p-2 text-center shadow-lg shadow-amber-200"
      >
        <h4 class="font-semibold text-3xl">Administrasi Penduduk Desa Adat Bualu</h4>
        <p>Data Penduduk Gabungan Dari Penduduk Adat & Penduduk Tamiu Desa Adat
          Bualu</p>
      </div>
      <!-- End Title -->
      @foreach($datapenduduk as $d)
      <!-- Btn Edit -->
      <div class="row">
        <div class="ml-auto w-fit my-10">
           <a href="{{route('datapenduduktamiu.edit-datapenduduktamiu', $d->id)}}">
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
            </a>
        </div>
      </div>
      <!-- End Btn Edit -->


      <!-- Card Konten -->
      <div class="row">
        <div class="row">
          <div
            class="card text-center shadow-lg shadow-orange-100 w-40 px-10 py-10 mx-auto mt-10"
          >
            <i class="fa-solid fa-people-group text-6xl"></i>
            <h4 class="font-semibold text-3xl">{{$d->penduduk}}</h4>
            <p>Penduduk</p>
          </div>
        </div>
        <div class="row flex flex-wrap justify-center mx-auto">
          <div
            class="card text-center shadow-lg shadow-orange-100 w-40 px-10 py-10 mx-3 mt-10"
          >
            <i class="fa-solid fa-person text-6xl"></i>
            <h4 class="font-semibold text-3xl">{{$d->laki_laki}}</h4>
            <p>Laki-Laki</p>
          </div>
          <div
            class="card text-center shadow-lg shadow-orange-100 w-40 px-10 py-10 mx-3 mt-10"
          >
            <i class="fa-solid fa-person-dress text-6xl"></i>
            <h4 class="font-semibold text-3xl">{{$d->perempuan}}</h4>
            <p>Perempuan</p>
          </div>
          <div
            class="card text-center shadow-lg shadow-orange-100 w-40 px-10 py-10 mx-3 mt-10"
          >
            <i class="fa-solid fa-person-walking-arrow-right text-6xl"></i>
            <h4 class="font-semibold text-3xl">{{$d->mutasi_penduduk}}</h4>
            <p>Mutasi Penduduk</p>
          </div>
        </div>
      </div>
      <!-- End Card Konten -->
    </section>
    <!-- End Konten -->
           @endforeach

    </x-layout> 