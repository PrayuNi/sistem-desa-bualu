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
    <section class="bg-gradient-to-r from-amber-300 to-amber-700 shadow-lg">
      <nav class="container mx-auto">
        <div class="p-5 flex items-center justify-between">
          
        <!-- Logo -->
          <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('storage/assets/logodesa.png') }}" alt="logodesa" class="w-13 h-15 rounded-full">
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
          <div id="menu" class="hidden md:flex space-x-6 text-white font-semibold items-center">
            <a href="/" class="hover:text-yellow-300">Beranda</a>
            <a href="/profildesa" class="hover:text-yellow-300">Profil Desa</a>
            <a href="/structures" class="hover:text-yellow-300">Struktur Prejuru</a>
            <a href="/structurestaff" class="hover:text-yellow-300">Struktur Staff</a>
            
            <!-- Dropdown fitur data penduduk -->
            <div class="relative inline-block text-center">
              <div>
                <button
                  type="button"
                  class="font-bold inline-flex w-full justify-center gap-x-1.5 px-3 items-center hover:text-yellow-300"
                  style="font-size: 16px"
                  id="btn-penduduk"
                  aria-expanded="true"
                  aria-haspopup="true"
                >
                  Data Penduduk
                  <i class="fa-solid fa-angle-down text-sm"></i>
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
                  
                  
                    <a
                      href="/datapenduduk"
                      class="block px-4 py-2 text-sm text-gray-700"
                      role="menuitem"
                      tabindex="-1"
                      id="menu-item-0"
                      >Penduduk Adat</a
                    >
                  

                  
                    <a
                      href="/datapenduduktamiu"
                      class="block px-4 py-2 text-sm text-gray-700"
                      role="menuitem"
                      tabindex="-1"
                      id="menu-item-1"
                      >Penduduk Pendatang/Tamiu</a
                    >
                  
                </div>
              </div>
            </div>

            <a href="/dataapbd" class="hover:text-yellow-300">Data APBD</a>
            <a href="/pengajuansurats" class="hover:text-yellow-300">Pengajuan Surat</a>

            @auth
              @if(Auth::user()->role !== 2)
                <a href="/jenissurats" class="hover:text-yellow-300">Jenis Surat</a>
              @endif
            @endauth

       
        @auth 
        <!-- Buat menu dropdown dan user sudah login -->
            <div class="relative ml-4">
              <button id="user-menu-btn" class="flex items-center space-x-2 focus:outline-none hover:text-yellow-300">
                <img src="{{ asset('storage/structure_images/default.png') }}" alt="User" class="w-8 h-8 rounded-full border-2 border-white"/>
                <span class="hidden md:inline font-semibold">{{ Auth::user()->name ?? 'Umum' }}</span>
                <i class="fa-solid fa-caret-down"></i>
              </button>
            </div>
          

      <!--  Dropdown Menu -->
        <div id="user-menu-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white text-gray-700 rounded-lg shadow-lg overflow-hidden z-50">
          <a href="{{ route('profile.show') }}" class="block px-4 py-2 hover:bg-gray-100">
            <i class="fa-solid fa-user mr-2"></i>Profil Saya
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
              <i class="fa-solid fa-right-form-bracket mr-2"></i>Logout
            </button>
          </form>
        </div>
        @else
          <a href="{{ route('login') }}" class="btn inline-flex rounded-md bg-yellow-400 hover:bg-amber-500 px-4 py-2">
            <span><i class="fa-solid fa-right-to-bracket mr-2"></i></span>
            <p>Login</p>
          </a>
        @endauth

        <!-- Menu Mobile (DITAMBAHKAN) -->
        <!-- Menu ini hanya muncul di layar kecil saat tombol ditekan -->
        <div
          id="mobile-menu"
          class="hidden md:hidden px-5 pb-4 space-y-2 text-white bg-amber-600 font-semibold"
        >
          <a href="/" class="block">Beranda</a>
          <a href="/profildesa" class="block">Profil Desa</a>
          <a href="/structures" class="block">Struktur Prejuru</a>
          <a href="/structurestaff" class="block">Struktur Staff</a>
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
                  href="/datapenduduk"
                  class="block px-4 py-2 text-sm text-gray-700"
                  role="menuitem"
                  tabindex="-1"
                  id="menu-item-0"
                  >Penduduk Adat</a
                >
                <a
                  href="/datapenduduktamiu"
                  class="block px-4 py-2 text-sm text-gray-700"
                  role="menuitem"
                  tabindex="-1"
                  id="menu-item-1"
                  >Penduduk Pendatang/Tamiu</a
                >
                <a href="/dataapbd" class="block">Data APBD</a>
                <a href="/pengajuansurats" class="block">Pengajuan Surat</a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </section>
    <!-- End Navbar -->

    <!-- JavaScript Dropdown -->
    <script>
      const userMenuBtn = document.getElementById("user-menu-btn");
      const userMenuDropdown = document.getElementById("user-menu-dropdown");

      userMenuBtn.addEventListener("click", () => {
        userMenuDropdown.classList.toggle("hidden");
      });

      //Klik diluar dropdown untuk menutup
      window.addEventListener("click", (e) => {
        if (!userMenuBtn.contains(e.target) && !userMenuDropdown.contains(e.target)) {
          userMenuDropdown.classList.add("hidden");
        }
      });
    </script>
    <!-- End JavaScript Dropdown-->

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
    <footer class="bg-gradient-to-r from-amber-700 to-amber-300 text-white py-10 mt-10">
      <div
        class="container mx-auto px-6 max-w-6xl grid md:grid-cols-2 items-center gap-10"
      >
        <!-- Logo dan Lokasi -->
        <div class="flex items-center md:items-start text-left space-x-5">
          <img src="{{asset('storage/assets/logodesa.png')}}" alt="logo" class="w-20 h-20 object-contain" />
        
          <div>
            <h3
              class="text-xl md:text-2xl font-bold leading-snug"
            >
              Kec. Kuta Selatan<br />
              Kab. Badung<br />
              Prov. Bali <br />
            </h3>
          </div>
        </div>

        <!-- Kontak -->
        <div class="text-white space-y-4 text-sm w-full md:text-base text-right">
          <div class="flex flex-row-reverse items-center justify-end space-x-reverse space-x-3">
            <a href="https://mail.google.com/mail/u/desaadatbualu04.11@gmail.com">
              <i class="fa-solid fa-envelope mt-1 w-5 text-lg"></i>
              <span>desaadatbualu04.11@gmail.com</span>
            </a>
          </div>
          <div class="flex flex-row-reverse items-center justify-end space-x-reverse space-x-3">
            <a href="https:wa.me/6285850585461">
              <i class="fa-brands fa-whatsapp mt-1 w-5 text-lg"></i>
              <span>085850585461</span>
            </a>
          </div>
          <div class="flex flex-row-reverse items-center justify-end space-x-reverse space-x-3">
            <a href="https://instagram.com/desaadatbualu">
              <i class="fa-brands fa-instagram mt-1 w-5 text-lg"></i>
              <span>@desaadatbualu</span>
            </a>
          </div>
          <div class="flex flex-row-reverse items-center justify-end space-x-reverse space-x-3">
            <a href="">
              <i class="fa-brands fa-facebook mt-1 w-5 text-lg"></i>
              <span>desa adat bualu</span>
            </a>
          </div>
          <div class="flex flex-row-reverse items-center justify-end space-x-reverse space-x-3">
            <a href="https://maps.app.goo.gl/Cz6F9eayEz2h5heW7">
              <i class="fa-solid fa-map-location mt-1 w-5 text-lg"></i>
              <span>Jl.Kuruksetra No.1, Benoa</span>
            </a>
          </div>
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
