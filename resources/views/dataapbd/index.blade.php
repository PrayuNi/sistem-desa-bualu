<x-layout>
  <x-slot:title>
    Data APBD Desa Adat Bualu
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
  @include('components.notif-modal')
  <!-- Konten -->
    <section class="container mx-auto">

      <!-- Title -->
        <div class="text-center mt-10 mb-5">
          <h2
            class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600  after:mx-auto after:mt-1 m-5 text-amber-600 text-3xl"
          >
            Data APBD Desa Adat Bualu
          </h2>
        </div>
      <!-- End Title -->
    
      <!-- Button Edit -->
      @Auth
        @if (Auth::user()->role == 0)
        <div class="row">
          <div class="md:ml-auto mx-auto w-fit my-5">
            <a href="/financials">
              <button
                type="button"
                class="btn bg-blue-900 hover:bg-blue-800 rounded-full w-fit px-4 py-2 text-white font-semibold"
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

      <!-- Row 1 -->
        <div
          class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6"
          >

          <!-- Pendapatan -->
          <div
            class="flex items-center justify-between bg-gray-100 p-6 rounded-2xl shadow-sm mx-5"
            >
            <div>
              <p class="text-lg font-medium">Pendapatan</p>
              <p class="text-3xl font-bold">
                Rp{{ number_format ($yearincome, 0, ',', '.') }}
              </p>
            </div>
            <img src="{{asset('storage/assets/income.png')}}" alt="pendapatan" class="w-25 h-25" />
          </div>

          <!-- Belanja -->
          <div
            class="flex items-center justify-between bg-gray-100 p-6 rounded-2xl shadow-sm mx-5"
            >
            <div>
              <p class="text-lg font-medium">Belanja</p>
              <p class="text-3xl font-bold">
                Rp{{ number_format($yearspending, 0, ',', '.') }}
              </p>
            </div>
            <img src="{{asset('storage/assets/shopping-bag.png')}}" alt="belanja" class="w-25 h-25" />
          </div>
        </div>
      <!-- End Row 1 -->

      <!-- Row 2 -->
        <div
          class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-6 my-6"
          >

          <!-- Surplus/Defisit -->
          <div
            class="flex items-center justify-between bg-gray-100 p-6 rounded-2xl shadow-sm mx-5"
            >
            <div>
              <p class="text-lg font-medium">Surplus/Defisit</p>
              <p class="text-3xl font-bold">
                Rp{{ number_format($surplus, 0, ',', '.') }}
              </p>
            </div>
            <img src="{{asset('storage/assets/surplus-def.png')}}" alt="surplus/defisit" class="w-25 h-25"/>
          </div>

          <!-- Pengeluaran -->
          <div
            class="flex items-center justify-between bg-gray-100 p-6 rounded-2xl shadow-sm mx-5"
            >
            <div>
              <p class="text-lg font-medium">Pengeluaran</p>
              <p class="text-3xl font-bold">
                Rp{{ number_format($yearspending, 0, ',', '.') }}
              </p>
            </div>
            <img src="{{asset('storage/assets/expenses.png')}}" alt="pengeluaran" class="w-25 h-25" />
          </div>
        </div>
      <!-- End Row 2 -->

      <!-- Button download -->
        <div class="row flex">
          <a class="btn bg-green-800 hover:bg-green-900 rounded-full mx-auto w-fit px-4 py-2 mb-3 text-white font-semibold" target="_blank" href="https://drive.google.com/drive/folders/1BIdNDWKkNAq9zH1Li2bcc9DcvHZ8kHBH?usp=sharing">
            <i class="fa-solid fa-arrow-down"></i> File Data APBD
          </a>
        </div>
    </section>
  <!-- End Konten -->

</x-layout> 