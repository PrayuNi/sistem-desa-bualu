 <!-- Ex-Layout -->
    <x-layout>
      <x-slot:title>
        Data Penduduk Desa Adat Bualu
      </x-slot>

  <!-- Konten -->
    <!-- Title -->
    <section class="content h-fit container mx-auto py-7">
      <div
        class="title w-fit px-7 py-5 border-solid border-2 border-black mx-60 rounded-lg m-2 p-2 text-center shadow-lg shadow-amber-200"
      >
        <h4 class="font-semibold text-3xl">Administrasi Penduduk Adat Desa Adat Bualu</h4>
        <p>Jumlah ini menunjukkan total penduduk adat (Krama Adat) yang tinggal di Desa Adat Bualu dan terdaftar sebagai warga banjar di wilayah Desa Adat Bualu.
        </p>
      </div>
      <!-- End Title -->
      @foreach($datapenduduk as $d)
      @Auth
      @if (Auth::user()->role == 0)
      <!-- Btn Edit -->
      <div class="row">
        <div class="ml-auto w-fit my-10">
           <a href="{{route('datapenduduk.edit-datapenduduk', $d->id)}}">
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
      @endif
      @endauth


      <!-- Card Konten -->
      <div class="row">
        <div class="row">
          <div
            class="card text-center shadow-lg rounded-lg shadow-orange-300 w-50 px-10 py-10 mx-auto mt-10"
          >
            <img src="{{asset('storage/assets/people-together.png')}}" alt="penduduk" class="" />
            <br>
            <h4 class="font-semibold text-3xl">{{$d->penduduk}}</h4>
            <p>Penduduk Adat Keseluruhan</p>
          </div>
        </div>
        <div class="row flex flex-wrap justify-center mx-auto">
          <div
            class="card text-center shadow-lg rounded-lg shadow-orange-300 w-50 px-10 py-10 mx-3 mt-10"
          >
            <img src="{{asset('storage/assets/hindu_man.png')}}" alt="laki_laki" style="width:150px; height: 120px;" />
            <br>
            <h4 class="font-semibold text-3xl">{{$d->laki_laki}}</h4>
            <p>Laki-Laki</p>
          </div>
          <div
            class="card text-center shadow-lg rounded-lg shadow-orange-300 w-50 px-10 py-10 mx-3 mt-10"
          >
            <img src="{{asset('storage/assets/hindu_woman.png')}}" alt="laki_laki" style="width:150px; height: 120px;" />
            <br>
            <h4 class="font-semibold text-3xl">{{$d->perempuan}}</h4>
            <p>Perempuan</p>
          </div>
          <div
            class="card text-center shadow-lg rounded-lg shadow-orange-300 w-50 px-10 py-10 mx-3 mt-10"
          >
            <img src="{{asset('storage/assets/tourist.png')}}" alt="mutasi_penduduk" class="" />
            <br>
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