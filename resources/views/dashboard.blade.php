<x-layout>
        <x-slot:title>
            Beranda
        </x-slot>

    <style>
    .card {
      margin: 0 auto;
      max-width: 700px;
      background: white;
      padding: 20px;
      box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
  </style>

    <!-- jumbotron -->
    <section
      class="jumbotron relative min-h-screen bg-cover bg-center"
      style="background-image: url('{{asset('storage/assets/jumbotron 1.png')}}')"
    >
      <!-- Overlay Hitam Transparan -->
      <div
        class="absolute inset-0"
        style="background-color: rgba(90, 52, 11, 0.395)"
      ></div>
      <!-- End Overlay -->

      <!-- jumbotron konten -->
      <div
        class="relative z-10 flex flex-col-reverse items-center container mx-auto px-6 py-20 md:flex-row justify-between min-h-screen"
      >
        <div class="mb-40 md:mb-0 md:w-1/2 md:text-left text-center container">
          <h4 class="text-white text-2xl font-bold">Selamat Datang Di</h4>
          <h3
            class="text-white text-4xl mb-5 md:text-6xl sm:text-5xl font-bold"
          >
            Portal Digital Desa Adat Bualu
          </h3>
          <p class="text-white text-lg sm:text-xl font-semibold mb-5">
            Kecamatan Kuta Selatan, Kabupaten Badung, Provinsi Bali
          </p>

          <!-- Button Video Profil Desa -->
          <button
            class="bg-green-600 hover:bg-green-700 transition rounded-3xl py-2 px-6 text-white font-semibold"
          >
            Video Profil Desa
          </button>
        </div>

        <!-- Gambar -->
        <div class="w-full md:w-1/2 flex justify-center md:mb-0">
          <img
            src="{{asset('storage/assets/logodesa.png')}}"
            alt="Logo Desa"
            class="max-w-[250px] w-full h-auto"
          />
        </div>
      </div>
      <!-- end jumbotron konten -->
    </section>
    <!-- end jumbotron -->

    <!-- News -->
    <section class="news py-10">
      <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mt-10 mb-5">
          <h2
            class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
          >
            Berita Desa
          </h2>
        </div>

        <!-- Swiper -->
        <div class="swiper mySwiper">
          <div class="swiper-wrapper mb-7">
            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div
                class="bg-white rounded-lg min-h-96 shadow-md overflow-hidden"
              >
                <img
                src="{{asset('storage/berita_images/image.png')}}"
                  alt=""
                  class="w-full h-48 object-cover"
                />
                <div class="p-4">
                  <span
                    class="inline-block bg-amber-900 text-white text-xs px-5 py-1 rounded-full mb-2"
                    >tanggal pemasangnnya"</span
                  >
                  <h3 class="font-semibold text-lg px-5">
                    Pemasangan Letter Box Tulisan "Desa Adat Bualu"
                  </h3>
                  <p class=" text-gray-700 mt-2 px-5">
                    Desa adat bualu telah melaksanakan pemasangan letter box dengan tujuan untuk memberi wates bahwa daerah tersebut sudah
                    memasuki wilayah dari Desa Adat Bualu, dan kegiatan pemasangan ini sebagai wujud kegiatan
                    dari Baga Palemahan Desa Adat Bualu
                  </p>
                </div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div
                class="bg-white rounded-lg min-h-96 shadow-md overflow-hidden"
              >
                <img
                  src="{{asset('storage/berita_images/bersih_pantai.jpg')}}"
                  alt=""
                  class="w-full h-48 object-cover"
                />
                <div class="p-4">
                   <span
                    class="inline-block bg-amber-600 text-white text-xs px-5 py-1 rounded-full mb-2"
                    >Acara Tahunan Desa</span
                  >
                  <h3 class="font-semibold text-lg px-5">
                    Dresta Lango & Dharma Shanti Desa Adat Bualu
                  </h3>
                  <p class=" text-gray-700 mt-2 px-5">
                    Kegiatan Dresta Lango dan Dharma Shanti dilaksanakan setiap tahun sekali.
                    Dresta Lango digelar saat hari raya Pengerupukan dengan parade ogoh-ogoh dari seluruh banjar di desa, sedangkan Dharma Shanti berlangsung sehari setelah Nyepi (Ngembak Geni) dengan pementasan seni tari dan musik untuk menghibur masyarakat. Selain itu, ogoh-ogoh dari seluruh banjar turut dipajang dalam acara Dharma Shanti.
                  </p>
                </div>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
              <div
                class="bg-white rounded-lg min-h-96 shadow-md overflow-hidden"
              >
                <img
                  src="{{asset('storage/berita_images/maskot_desa.jpg')}}"
                  alt=""
                  class="w-full h-48 object-cover"
                />
                <div class="p-4">
                  <span
                    class="inline-block bg-amber-900 text-white text-xs px-5 py-1 rounded-full mb-2"
                    >Minggu, 10 April 2022</span
                  >
                  <h3 class="font-semibold text-lg px-5">
                    Launching Maskot Desa Adat Bualu "Padma Kesara"
                  </h3>
                  <p class=" text-gray-700 mt-2 px-5">
                    Launching Maskot Desa Adat Bualu "Padma Kesara" merupakan acara peresmian maskot resmi Desa Adat Bualu yang diberi nama Padma Kesara. Kegiatan ini bertujuan memperkenalkan simbol identitas dan semangat kebersamaan masyarakat Desa Adat Bualu, sekaligus memperkuat nilai budaya serta jati diri desa dalam berbagai kegiatan adat dan sosial.
                  </p>
                </div>
              </div>
            </div>

            <!-- Slide 4 -->
            <div class="swiper-slide">
              <div
                class="bg-white rounded-lg min-h-96 shadow-md overflow-hidden"
                <img
                  src="{{asset('storage/berita_images/bersih_pantai.jpg')}}"
                  alt=""
                  class="w-full h-48 object-cover"
                />
                <div class="p-4">
                   <span
                    class="inline-block bg-amber-600 text-white text-xs px-5 py-1 rounded-full mb-2"
                    >Kegiatan Rutinan Desa</span
                  >
                  <h3 class="font-semibold text-lg px-5">
                    Bersih-Bersih Area Pantai
                  </h3>
                  <p class=" text-gray-600 mt-2 px-5">
                    Staff dan masyarakat bekerja sama dalam menjaga kebersihan alam, yaitu dengan melaksanakan bersih-bersih di area pantai. Tujuan dari kegiatan ini untuk menjaga keseimbangan alam dengan manusia agar terhindar dari bencana yang tidak diinginkan.
                  </p>
                </div>
              </div>
            </div>

            <!-- Slide 5 -->
            <div class="swiper-slide">
              <div
                class="bg-white rounded-lg min-h-96 shadow-md overflow-hidden"
                <img
                  src="{{asset('storage/assets/jumbotron 1.png')}}"
                  alt=""
                  class="w-full h-48 object-cover"
                />
                <div class="p-4">
                  <span
                    class="inline-block bg-green-500 text-white text-xs px-2 py-1 rounded-full mb-2"
                    >Nutrition</span
                  >
                  <h3 class="font-semibold text-lg">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ipsa, ea!
                  </h3>
                  <p class="text-sm text-gray-600 mt-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Harum assumenda labore necessitatibus ipsam velit fugiat
                    neque, dolore numquam vel omnis animi saepe cumque! Sint
                    incidunt accusamus, odit laudantium vero minus.
                  </p>
                </div>
              </div>
            </div>
            <!-- Tambahkan slide lain jika perlu -->
          </div>

          <!-- Navigasi -->
          <div class="flex justify-between items-center mt-4">
            <div class="swiper-pagination"></div>
            <div class="flex gap-2">
              <div class="swiper-button-prev text-white"></div>
              <div class="swiper-button-next text-white"></div>
            </div>
          </div>
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
      <!-- End Tools untu Slider News -->
    </section>
    <!-- End News -->

    <!-- Summary -->
    <section
      class="summary my-5 px-4 py-10 bg-gradient-to-r from-amber-500 to-amber-700"
    >
      <div class="container mx-auto text-center">
        <!-- Gunakan grid yang responsive -->
        <div
          class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 justify-around"
        >
          <!-- Item 1 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">120RB</h4>
            <p class="text-sm">Warga</p>
          </div>

          <!-- Item 2 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">120M</h4>
            <p class="text-sm">Pendapatan</p>
          </div>

          <!-- Item 3 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">110M</h4>
            <p class="text-sm">Belanja</p>
          </div>

          <!-- Item 4 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">110M</h4>
            <p class="text-sm">Pengeluaran</p>
          </div>

          <!-- Item 5 -->
          <div class="text-white">
            <h4 class="font-bold text-2xl">110M</h4>
            <p class="text-sm">Surplus/Defisit</p>
          </div>
        </div>
      </div>
    </section>
    <!-- End Summary -->

    <!-- Chart Warga -->
    <div class="container max-w-6xl mx-auto">
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Grafik Pertumbuhan Penduduk Desa
        </h2>
      </div>
    </div>
    <div class="card">
      <h2>Grafik Pertumbuhan Penduduk</h2>
      <div id="chartpenduduk"></div>
      
      <a href="{{route('population.index')}}">
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
      </a>
    </div>

    <script>
      var options = {
        series: [
          {
            name: "Pertumbuhan Penduduk Adat",
            data: {{$adat}},
          },

          {
            name: "Pertumbuhan Penduduk Pendatang",
            data: {{$pendatang}},
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
          categories: {{$year}},
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
      chart.render();
    </script>
    <!-- End Chart Warga -->

    <!-- Chart Pendapatan -->
    <div class="container max-w-6xl mx-auto">
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600  after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Grafik Pendapatan dan Pengeluaran Desa
        </h2>
      </div>
    </div>
    <div class="card">
      <h2>Grafik Pendapatan dan Pengeluaran</h2>
      <div id="chartpendapatan"></div>
        <a href="{{route('financial.index')}}">
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
        </a>
    </div>

    <script>
      var options = {
        series: [
          {
            name: "Pendapatan Desa",
            data: {{$pendapatan}},
          },
          {
            name: "Belanja Desa",
            data: {{$belanja}},
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
          categories: {{$year}},
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
    <!-- End Chart Pendapatan -->

    <!-- Data APBD Desa -->
    <section class="py-10">
      <div class="container max-w-6xl mx-auto">
        <div class="text-center mt-10 mb-5">
          <h2
            class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:w-[80%] after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
          >
            Data APBD Desa Adat Bualu
          </h2>
        </div>

        <!-- Btn Edit -->
        <div class="row">
          <div class="md:ml-auto mx-auto w-fit my-10">
            <button
              id="openmodalsummary"
              type="button"
              class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
            >
              <i class="fa-solid fa-edit"></i>
              Edit Data
            </button>
          </div>
        </div>
        <!-- End Btn Edit -->

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
              <p class="text-3xl font-bold">{{$yearinc->income}}</p>
            </div>
            <img src="{{asset('storage/assets/income.png')}}" alt="pendapatan" class="w-25 h-25" />
          </div>
          <!-- Belanja -->
          <div
            class="flex items-center justify-between bg-gray-100 p-6 rounded-2xl shadow-sm mx-5"
          >
            <div>
              <p class="text-lg font-medium">Belanja</p>
              <p class="text-3xl font-bold">{{$yearspend->spending}}</p>
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
              <p class="text-3xl font-bold">{{ $surplus }}</p>
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
              <p class="text-3xl font-bold">{{$yearspend->spending}}</p>
            </div>
            <img src="{{asset('storage/assets/expenses.png')}}" alt="pengeluaran" class="w-25 h-25" />
          </div>
        </div>
        <!-- End Row 2 -->
      </div>
    </section>
    <!-- End Data APBD Desa -->

    </x-layout>