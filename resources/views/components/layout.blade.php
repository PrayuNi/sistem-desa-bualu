<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Plugin for CHART data labels -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <title>{{$title}}</title>
  </head>
  <body>
     <!-- Navbar -->
    <section class="bg-gradient-to-r from-amber-500 to-amber-700">
      <nav class="container mx-auto">
        <div class="p-5 flex items-center justify-between">
          <!-- Logo -->
          <a href="">
            <h3 class="text-2xl md:text-3xl font-bold text-white">
              Desa Adat Bualu
            </h3>
          </a>

          <!-- Hamburger Button (DITAMBAHKAN) -->
          <!-- Tombol ini hanya tampil di mobile (md:hidden) dan akan toggle menu -->
          <button
            id="menu-btn"
            class="block md:hidden text-white focus:outline-none"
          >
            <svg
              class="w-8 h-8"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              ></path>
            </svg>
          </button>

          <!-- Menu Utama (DIPERBAIKI: ditambahkan class md:flex agar hanya muncul di desktop) -->
          <div id="menu" class="hidden md:flex space-x-6 text-white font-bold">
            <a href="">Beranda</a>
            <a href="strukturprejuru.html">Struktur Prejuru</a>
            <a href="strukturstaff.html">Struktur Staff</a>
            <div class="relative inline-block text-center">
              <div>
                <button
                  type="button"
                  class="font-bold inline-flex w-full justify-center gap-x-1.5 px-3 items-center"
                  style="font-size: 16px"
                  id="btn-penduduk"
                  aria-expanded="true"
                  aria-haspopup="true"
                >
                  Data Penduduk
                  <i class="fa-solid fa-angle-down"></i>
                </button>
              </div>

              <div
                id="penduduk-list"
                class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
                role="menu"
                aria-orientation="vertical"
                aria-labelledby="menu-button"
                tabindex="-1"
              >
                <div class="py-1 text-left" role="none">
                  <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                  <a
                    href="#"
                    class="block px-4 py-2 text-sm text-gray-700"
                    role="menuitem"
                    tabindex="-1"
                    id="menu-item-0"
                    >Penduduk Adat</a
                  >
                  <a
                    href="#"
                    class="block px-4 py-2 text-sm text-gray-700"
                    role="menuitem"
                    tabindex="-1"
                    id="menu-item-1"
                    >Penduduk Pendatang/Tamiu</a
                  >
                </div>
              </div>
            </div>
            <a href="profildesa.html">Profil Desa</a>
          </div>
        </div>

        <!-- Menu Mobile (DITAMBAHKAN) -->
        <!-- Menu ini hanya muncul di layar kecil saat tombol ditekan -->
        <div
          id="mobile-menu"
          class="hidden md:hidden px-5 pb-4 space-y-2 text-white font-bold"
        >
          <a href="/index.html" class="block">Beranda</a>
          <a href="strukturprejuru.html" class="block">Struktur Prejuru</a>
          <a href="strukturstaff.html" class="block">Struktur Staff</a>
          <div class="relative inline-block text-center">
            <div>
              <button
                type="button"
                class="font-bold inline-flex w-full justify-center gap-x-1.5 px-3 items-center"
                style="font-size: 16px"
                id="btn-penduduk"
                aria-expanded="true"
                aria-haspopup="true"
              >
                Data Penduduk
                <i class="fa-solid fa-angle-down"></i>
              </button>
            </div>

            <div
              id="penduduk-list"
              class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-hidden"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="menu-button"
              tabindex="-1"
            >
              <div class="py-1 text-left" role="none">
                <!-- Active: "bg-gray-100 text-gray-900 outline-hidden", Not Active: "text-gray-700" -->
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700"
                  role="menuitem"
                  tabindex="-1"
                  id="menu-item-0"
                  >Penduduk Adat</a
                >
                <a
                  href="#"
                  class="block px-4 py-2 text-sm text-gray-700"
                  role="menuitem"
                  tabindex="-1"
                  id="menu-item-1"
                  >Penduduk Pendatang/Tamiu</a
                >
              </div>
            </div>
          </div>
          <a href="profildesa.html" class="block">Profil Desa</a>
        </div>
      </nav>
    </section>
    <!-- End Navbar -->

    <!-- JavaScript untuk Toggle Menu (DITAMBAHKAN) -->
    <script>
      const btn = document.getElementById("menu-btn");
      const mobileMenu = document.getElementById("mobile-menu");

      // Toggle class 'hidden' ketika tombol hamburger ditekan
      btn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
      });
    </script>

    <!-- JavaScript untuk Toggle Menu Data Penduduk(DITAMBAHKAN) -->
    <script>
      const btnpenduduk = document.getElementById("btn-penduduk");
      const listmenu = document.getElementById("penduduk-list");

      // Toggle class 'hidden' ketika tombol hamburger ditekan
      btnpenduduk.addEventListener("click", () => {
        listmenu.classList.toggle("hidden");
      });
    </script>

  {{ $slot }}
   
    <!-- Footer -->
    <footer class="bg-gradient-to-r from-yellow-200 to-amber-700 text-white py-10">
      <div
        class="container max-w-6xl mx-auto px-4 flex grid-cols-2 md:items-center items-start justify-between gap-8"
      >
        <!-- Logo dan Lokasi -->
        <div class="md:flex text-center">
          <img src="{{asset('storage/assets/logodesa.png')}}" alt="logo" class="max-w-32 mb-4" />
          <h3
            class="ml-2 text-lg text-center md:text-3xl font-bold leading-tight md:text-left"
          >
            Kec. Kuta Selatan,<br />
            Kab. Badung,<br />
            Prov. Bali <br />
          </h3>
        </div>

        <!-- Kontak -->
        <div class="text-white space-y-4 text-sm w-full md:w-auto">
          <div class="flex items-start space-x-3">
            <a href="https://mail.google.com/mail/u/desaadatbualu@gmail.com">
              <i class="fa-solid fa-envelope mt-1 w-5 text-lg"></i>
              <span>desaadatbualu@gmail.com</span>
            </a>
          </div>
          <div class="flex items-start space-x-3">
            <a href="https:wa.me/6285850585461">
              <i class="fa-brands fa-whatsapp mt-1 w-5 text-lg"></i>
              <span>085850585461</span>
            </a>
          </div>
          <div class="flex items-start space-x-3">
            <a href="https://instagram.com/desaadatbualu">
              <i class="fa-brands fa-instagram mt-1 w-5 text-lg"></i>
              <span>@desaadatbualu</span>
            </a>
          </div>
          <div class="flex items-start space-x-3">
            <a href="">
              <i class="fa-brands fa-facebook mt-1 w-5 text-lg"></i>
              <span>desa adat bualu</span>
            </a>
          </div>
          <div class="flex items-start space-x-3">
            <a href="">
              <i class="fa-solid fa-location-dot mt-1 w-5 text-lg"></i>
              <span>Jl.Kurusetra No.1</span>
            </a>
          </div>

          <!-- Btn Edit -->
          <div class="row">
            <div class="md:ml-auto mx-auto w-fit my-10">
              <button
                id="openfoother"
                type="button"
                class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
              >
                <i class="fa-solid fa-edit"></i>
                Edit Data
              </button>
            </div>
          </div>
          <!-- End Btn Edit -->
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div
      id="foother"
      class="fixed inset-0 hidden items-center justify-center z-50"
      style="background-color: rgba(0, 0, 0, 0.612)"
    >
      <div
        class="bg-white rounded-lg p-6 max-w-lg md:max-w-xl w-full relative m-3"
      >
        <h4 class="text-xl font-bold">Perbaharui Data Foother</h4>
        <p class="mt-2 text-gray-600">
          Masukan Data Terbaru Dari Kontak Yang Tertera
        </p>
        <form action="" method="post">
          <div class="input-group mt-3 font-bold flex text-md">
            <div class="col">
              <label for="input-facebook">Facebook</label>
              <input
                class="border-2 border-gray-500 w-full rounded-s-lg p-3 text-xs md:text-sm"
                type="text"
                name="input-facebook"
                id="input-facebook"
                placeholder="Masukkan Nama"
              />
            </div>

            <div class="col">
              <label for="input-linkfacebook">Link Facebook</label>
              <input
                class="border-2 border-gray-500 w-full rounded-e-lg p-3 text-xs md:text-sm"
                type="url"
                name="input-linkfacebook"
                id="input-linkfacebook"
                placeholder="Masukkan Url"
              />
            </div>
          </div>

          <div class="input-group mt-3 font-bold text-md">
            <label for="input-whatsapp">No WhatsApp</label>
            <input
              class="border-2 border-gray-500 w-full rounded-xl p-3 text-xs md:text-sm"
              type="number"
              name="input-whatsapp"
              id="input-whatsapp"
              placeholder="Masukkan Number"
            />
          </div>
        </form>
        <div class="mt-4 flex justify-end space-x-2">
          <button
            id="closefoother"
            class="bg-gray-300 rounded px-3 py-1 hover:bg-gray-400 text-black"
          >
            Tutup
          </button>
          <button
            class="bg-blue-900 text-white rounded px-3 py-1 hover:bg-blue-700"
          >
            Simpan
          </button>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <!-- Javascript -->
    <script>
      const openButtonFoother = document.getElementById("openfoother");
      const closeButtonFoother = document.getElementById("closefoother");
      const foother = document.getElementById("foother");

      openButtonFoother.addEventListener("click", () => {
        foother.classList.remove("hidden");
        foother.classList.add("flex");
      });

      closeButtonFoother.addEventListener("click", () => {
        foother.classList.add("hidden");
        foother.classList.remove("flex");
      });

      foother.addEventListener("click", () => {
        if (e.target === foother) {
          foother.classList.add("hidden");
          foother.classList.remove("flex");
        }
      });
    </script>
    <!-- End Javascript -->
    <!-- End Footer -->
  </body>
</html>
