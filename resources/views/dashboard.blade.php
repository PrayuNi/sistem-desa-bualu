<x-layout>
    <x-slot:title>
      Portal Digital Desa Adat Bualu
    </x-slot>

  <style>
    @keyframes fadeSlideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .animate-fade-slide {
      animation: fadeSlideUp 1s ease-out forwards;
    }
    .delay-200 {
      animation-delay: .2s;
    }
    .delay-400 {
      animation-delay: .4s;
    }

    @media (max-width: 640px) {
      .swiper-button-next,
      .swiper-button-prev {
        display: none !important;
      }
    }

    @media (min-width: 641px) and (max-width: 1023px) {
      .swiper-button-next,
      .swiper-button-prev {
        transform: scale(0.6);
      }
    }

    .swiper-button-next,
    .swiper-button-prev {
      background: rgba(0, 0, 0, 0.4);
      width: 42px;
      height: 42px;
      border-radius: 50%;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
      font-size: 18px;
      color: white;
    }


    .card {
      margin: 0 auto;
      max-width: 700px;
      background: white;
      padding: 20px;
      box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
  </style>

  @include('components.login-modal')
    <!-- jumbotron -->
    <section
      class="jumbotron relative min-h-screen bg-cover bg-center"
      style="background-image: url('{{ asset('storage/assets/jumbotron 1.png') }}')"
    >
      <!-- Overlay Hitam Transparan -->
      <div
        class="absolute inset-0 bg-gradient-to-r from-[#6b3d00]/80 via-[#b8730d]/55 to-transparent">
        <!-- style="background-color: rgba(90, 52, 11, 0.395)" -->
      </div>
      <!-- End Overlay -->

      <!-- jumbotron konten -->
      <div
        class="relative z-10 container mx-auto px-6 min-h-screen flex flex-col items-center pt-28 sm:pt-32 md:pt-0 md:flex-row md:justify-between"
      >
        <div class="md:w-1/2 text-center md:text-left order-2 md:order-1 mt-4 md:mt-0">
          <h4 
            class="text-white text-xl sm:text-2xl font-bold mb-2 drop-shadow-lg animate-fade-slide"
            >
            Selamat Datang Di
          </h4>

          <h3
            class="text-white text-3xl sm:text-4xl md:text-6xl font-bold leading-tight mb-4 drop-shadow-xl animate-fade-slide delay-200"
          >
            <span class="block md:inline">Portal Digital</span>
            <span class="block md:inline">Desa Adat Bualu</span>
            <!-- Portal Digital <br class="hidden sm:block" /> 
            Desa Adat Bualu -->
          </h3>

          <p class="text-white text-base sm:text-lg font-semibold drop-shadow-md max-w-xl mx-auto md:mx-0 animate-fade-slide delay-400">
            Kecamatan Kuta Selatan, Kabupaten Badung, Provinsi Bali
          </p>
        </div>

        <!-- Gambar -->
        <div class="w-full md:w-1/2 flex justify-center order-1 md:order-2 mt-6 sm:mt-8 md:mt-0 mb-6 md:mb-0">
          <img
            src="{{asset('storage/assets/logodesa.png')}}"
            alt="Logo Desa"
            class="max-w-[200px] sm:max-w-[230px] md:max-w-[260px] w-full h-auto drop-shadow-xl"
          />
        </div>
      </div>
      <!-- end jumbotron konten -->
    </section>
    <!-- end jumbotron -->

    <!-- News -->
    <section class="news">
      <div class="max-w-6xl mx-auto px-4">
      <div class="text-center mt-3">
        <h2
            class="font-bold inline-block relative after:content-[''] after:block after:h-[3px] after:bg-amber-600 after:mx-auto after:mt-1 m-5 text-amber-600 text-3xl"
        >
            Berita Desa
        </h2>
      </div>

    <!-- Tombol Tambah di Tengah -->
    @auth
      @if (Auth::user()->role == 0)
      <div class="w-full flex justify-center items-center mb-2">
          <a href="{{ route('news.create-news') }}">
            <button
              type="button"
              class="btn bg-gray-400 hover:bg-gray-500 
              rounded-full px-5 py-2 text-black font-semibold shadow-sm"
              >
              <i class="fa-solid fa-plus"></i> Tambah Data
            </button>
          </a>
      </div>
      @endif
    @endauth

    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-7">

        @foreach ($news as $n)
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div style="height: 620px" class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="{{asset('storage/' . ($n->image ?? 'news_images/default.png'))}}" alt="" class="w-full h-48 object-cover"/>
            <div class="p-4">
              <span class="inline-block bg-amber-900 text-white text-xs px-5 py-1 rounded-full mb-2">
                {{$n->date}}
              </span>
              <h3 class="font-semibold text-lg px-5">
                {{$n->title}}
              </h3>
              <p class=" text-gray-700 mt-2 px-5">
                {{$n->description}}
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

    <!-- Navigasi -->
    <div class="flex justify-between items-center mt-4">
      <div class="swiper-pagination"></div>
        <div class="flex gap-2 items-center">
          <div class="swiper-button-prev text-white"></div>
          <div class="swiper-button-next text-white"></div>
        </div>
    </div>     

    <!-- Tools untu Slider News -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
      <script>
        new Swiper(".mySwiper", {
          slidesPerView: 1,
          spaceBetween: 20,
          loop: true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          breakpoints: {
            768: {
              slidesPerView: 2,
            },
            1024: {
              slidesPerView: 3,
            },
          },
        });
      </script>
    </section>
    <!-- End Tools untu Slider News -->

    <!-- Summary -->
    <section class="summary my-5 px-4 py-10 bg-linear-to-r from-amber-500 to-amber-700">
      <div class="container mx-auto text-center">
        <!-- Gunakan grid yang responsive -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 justify-around">
          <!-- Item 1 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">2.693</h4>
            <p class="text-sm">Penduduk Gegem</p>
          </div>

          <!-- Item 2 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">Rp{{number_format($yearinc->income, 0, ',', '.') }}</h4>
            <p class="text-sm">Pendapatan</p>
          </div>

          <!-- Item 3 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">Rp{{number_format($yearspend->spending, 0, ',', '.') }}</h4>
            <p class="text-sm">Belanja</p>
          </div>

          <!-- Item 4 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">Rp{{number_format($yearspend->spending, 0, ',', '.') }}</h4>
            <p class="text-sm">Pengeluaran</p>
          </div>

          <!-- Item 5 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">Rp{{number_format($surplus, 0, ',', '.') }}</h4>
            <p class="text-sm">Surplus/Defisit</p>
          </div>
        </div>
      </div>
    </section>
    <!-- End Summary -->

    <!-- Grafik Warga -->
    <div class="container max-w-6xl mx-auto text-center mt-10">
      <h2 class="font-bold inline-block relative after:content-[''] after:block after:h-[3px] after:bg-amber-600  after:mx-auto after:mt-1 m-5 text-amber-600 text-3xl">
        Grafik Penduduk Desa Adat Bualu
      </h2>
    </div>

    <div class="w-full flex justify-center items-center mb-4">
      @auth
      @if(Auth::user()->role == 0)
        <a href="{{ route('population.index') }}">
          <button type="button" class="btn bg-blue-900 hover:bg-blue-800 rounded-full w-fit px-6 py-3 mb-2 text-white font-semibold">
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
        </a>
      @endif
      @endauth
    </div>

  
    <div class="mx-5">
      <div class="card" id="chartpenduduk"></div>
    </div>

    <script>
      var options = {
        series: [
          {
            name: "Pertumbuhan Penduduk Adat",
            data: @json($adat),
          },

          {
            name: "Pertumbuhan Penduduk Pendatang",
            data: @json($pendatang),
          },
        ],

        chart: {
          height: 350,
          type: "area",
        },

        dataLabels: {
          enabled: false,
        },

        stroke: {
          curve: "smooth",
        },

        xaxis: {
          categories: @json($year),
        },

        tooltip: {
          y: {
            formatter: function (val) {
              return "Rp" + val.toLocaleString("id-ID");
            },
          },
        },
      };

      var chart = new ApexCharts(
        document.querySelector("#chartpenduduk"),
        options
      );
      chart.render()
    </script>
    <!-- End Grafik Warga -->

    <!-- Grafik Pendapatan -->
    <div class="container max-w-6xl mx-auto text-center mt-10">
        <h2 class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600  after:mx-auto after:mt-1 m-5 text-amber-600 text-3xl">
          Grafik Pendapatan dan Pengeluaran Desa
        </h2>
    </div>

    <div class="w-full flex justify-center items-center mb-4">
      @auth
      @if (Auth::user()->role == 0)
        <a href="{{route('financial.index')}}">
          <button type="button" class="btn bg-blue-900 hover:bg-blue-800 rounded-full w-fit px-6 py-3 mb-2 text-white font-semibold">
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
        </a>
      @endif
      @endauth
    </div>


    <div class="mx-5">
      <div class="card" id="chartpendapatan"></div>
    </div>

    <script>
      var options = {
        series: [
          {
            name: "Pendapatan Desa", 
            data: @json($pendapatan),
          },
          {
            name: "Belanja Desa",
            data: @json($belanja),
          },
        ],

        chart: {
          height: 350,
          type: "area",
        },

        dataLabels: {
          enabled: false,
        },

        stroke: {
          curve: "smooth",
        },

        xaxis: {
          categories: @json($year),
        },
        
        tooltip: {
          y: {
            formatter: function (val) {
              return "Rp" + val.toLocaleString("id-ID");
            },
          },
        },
      };

      var chart = new ApexCharts(
        document.querySelector("#chartpendapatan"),
        options
      );
      chart.render();
    </script>
    <!-- End Grafik Pendapatan -->

    <!-- Data APBD Desa -->
    <section>
      <div class="container max-w-6xl mx-auto">
        <div class="text-center mt-10 mb-1">
          <h2
            class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 m-5 text-amber-600 text-3xl"
          >
            Data APBD Desa Adat Bualu
          </h2>
        </div>

        <!-- Javascript -->
        <script>
          const openButtonSummary = document.getElementById("openmodalsummary");
          const closeButtonSummary =
            document.getElementById("closemodalsummary");
          const modalsummary = document.getElementById("modalsummary");

          openButtonSummary.addEventListener("click", () => {
            modalsummary.classList.remove("hidden");
            modalsummary.classList.add("flex");
          });

          closeButtonSummary.addEventListener("click", () => {
            modalsummary.classList.add("hidden");
            modalsummary.classList.remove("flex");
          });

          modalsummary.addEventListener("click", () => {
            if (e.target === modalsummary) {
              modalsummary.classList.add("hidden");
              modalsummary.classList.remove("flex");
            }
          });

        </script>
        <!-- End Javascript -->

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
                Rp{{number_format($yearinc->income, 0, ',', '.') }}</p>
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
                Rp{{number_format($yearspend->spending, 0, ',', '.') }}</p>
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
                Rp{{number_format($surplus, 0, ',', '.') }}</p>
            </div>
            <img
              src="{{asset('storage/assets/surplus-def.png')}}"
              alt="surplus/defisit"
              class="w-25 h-25"
            />
          </div>
          <!-- Pengeluaran -->
          <div
            class="flex items-center justify-between bg-gray-100 p-6 rounded-2xl shadow-sm mx-5"
          >
            <div>
              <p class="text-lg font-medium">Pengeluaran</p>
              <p class="text-3xl font-bold">
                Rp{{number_format($yearspend->spending, 0, ',', '.') }}</p>
            </div>
            <img src="{{asset('storage/assets/expenses.png')}}" alt="pengeluaran" class="w-25 h-25" />
          </div>
        </div>
        <!-- End Row 2 -->
      </div>
    </section>
    <!-- End Data APBD Desa -->

    </x-layout>