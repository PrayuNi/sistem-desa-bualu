 <!-- Ex-Layout -->
     <x-layout>
      <x-slot:title>
        Profil Desa Adat Bualu
      </x-slot>

      <!-- Content -->
    <section class="min-h-screen mx-auto container">
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Sambutan Kepala Desa
        </h2>
      </div>

      <!-- Btn Edit -->
      @foreach ($profilsdesa as $p)
      <div class="row">
        <div class="md:ml-auto mx-auto w-fit my-10">
          <a href="{{route('profildesa.edit-profildesa', $p->id)}}">
          <button
            type="button"
            class="btn bg-green-900 rounded-full w-fit px-4 py-2 text-white font-semibold"
          >
            <i class="fa-solid fa-edit"></i>
            Edit Data
          </button>
        </div>
      </div>
      <!-- End Btn Edit -->

      <!-- Sambutan Kepala Desa -->
      <div class="row my-5 flex">
        <div
          class="card max-w-full text-center items-center shadow-amber-600 shadow-xl mx-auto p-5 rounded-2xl"
        >
          <img class="w-60 mx-auto" src="{{asset('storage/' . ($p->image ?: 'profil_images/default.png'))}}" alt="" />
          <h4 class="font-bold text-balance mt-2 text-lg">
            I Wayan Mudita.SH
          </h4>
          <p class="text-sm mt-2">BENDESA ADAT BUALU</p>
        </div>
      </div>
     

      <!-- Text Sambutan -->
      <div class="text-center my-10">
        <div class="sambutan">
          <p class="font-medium text-2xl">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam id
            labore officiis placeat officia numquam! Corrupti illo soluta quasi
            facere asperiores nihil eius distinctio, aut commodi, nostrum ex
            ipsam consequatur quaerat, accusantium minima dignissimos? Rem vero
            nemo expedita ut similique minima ipsum dolorum, provident odit enim
            quam sunt porro inventore.
          </p>
        </div>
      </div>

      <!-- End Sambutan -->

      <!-- Visi Misi -->
      <div class="row container mx-auto flex">
        <div
          class="visi text-center p-10 shadow-lg shadow-amber-400 bg-amber-500 rounded-lg m-5"
        >
          <h4 class="font-bold text-4xl text-amber-50">Visi</h4>
          <p class="mt-5 text-white text-justify">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos beatae
            cupiditate culpa reprehenderit quae sit soluta aperiam dolor
            mollitia nostrum!
          </p>
        </div>
        <div
          class="misi p-10 text-center  shadow-lg shadow-amber-400 bg-amber-500 rounded-lg m-5 text-white"
        >
          <h4 class="font-bold text-4xl text-amber-50">Misi</h4>
          <div class="text-left">
            <li>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias,
              numquam? Nostrum accusantium, dolores veniam autem deserunt
              architecto. Accusantium, debitis perferendis.
            </li>
            <li>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias,
              numquam? Nostrum accusantium, dolores veniam autem deserunt
              architecto. Accusantium, debitis perferendis.
            </li>
            <li>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias,
              numquam? Nostrum accusantium, dolores veniam autem deserunt
              architecto. Accusantium, debitis perferendis.
            </li>
          </div>
        </div>
      </div>
      <!-- End Visi Misi -->

      <!-- Sejarah Desa -->
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Sejarah Desa Adat Bualu
        </h2>
      </div>

      <div class="text-justify px-5">
        <p class="text-lg font-thin">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos
          quos ea, voluptates perspiciatis placeat ex dolorem adipisci unde
          expedita ipsa quod neque repudiandae tempora harum consequatur vitae
          officia aspernatur ratione. Expedita qui necessitatibus error, fugit
          rerum optio culpa ut labore quos deserunt quod, quia rem corrupti!
          Minus deleniti quis, totam, corrupti repudiandae reiciendis quam non
          voluptatem adipisci soluta officia libero commodi cupiditate possimus
          facere itaque dolorum incidunt nobis quo. Tenetur dolores ullam harum
          nulla velit, quae qui! Esse, dolorem sit. Eligendi, sequi illo! Iste
          officiis doloribus blanditiis id nihil tempore, eaque, quas aut eius
          corrupti sit cumque! Ab officiis deserunt maiores culpa aspernatur
          velit, obcaecati veniam consectetur incidunt autem. <br />
          <br />
          Mollitia deserunt ad voluptate repellat debitis neque, incidunt
          voluptatem, quidem, deleniti dolorem libero dolores expedita? Ut
          asperiores expedita quibusdam et ab dicta nemo autem excepturi saepe
          eaque dignissimos dolores ratione quia est quasi hic numquam
          consequuntur architecto perspiciatis, consequatur repellendus!
          Molestias laudantium optio error eaque totam eius, provident velit?
          Nesciunt architecto accusantium quam, nemo omnis nobis? Cum doloribus,
          doloremque accusamus aspernatur dolorum natus ut tenetur dolores totam
          quisquam! Nostrum, minus aut ipsum ratione illo laborum alias
          molestiae quas repellendus fugit facilis facere amet tempore,
          provident tenetur sed magni, aliquam nemo? Perferendis nostrum hic ab
          iste maiores architecto totam porro provident, dignissimos aperiam
          necessitatibus fugit, magni eligendi assumenda dolorem dolor, libero
          pariatur dicta omnis error quidem facilis tenetur? Tempore dolores
          autem assumenda architecto accusantium possimus similique suscipit
          maiores molestiae ut! Cupiditate ex quas vero enim sed harum! Est
          accusantium eum minus eligendi eos, nisi quibusdam velit adipisci
          veritatis, dolor iusto officia tempore eaque iste blanditiis?
          Laboriosam nemo mollitia, corrupti aperiam necessitatibus, earum
          voluptatum amet accusamus odio quisquam vel possimus. <br />
          <br />
          Et quibusdam totam deserunt, facere ratione magnam. Beatae pariatur
          asperiores expedita odit aliquid perspiciatis modi ut nam. Magnam,
          sequi architecto expedita, iure consequuntur possimus quibusdam dolor
          molestias, excepturi distinctio eius rem. Omnis ea non quaerat amet
          porro atque deleniti quis qui accusantium consequatur, error pariatur.
          Ratione maiores voluptatibus deleniti quibusdam assumenda aliquid est
          porro repudiandae, dolores perspiciatis, odit eveniet, optio quisquam
          ad. Error esse qui debitis rem consequatur nihil ea voluptatum
          recusandae ducimus id atque laboriosam quidem, voluptas optio natus
          eaque ex voluptatibus eligendi dolores cumque veritatis illo autem
          tempora sunt. Vero ducimus ipsa labore distinctio error sapiente,
          numquam veritatis cum rem deserunt blanditiis repellendus accusamus
          laborum culpa ea expedita consequuntur. Ex nesciunt voluptatem iusto
          in nostrum blanditiis illum incidunt reiciendis dolorum! Numquam nam
          voluptatum eligendi et, eius iusto? Quaerat, fuga laboriosam! Est
          blanditiis voluptatem praesentium aliquam aspernatur at ullam
          cupiditate suscipit enim nostrum, architecto unde? Deleniti in,
          dolores commodi cupiditate nobis omnis rem accusamus quas hic
          perspiciatis quia, officia numquam, harum atque amet nesciunt
          necessitatibus animi. Quae, at. Eum earum harum quam totam soluta quis
          ullam quas voluptates asperiores rerum? Molestiae doloremque eos
          praesentium quas sunt eius recusandae dolores, voluptate nostrum eaque
          veritatis sit commodi asperiores quo harum laudantium sequi veniam id
          nihil a reiciendis doloribus assumenda tenetur voluptatem! Distinctio
          rerum sint nulla consequuntur tempore illo, perspiciatis officiis
          dignissimos soluta cum omnis. <br />
          <br />
        </p>
      </div>
      <!-- End Sejarah Desa -->

      <!-- Informasi Geografis -->
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Letak Geografis
        </h2>
      </div>

      <div
        class="flex flex-wrap shadow-lg shadow-amber-600 rounded-lg m-5 p-5 justify-around items-center md:justify-end"
      >
        <div class="col flex flex-wrap text-center md:text-left mx-10">
          <i class="fa-solid fa-city text-9xl m-3"></i>
          <div class="col">
            <h4 class="font-bold text-3xl">Luas Desa Adat Bualu</h4>
            <h2 class="text-2xl">100.000 <span class="text-sm">m2 </span></h2>
          </div>
        </div>
        <div class="col min-w-70 mt-5">
          <div class="space-y-4 text-2xl w-full md:w-auto">
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a
                href="https://maps.app.goo.gl/6RjoGcNxsTV8UyTs7?g_st=com.google.maps.preview.copy"
              >
                <span>Banjar Terora</span>
              </a>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a
                href="https://maps.app.goo.gl/C3qUkpFEDQM25Xat8?g_st=com.google.maps.preview.copy"
              >
                <span>Banjar Celuk</span>
              </a>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a
                href="https://maps.app.goo.gl/X1Ad2w3Jn97FzsEV7?g_st=com.google.maps.preview.copy"
              >
                <span>Banjar Peken</span>
              </a>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
              <a
                href="https://maps.app.goo.gl/zSBWSgVUPec7Xevs8"
              >
                <span>Banjar Penyarikan</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col min-w-70 mt-5">
          <div class="space-y-4 text-2xl w-full md:w-auto">
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
               <a
                href="https://maps.app.goo.gl/EhbGEKFDHRdrJU1M6"
              >
              <span>Banjar Pande</span>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
               <a
                href="https://maps.app.goo.gl/PYfg4U3vG1bJyUi78"
              >
              <span>Banjar Balekembar</span>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
               <a
                href="https://maps.app.goo.gl/Yvqp1uqoLYgot1mK8"
              >
              <span>Banjar Bualu</span>
            </div>
            <div class="flex items-start space-x-3">
              <i class="fa-solid fa-house-chimney"></i>
               <a
                href="https://maps.app.goo.gl/k4qZbMkoD4ZZgcZeA"
              >
              <span>Banjar Mumbul</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      <!-- End Informasi Geografis -->
    </section>
    <!-- End Content -->

</x-layout>