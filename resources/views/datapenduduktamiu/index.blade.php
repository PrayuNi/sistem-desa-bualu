<x-layout>
  <x-slot:title>
    Data Penduduk Tamiu Desa Adat Bualu
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
  <!-- Konten -->
    <section class="content h-fit container mx-auto py-7 px-2">

      <!-- Title -->
        <div
          class="mx-auto title w-fit px-7 py-5 border-solid border-2 border-black rounded-lg m-2 p-2 text-center shadow-lg shadow-amber-200"
          >
          <h4 class="font-semibold text-3xl">Administrasi Penduduk Tamiu Desa Adat Bualu</h4>
          <p>Jumlah ini menunjukkan total penduduk pendatang (Krama Tamiu) yang tinggal sementara di Desa Adat Bualu dan terdaftar sebagai warga sementara.</p>
          <p>Data berasal dari masyarakat pendatang yang telah membuat surat keterangan KIPem di Desa Adat Bualu.</p>

        </div>
      <!-- End Title -->

      <!-- Button Edit -->
        @foreach($datapenduduktamiu as $d)
        @Auth
          @if (Auth::user()->role == 0)
          <div class="row">
            <div class="md:ml-auto mx-auto w-fit my-1 mt-5">
              <a href="{{route('datapenduduktamiu.edit-datapenduduktamiu', $d->id)}}">
                <button
                  type="button"
                  class="btn bg-blue-900  hover:bg-blue-800 rounded-full w-fit px-4 py-2 text-white font-semibold"
                >
                  <i class="fa-solid fa-edit"></i>
                  Edit Data
                </button>
              </a>
            </div>
          </div>
          @endif
        @endauth
      <!-- End Button Edit -->

      <!-- Card Konten -->
        <div class="row">
          <!-- Card Atas -->
          <div class="row">
            <div
              class="card text-center shadow-lg rounded-lg shadow-orange-300 w-50 px-10 py-10 mx-auto mt-10"
              >
              <img src="{{asset('storage/assets/people-together.png')}}" alt="penduduk" class="" />
              <br>
              <h4 class="font-semibold text-3xl">{{number_format($d->penduduk, 0, ',', '.') }}</h4>
              <p>Penduduk Tamiu Keseluruhan</p>
            </div>
          </div>

          <!-- Card Bawah -->
          <div class="row flex flex-wrap justify-center mx-auto">
            <div
              class="card text-center shadow-lg rounded-lg shadow-orange-300 w-50 px-10 py-10 mx-3 mt-10"
              >
              <img src="{{asset('storage/assets/man.png')}}" alt="laki_laki" class="" />
              <br>
              <h4 class="font-semibold text-3xl">{{number_format($d->laki_laki, 0, ',', '.') }}</h4>
              <p>Laki-Laki</p>
            </div>

            <div
              class="card text-center shadow-lg rounded-lg shadow-orange-300 w-50 px-10 py-10 mx-3 mt-10"
              >
              <img src="{{asset('storage/assets/businesswoman.png')}}" alt="perempuan" class="" />
              <br>
              <h4 class="font-semibold text-3xl">{{number_format($d->perempuan, 0, ',', '.') }}</h4>
              <p>Perempuan</p>
            </div>

            <div
              class="card text-center shadow-lg rounded-lg shadow-orange-300 w-50 px-10 py-10 mx-3 mt-10"
              >
              <img src="{{asset('storage/assets/tourist.png')}}" alt="mutasi_penduduk" class="" />
              <br>
              <h4 class="font-semibold text-3xl">{{number_format($d->mutasi_penduduk, 0, ',', '.') }}</h4>
              <p>Mutasi Penduduk</p>
            </div>
          </div>

        </div>
      <!-- End Card Konten -->

    </section>
    @endforeach
  <!-- End Konten -->
   
</x-layout> 