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

      <!-- Navbar -->
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            const buttonPenduduk = document.getElementById("dropdownButtonPenduduk");
            const menuPenduduk = document.getElementById("dropdownMenuPenduduk");
            const buttonStruktur = document.getElementById("dropdownButtonStruktur");
            const menuStruktur = document.getElementById("dropdownMenuStruktur");
        
            // Toggle Penduduk
              buttonPenduduk.addEventListener("click", function(e) {
                e.stopPropagation();
                menuPenduduk.classList.toggle("hidden");
              });


            // Toggle Struktur
              buttonStruktur.addEventListener("click", function(e) {
                e.stopPropagation();
                menuStruktur.classList.toggle("hidden");
              });
          });
        </script>
      
          <body
          data-auth="{{ Auth::check() ? '1' : '0' }}"
          data-role="{{ Auth::check() ? Auth::user()->role : '' }}"
          >
            <header class="bg-gradient-to-r from-amber-300 to-amber-700 shadow">
              <nav class="container mx-auto px-4 py-4 flex items-center justify-between">
                
                <!-- Logo -->
                    <a href="/" class="flex items-center gap-2">
                      <img src="{{ asset('storage/assets/logodesa.png') }}" alt="logodesa" class="w-10 h-12 md:w-12 md:h-14 rounded-full">
                        <h3 class="text-lg md:text-xl lg:text-3xl font-bold text-white leading-tight">
                          Desa Adat Bualu
                        </h3>
                    </a>

                <!-- Menu Desktop -->
                    <div class="hidden lg:flex items-center space-x-6 text-white font-semibold">
                      <a href="/" class="hover:text-yellow-300">Beranda</a>
                      <a href="/profildesa" class="hover:text-yellow-300">Profil Desa</a>
                      
                      <!-- Dropdown fitur struktur -->
                      <div class="relative">
                          <button id="dropdownButtonStruktur" class="flex items-center gap-1 cursor-pointer select-none hover:text-yellow-300" >
                            Struktur 
                            <i class="fa-solid fa-angle-down text-sm"></i>
                          </button>

                          <div id="dropdownMenuStruktur"
                            class="absolute hidden bg-white text-gray-800 shadow-lg rounded-md w-52 z-[9999] top-full mt-2"
                            >
                            <a href="/structures" class="block px-4 py-2 hover:bg-gray-100">Struktur Prejuru</a>
                            <a href="/structurestaff" class="block px-4 py-2 hover:bg-gray-100">Struktur Staff Kantor Desa</a>
                          </div>
                      </div>

                      <!-- Dropdown fitur data penduduk -->
                      <div class="relative">
                          <button id="dropdownButtonPenduduk" class="flex items-center gap-1 cursor-pointer select-none hover:text-yellow-300" >
                            Data Penduduk
                            <i class="fa-solid fa-angle-down text-sm"></i>
                          </button>

                          <div id="dropdownMenuPenduduk"
                            class="absolute hidden bg-white text-gray-800 shadow-lg rounded-md w-52 z-[9999] top-full mt-2"
                            >
                            <a href="/datapenduduk" class="block px-4 py-2 hover:bg-gray-100">Penduduk Adat</a>
                            <a href="/datapenduduktamiu" class="block px-4 py-2 hover:bg-gray-100">Penduduk Tamiu</a>
                          </div>
                      </div>

                      <a href="/dataapbd" class="hover:text-yellow-300">Data APBD</a>
                      <a href="/pengajuansurats" onclick="return requireLogin()" class="hover:text-yellow-300">Pengajuan Surat</a>

                      @auth
                        @if(Auth::user()->role == 0)
                          <a href="/jenissurats" class="hover:text-yellow-300">Jenis Surat</a>
                        @endif
                      @endauth
                <!-- End Menu Desktop -->

                <!-- Menu Untuk User -->
                  @auth 
                    <div class="relative">
                      <button id="profileButton" class="flex items-center gap-2 cursor-pointer select-none hover:text-yellow-300">
                        <img src="{{ asset('storage/' . (Auth::user()->profile_photo ?? 'profile_photos/default.png')) }}" alt="Foto Profil" class="w-8 h-8 rounded-full border-2 border-white"/>
                        <span class="hidden md:inline font-semibold">{{ Auth::user()->name ?? 'Umum' }}</span>
                        <i class="fa-solid fa-caret-down"></i>
                      </button>
                      
                      <!--  Dropdown Menu User -->
                      <div id="profileMenu" class="hidden absolute right-0 mt-3 w-48 bg-white text-gray-700 rounded-lg shadow-lg z-50">
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
                    </div>

                    @else
                      <a href="{{ route('login') }}" class=" rounded-lg bg-yellow-400 hover:bg-amber-500 px-3 py-1">
                        <!-- <span><i class="fa-solid fa-right-to-bracket mr-2"></i></span> -->
                        <p>Login</p>
                      </a>
                    @endauth
                  </div>
                <!-- End Menu Untuk User -->

                <!-- Humberger Menu/Garis 3 Pojok Kanan Saat Mobile -->
                  <button id="open-mobile" class=" lg:hidden text-white text-3xl">
                    <i class="fa-solid fa-bars"></i>
                  </button>
              </nav>
            </header>
          <!-- End Navbar -->

      <!-- JavaScript Dropdown Menu user -->
        <script>
        // const profileToggle = document.getElementById("profileToggle");
          const profileButton = document.getElementById("profileButton");
          const profileMenu = document.getElementById("profileMenu");

            profileButton.addEventListener("click", () => {
              // e.stopPropagation();
              profileMenu.classList.toggle("hidden");
            });

            //Klik diluar dropdown untuk menutup
              document.addEventListener("click", function(event) {
                if (!profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
                  profileMenu.classList.add("hidden");
                }
              });
        </script>
      <!-- End Dropdown Menu User -->
                     
      <!-- Mobile Slide Menu/Menu Garis 3-->
        <div id="mobile-menu"
          class="fixed top-0 right-0 w-64 h-full bg-amber-700 text-white z-50 transform translate-x-full transition-all duration-300">

          <div class="p-4 flex justify-between items-center">
              <span class="text-xl font-bold">Menu</span>
              <button id="close-mobile"><i class="fa-solid fa-xmark text-2xl"></i></button>
          </div>

          <nav class="px-4 space-y-3 font-semibold">
            <a href="/" class="block">Beranda</a>
            <a href="/profildesa" class="block">Profil Desa</a>

            <!-- Mobile Dropdown Struktur -->
            <details class="bg-amber-600 p-2 rounded">
                <summary class="cursor-pointer">Struktur</summary>
                <div class="ml-4 mt-2 space-y-2 text-sm">
                    <a href="/structures" class="block">Struktur Prejuru</a>
                    <a href="/structurestaff" class="block">Struktur Staff Kantor Desa</a>
                </div>
            </details>

            <!-- Mobile Dropdown Penduduk -->
            <details class="bg-amber-600 p-2 rounded">
                <summary class="cursor-pointer">Data Penduduk</summary>
                <div class="ml-4 mt-2 space-y-2 text-sm">
                    <a href="/datapenduduk" class="block">Penduduk Adat</a>
                    <a href="/datapenduduktamiu" class="block">Penduduk Pendatang</a>
                </div>
            </details>

            <a href="/dataapbd" class="block">Data APBD</a>
            <a href="/pengajuansurats" onclick="return requireLogin()" class="block">Pengajuan Surat</a>

            @auth
                @if (Auth::user()->role == 0)
                    <a href="/jenissurats" class="block">Jenis Surat</a>
                @endif
                <a href="{{ route('profile.show') }}" class="block">Profil Saya</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block">Login</a>
            @endauth
          </nav>
        </div>

        <!-- Backdrop -->
        <div id="mobile-backdrop" class="hidden fixed inset-0 bg-black/50 z-40"></div>

        <!-- Javascript Mobile slide Menu -->
        <script>
          const openBtn = document.getElementById("open-mobile");
          const closeBtn = document.getElementById("close-mobile");
          const menu = document.getElementById("mobile-menu");
          const backdrop = document.getElementById("mobile-backdrop");

          openBtn.onclick = () => {
            menu.classList.remove("translate-x-full");
            backdrop.classList.remove("hidden");
          };

          closeBtn.onclick = () => {
            menu.classList.add("translate-x-full");
            backdrop.classList.add("hidden");
          };

          backdrop.onclick = () => {
            menu.classList.add("translate-x-full");
            backdrop.classList.add("hidden");
          };
        </script>
      <!-- Mobile Slide Menu/Menu Garis 3-->
      
      <!-- JavaScript Dropdown Profile -->
      <script>
        const userMenuBtn = document.getElementById("user-menu-btn");
        const userMenuDropdown = document.getElementById("user-menu-dropdown");

        userMenuBtn.addEventListener("click", () => {
          userMenuDropdown.classList.toggle("hidden");
        });

        window.addEventListener("click", (e) => {
          if (!userMenuBtn.contains(e.target) && !userMenuDropdown.contains(e.target)) {
            userMenuDropdown.classList.add("hidden");
          }
        });
      </script>
      <!-- End JavaScript Dropdown Profile -->
    
      <!-- JavaScript untuk Toggle Menu -->
        <script>
          const btn = document.getElementById("menu-btn");
          const mobileMenu = document.getElementById("mobile-menu");

          // Toggle class 'hidden' ketika tombol hamburger ditekan
          btn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
          });
        </script>
      <!-- End JavaScript untuk Toggle Menu -->

      <!-- JavaScript untuk Toggle Menu Data Penduduk -->
        <script>
          const btnpenduduk = document.getElementById("btn-penduduk");
          const listmenu = document.getElementById("penduduk-list");

          // Toggle class 'hidden' ketika tombol hamburger ditekan
          btnpenduduk.addEventListener("click", () => {
            listmenu.classList.toggle("hidden");
          });
        </script>
      <!-- End JavaScript untuk Toggle Menu Data Penduduk -->

      <!-- JavaScript Modal Pengajuan Surat -->
      <script>
        (() => {
          const body = document.body;

          const IS_LOGGED_IN = body.dataset.auth === '1';
          const USER_ROLE = body.dataset.role !== ''
            ? Number(body.dataset.role)
            : null;

          window.requireLogin = function () {
            const modal = document.getElementById('loginModal');

            // Belum login → tampilkan modal
            if (!IS_LOGGED_IN) {
              if (modal) {
                modal.classList.remove('hidden');
              }
              return false;
            }

            // Sudah login & role diizinkan
            if ([0, 1, 2].includes(USER_ROLE)) {
              window.location.href = "/pengajuansurats";
              return true;
            }

            // Role tidak diizinkan
            alert('Anda tidak memiliki akses ke fitur ini.');
            return false;
          };
        })();
      </script>

        <!-- <script>
          function requireLogin() {
            @if (!Auth::check())
              document.getElementById('loginModal').classList.remove('hidden');
              return false;
            @else
              @if (Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 0)
                window.location.href = "/pengajuansurats";
              @else
                alert('Anda tidak memiliki akses ke fitur ini.');
                return false;
              @endif
            @endif
          }
        </script> -->
        
      <!-- End JavaScript Modal Pengajuan Surat -->


    {{ $slot }}
    <!-- Footer -->
      <footer class="bg-gradient-to-r from-amber-300 to-amber-700 text-white pt-12">
        <div
          class="container mx-auto px-6 max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-12"
          >
          <!-- Logo dan Lokasi -->
          <div class="flex items-center md:items-start text-left gap-4">
            <img src="{{asset('storage/assets/logodesa.png')}}" alt="logo" class="w-30 h-30 object-contain opacity-90" />
          
            <div>
              <h3
                class="text-xl md:text-2xl font-bold leading-snug"
              >
                Kec. Kuta Selatan<br />
                Kab. Badung<br />
                Prov. Bali <br />
              </h3>
              <p class="text-sm mt-2 text-white max-w-sm">
                SI-DAB merupakan web resmi yang dimiliki oleh Desa Adat Bualu, sebagai media penyampaian informasi mengenai Desa Adat Bualu
              </p>
            </div>
          </div>

          <!-- Kontak -->
        <div class="space-y-8">

          <!-- Hubungi Kami -->
          <div class="bg-white/10 backdrop-blur rounded-xl p-5 shadow-md">
            <h4 class="text-lg font-semibold flex items-center gap-2 mb-4">
              <i class="fa-solid fa-circle-info"></i>
              Hubungi Kami
            </h4>

            <ul class="space-y-3 text-sm md:text-base">
      
              <li>
                <a href="https://maps.app.goo.gl/Cz6F9eayEz2h5heW7" class="hover:text-amber-700 transition flex items-start gap-3">
                  <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white/20">
                    <i class="fa-solid fa-location-dot"></i>
                  </span>
                  <span>
                    Jl. Kurusetra No.1, Benoa<br>
                    Kec. Kuta Selatan, Kab. Badung<br>
                    Prov. Bali 80361
                  </span>
                </a>
              </li> 
              
              <li>
                <a href="https://mail.google.com/mail/u/desaadatbualu04.11@gmail.com"  class="flex items-start gap-3 hover:text-amber-700 transition">
                  <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white/20">
                    <i class="fa-solid fa-envelope w-4 text-center"></i>
                  </span>
                  <span>desaadatbualu04.11@gmail.com</span>
                </a>
              </li>
            
              <li>
                <a href="https://wa.me/6285850585461"
                  class="flex items-center gap-3 hover:text-amber-700 transition">
                  <span class="w-8 h-8 flex items-center justify-center rounded-full bg-white/20">
                    <i class="fa-brands fa-whatsapp"></i>
                  </span>
                  <span>0858-5058-5461</span>
                </a>
              </li>
            
            </ul>
          </div>

          <!-- Social Media -->
          <div class="bg-white/10 backdrop-blur rounded-xl p-5 shadow-md">
            <h4 class="text-lg font-semibold flex items-center gap-2 mb-4">
              <i class="fa-solid fa-bell"></i>
              Media Sosial
            </h4>

            <div class="flex gap-4">
              <a href="https://instagram.com/desaadatbualu" class="w-11 h-11 flex items-center justify-center
              bg-white/20 rounded-full
              hover:bg-white hover:text-amber-700 transition transform hover:-translate-y-1">
                <i class="fa-brands fa-instagram text-lg"></i>
              </a>
           
              <a href="" class="w-11 h-11 flex items-center justify-center
              bg-white/20 rounded-full
              hover:bg-white hover:text-amber-700 transition transform hover:-translate-y-1">
                <i class="fa-brands fa-facebook-f text-lg"></i>
              </a>

              <a href="https://youtube.com/@desaadatbualu1?si=QNffvUewrVMpST9X" class="w-11 h-11 flex items-center justify-center
              bg-white/20 rounded-full
              hover:bg-white hover:text-amber-700 transition transform hover:-translate-y-1">
              <i class="fa-brands fa-youtube text-lg"></i>
              </a>
            </div>
          </div>
        </div>

          

            <!-- <div class="flex flex-row-reverse items-center justify-end space-x-reverse space-x-3">
              <a href="https://maps.app.goo.gl/Cz6F9eayEz2h5heW7">
                <i class="fa-solid fa-map-location mt-1 w-5 text-lg"></i>
                <span>Jl.Kuruksetra No.1, Benoa</span>
              </a>
            </div> -->
          </div>
          </div>
          <!-- End Kontak -->

        </div>
        <!-- Copyright -->
  <div class="mt-10 border-t border-white/30">
    <p class="text-center text-sm py-4 text-white/90">
      © {{ date('Y') }} Desa Adat Bualu/Portal-Digital.
    </p>
  </div>
      </footer>
    <!-- End Footer -->

    <!-- Modal -->
      <!-- <div
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
      </div> -->
    <!-- End Modal -->

    <!-- Javascript Footer -->
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
    <!-- Javascript Footer -->

</body>
</html>
