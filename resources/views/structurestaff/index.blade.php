    <!-- Ex-Layout -->
     <x-layout>
      <x-slot:title>
        Struktur Staff Kantor Desa
      </x-slot>
    
    <!-- Konten -->
    <section class="strukturprejuru container pt-10 pb-16 mx-auto">
      <!-- Title -->
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:w-[80%] after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Struktur Staff Kantor Desa
        </h2>
      </div>
      <!-- End Title -->

      <!-- Row 1 Admin -->
      <div class="row my-5 flex justify-center flex-wrap">
        <div class="card max-w-48 text-center items-center shadow-xl mx-5 p-5">
          <img class="w-60 mx-auto" src="/img/business-man.png" alt="" />
          @if(isset($structuresstaff['Staff Admin 1']))
            <a href="{{route('structurestaff.edit-structurestaff', $structuresstaff['Staff Admin 1']->id)}}">
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
          </a>
          @endif

          <img class="w-60 mx-auto" src="{{asset('storage/' . ($structuresstaff['Staff Admin 1']->image ?? 'structure_images/default.png'))}}" alt="" />
          <h4 class="font-bold text-balance mt-2 text-lg">
            {{$structuresstaff['Staff Admin 1']->name}}
          </h4>
          <p class="text-sm mt-2">{{$structuresstaff['Staff Admin 1']->position}}</p>
        </div>

        <div class="card max-w-48 text-center items-center shadow-xl mx-5 p-5">
          <img class="w-60 mx-auto" src="/img/business-man.png" alt="" />
           @if(isset($structuresstaff['Staff Admin 2']))
            <a href="{{route('structurestaff.edit-structurestaff', $structuresstaff['Staff Admin 2']->id)}}">
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
          </a>
          @endif

          <img class="w-60 mx-auto" src="{{asset('storage/' . ($structuresstaff['Staff Admin 2']->image ?? 'structure_images/default.png'))}}" alt="" />
          <h4 class="font-bold text-balance mt-2 text-lg">
            {{$structuresstaff['Staff Admin 2']->name}}
          </h4>
          <p class="text-sm mt-2">{{$structuresstaff['Staff Admin 2']->position}}</p>
        </div>
      </div>

      <div class="row my-5 flex justify-center flex-wrap">
        <div class="card max-w-48 text-center items-center shadow-xl mx-5 p-5">
          <img class="w-60 mx-auto" src="/img/business-man.png" alt="" />
           @if(isset($structuresstaff['Staff Admin 3']))
            <a href="{{route('structurestaff.edit-structurestaff', $structuresstaff['Staff Admin 3']->id)}}">
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
          </a>
          @endif

          <img class="w-60 mx-auto" src="{{asset('storage/' . ($structuresstaff['Staff Admin 3']->image ?? 'structure_images/default.png'))}}" alt="" />
          <h4 class="font-bold text-balance mt-2 text-lg">
            {{$structuresstaff['Staff Admin 3']->name}}
          </h4>
          <p class="text-sm mt-2">{{$structuresstaff['Staff Admin 3']->position}}</p>
        </div>

        <div class="card max-w-48 text-center items-center shadow-xl mx-5 p-5">
          <img class="w-60 mx-auto" src="/img/business-man.png" alt="" />
         @if(isset($structuresstaff['Staff Admin 4']))
            <a href="{{route('structurestaff.edit-structurestaff', $structuresstaff['Staff Admin 4']->id)}}">
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-6 py-3 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
          </a>
          @endif

          <img class="w-60 mx-auto" src="{{asset('storage/' . ($structuresstaff['Staff Admin 4']->image ?? 'structure_images/default.png'))}}" alt="" />
          <h4 class="font-bold text-balance mt-2 text-lg">
            {{$structuresstaff['Staff Admin 4']->name}}
          </h4>
          <p class="text-sm mt-2">{{$structuresstaff['Staff Admin 4']->position}}</p>
        </div>
      </div>
      <!-- End Row 1 Kepala Desa -->
    </section>
    <!-- End Konten -->
    </x-layout>