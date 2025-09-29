 <!-- Ex-Layout -->
    <x-layout>
      <x-slot:title>
        Data APBD Desa Adat Bualu
      </x-slot>

       <section class="strukturprejuru container pt-10 pb-16 mx-auto">
      <!-- Title -->
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600  after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Data APBD Desa Adat Bualu
        </h2>
      </div>
      <!-- End Title -->

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
              <p class="text-3xl font-bold">200RB</p>
            </div>
            <img src="{{asset('storage/assets/income.png')}}" alt="pendapatan" class="w-25 h-25" />
          </div>
          <!-- Belanja -->
          <div
            class="flex items-center justify-between bg-gray-100 p-6 rounded-2xl shadow-sm mx-5"
          >
            <div>
              <p class="text-lg font-medium">Belanja</p>
              <p class="text-3xl font-bold">200RB</p>
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
              <p class="text-3xl font-bold">200RB</p>
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
              <p class="text-3xl font-bold">200RB</p>
            </div>
            <img src="{{asset('storage/assets/expenses.png')}}" alt="pengeluaran" class="w-25 h-25" />
          </div>
        </div>
        <!-- End Row 2 -->
      </div>

      <div class="row flex">
        <a class="btn bg-green-700 rounded-full mx-auto w-fit px-4 py-2 mb-3 text-white font-semibold" target="_blank" href="https://drive.google.com/drive/folders/1BIdNDWKkNAq9zH1Li2bcc9DcvHZ8kHBH?usp=sharing">
          <i class="fa-solid fa-arrow-down"></i> Download
        </a>
      </div>
    </section>
    <!-- End Data APBD Desa -->

    </x-layout> 