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
        html, body {
            margin: 0px;
            padding: 0px;
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: Helvetica;
        }

        #tree {
        padding-top:0px;
        width: 100%;
        height: 100%;   
        }
    </style>

    <script src="https://balkan.app/js/OrgChart.js"></script>
    
    <div id="tree"></div>

    <script>
        OrgChart.templates.group.link = 
            `<path stroke-linejoin="round" stroke="#aeaeae" stroke-width="1px" fill="none" d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}" />`;
        OrgChart.templates.group.nodeMenuButton = '';
        OrgChart.templates.group.min = Object.assign({}, OrgChart.templates.group);
        OrgChart.templates.group.min.imgs = `{val}`;
        OrgChart.templates.group.min.img_0 = ``;
        OrgChart.templates.group.min.description = 
            `<text data-width="230" data-text-overflow="multiline" style="font-size: 14px;" fill="#aeaeae" x="125" y="100" text-anchor="middle">{val}</text>`;

        let options = getOptions();
        let chart = new OrgChart(document.getElementById("tree"), {
            mouseScrool: OrgChart.none,
            scaleInitial: options.scaleInitial,
            enableAI: false,
            enableSearch: false,
            template: "ana",
            enableDragDrop: true,
            nodeMouseClick: OrgChart.action.edit,
            nodeMenu: {
                details: { text: "Details" },
                edit: { text: "Edit" },
                add: { text: "Add" },
                remove: { text: "Remove" }
            },
            dragDropMenu: {
                addInGroup: { text: "Add in group" },
                addAsChild: { text: "Add as child" }
            },
            nodeBinding: {
                imgs: "img",
                description: "description",
                field_0: "name",
                field_1: "title",
                img_0: "img",

            },
            tags: {
                "group": {
                    template: "group",
                },
                "bagapawongan-group": {
                    subTreeConfig: {
                        columns: 2
                    }
                },
                "bagapalemahan-group": {
                    subTreeConfig: {
                        columns: 1
                    }
                },
                "baga-group": {
                    
                    min: true,
                    subTreeConfig: {
                        columns: 2
                    }
                },
            }
        });

        chart.on('init', function () {
            chart.fit();
        });


        chart.on('drop', function (sender, draggedNodeId, droppedNodeId) {
            let draggedNode = sender.getNode(draggedNodeId);
            let droppedNode = sender.getNode(droppedNodeId);

            if (droppedNode.tags.indexOf("group") != -1 && draggedNode.tags.indexOf("group") == -1) {
                let draggedNodeData = sender.get(draggedNode.id);
                draggedNodeData.pid = null;
                draggedNodeData.stpid = droppedNode.id;
                sender.updateNode(draggedNodeData);
                return false;
            }
        });

        chart.on('click', function (sender, args) {
            if (args.node.tags.indexOf("group") != -1) {
                if (args.node.min) {
                    sender.maximize(args.node.id);
                }
                else {
                    sender.minimize(args.node.id);
                }
            }
            return false;
        });

        chart.on('field', function (sender, args) {
            if (args.node.min) {
                if (args.name == "img") {
                    let count = args.node.stChildrenIds.length > 5 ? 5 : args.node.stChildrenIds.length;
                    let x = args.node.w / 2 - (count * 32) / 2;
                    for (let i = 0; i < count; i++) {
                        let data = sender.get(args.node.stChildrenIds[i]);
                        args.value += `<image xlink:href="${data.img}" x="${(x + i * 32)}" y="45" width="32" height="32" ></image>`;
                    }
                }
            }
        });

        chart.load([
            { id: 1, name: "{{$structures[0]->name}}", title: "{{$structures[0]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 2, pid: 1, name: "{{$structures[1]->name}}", title: "{{$structures[1]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 3, pid: 2, name: "{{$structures[2]->name}}", title: "{{$structures[2]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 4, pid: 2, name: "{{$structures[3]->name}}", title: "{{$structures[3]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 5, pid: 2, name: "{{$structures[4]->name}}", title: "{{$structures[4]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: "baga", pid: 4, name: "Baga Parahyangan", tags: ["baga-group", "group"], description: "Mengurus Upakara Agama/Adat" },
            { id: 6, stpid: "baga", name: "{{$structures[5]->name}}", title: "{{$structures[5]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 7, stpid: "baga", name: "{{$structures[6]->name}}", title: "{{$structures[6]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 8, stpid: "baga", name: "{{$structures[7]->name}}", title: "{{$structures[7]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 9, stpid: "baga", name: "{{$structures[8]->name}}", title: "{{$structures[8]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },

            { id: "bagapalemahan", pid: 4, name: "Baga Palemahan", tags: ["bagapalemahan-group", "group"], description: "Mengurus Wilayah Strategis Desa " },
            { id: 10, stpid: "bagapalemahan", name: "{{$structures[5]->name}}", title: "{{$structures[5]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 11, stpid: "bagapalemahan", name: "{{$structures[6]->name}}", title: "{{$structures[6]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 12, stpid: "bagapalemahan", name: "{{$structures[7]->name}}", title: "{{$structures[7]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 13, stpid: "bagapalemahan", name: "{{$structures[8]->name}}", title: "{{$structures[8]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },

            { id: "bagapawongan", pid: 4, name: "Baga Pawongan", tags: ["bagapawongan-group", "group"], description: "Mengurus Kependudukan Desa " },
            { id: 14, stpid: "bagapawongan", name: "{{$structures[5]->name}}", title: "{{$structures[5]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 15, stpid: "bagapawongan", name: "{{$structures[6]->name}}", title: "{{$structures[6]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 16, stpid: "bagapawongan", name: "{{$structures[7]->name}}", title: "{{$structures[7]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
            { id: 17, stpid: "bagapawongan", name: "{{$structures[8]->name}}", title: "{{$structures[8]->position}}", img: "{{asset('storage/'.'structure_images/default.png')}}" },
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
