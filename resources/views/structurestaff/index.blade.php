    <!-- Ex-Layout -->
     <x-layout>
      <x-slot:title>
        Struktur Staff Kantor Desa
      </x-slot>
    
    <!-- Konten -->
    <section class="strukturprejuru container pt-10 pb-16 mx-auto">
      <!-- Title -->
      <div class="text-center mt-10 mb-5">
      <div class="row flex float-right">
      <a href="{{route('structurestaff.create-structurestaff')}}">
        <button
              type="button"
              class="btn bg-gray-400 rounded-full w-fit px-4 py-2 mb-3 text-black font-semibold"
            >
              <i class="fa-solid fa-plus"></i> Tambah Data
            </button>
        </a> <br>
      </div> 

        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600  after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Struktur Staff Kantor Desa
        </h2>
      </div>
      <!-- End Title -->

      <!-- Card Staff -->
      <div class="row my-10 flex justify-center flex-wrap">
        <!-- Card Admin 1-->
         @foreach($structuresstaff as $s)
        <div class="card max-w-70 max-h-120 text-center items-center shadow-xl shadow-amber-700 mx-auto p-10 rounded-xl">
          <!-- <img class="w-60 mx-auto" src="{{asset('storage/' . ($s-> image ?? 'structure_images/default.png'))}}" alt="" /> -->
          <div class="row flex float-right">
            <a href="{{route('structurestaff.edit-structurestaff', $s->id)}}">
            <button
              type="button"
              class="btn bg-blue-800 rounded-full w-fit px-3 py-1 mb-3  text-white font-semibold"
            >
              <i class="fa-solid fa-edit"></i>
            </button>
            </a>

        
              <form action="{{route('structurestaff.delete', $s->id)}}" method="POST" onsubmit="return confirm ('Yakin Mau Dihapus?')" >
                        @csrf
                        @method('DELETE')
                        <button class="btn bg-red-700 rounded-full w-fit px-3 py-1 text-white font-semibold" type="submit"> <i class="fa-solid fa-trash"></i> </button>
                </form>  
          </div>


        

          <img class="w-60 mx-auto rounded-xl" src="{{asset('storage/' . ($s->image ?? 'structure_images/default.png'))}}" alt="" />
          <h4 class="font-bold text-balance mt-2 text-lg">
            {{$s->name}}
          </h4>
          <p class="text-sm mt-2">{{$s->position}}</p>
        </div>
        @endforeach

    </section>
    <!-- End Konten -->
    </x-layout>