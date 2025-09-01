
  <!-- Ex-Layout -->
    <!-- Konten -->
    <x-layout>
      <x-slot:title>
        Struktur Prejuru Desa
      </x-slot>

      <!-- Title -->
      <div class="text-center mt-10 mb-5">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Struktur Prejuru Desa
        </h2>
      </div>
      <!-- End Title -->

    <style>
        #tree {
        width: 100%;
        height: 100%;
        }
    </style>

    <script src="https://balkan.app/js/OrgChart.js"></script>


    
        <div id="tree"></div>

    <script>
        //JavaScript
        let options = getOptions();
        let chart = new OrgChart(document.getElementById("tree"), {
        enableSearch: false,
        enableAI: false,
        template: 'mila',
        layout: OrgChart.mixed,
        enableDragDrop: true,    
        mouseScrool: OrgChart.action.scroll,
        scaleInitial: options.scaleInitial,
        tags: {
        "assistant": {
            template: "mila"
        }
        },
    nodeMenu: {
        details: { text: "Details" },
        edit: { text: "Edit" },
        add: { text: "Add" },
        remove: { text: "Remove" }
    },
    nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img"
    }
});

chart.load([
    { id: 1, name: "{{$structures[0]->name}}", title: "{{$structures[0]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    { id: 2, pid: 1, name: "{{$structures['1']->name}}", title: "{{$structures['1']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    { id: 3, pid: 2, name: "{{$structures['2']->name}}", title: "{{$structures['2']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    { id: 4, pid: 2, name: "{{$structures['3']->name}}", title: "{{$structures['3']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    { id: 5, pid: 2, name: "{{$structures['4']->name}}", title: "{{$structures['4']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    { id: 6, pid: 4, name: "{{$structures['5']->name}}", title: "{{$structures['5']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    { id: 7, pid: 4, name: "{{$structures['6']->name}}", title: "{{$structures['6']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    { id: 8, pid: 4, name: "{{$structures['7']->name}}", title: "{{$structures['7']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    { id: 9, pid: 4, name: "{{$structures['8']->name}}", title: "{{$structures['8']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    // { id: 8, pid: 1, tags: ["assistant"], name: "{{$structures['1']->name}}", title: "{{$structures['1']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
    // { id: 9, pid: 4, tags: ["assistant"], name: "{{$structures['1']->name}}", title: "{{$structures['1']->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },

]);

function getOptions(){
    const searchParams = new URLSearchParams(window.location.search);
    let fit = searchParams.get('fit');
    let scaleInitial = 1;
    if (fit == 'yes'){
        scaleInitial = OrgChart.match.boundary;
    }
    return {scaleInitial};
}
        </script>
    <!-- End Konten -->
</x-layout>
    <!-- End Ex-Layout -->
