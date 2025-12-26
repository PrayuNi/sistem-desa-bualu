    <x-layout>
      <x-slot:title>
        Struktur Prejuru Desa
      </x-slot>

    <!--Notifikasi berhasil disimpan  -->
      @if(session('success'))
        <div id="toastSuccess" class="fixed top-5 right-5 flex items-center p-4 rounded-lg shadow-lg bg-green-600 text-white animate-slide-in">
          <i class="fa-solid fa-circle-check text-2xl mr-3"></i>
          <span class="text-lg font-semibold">{{ session('success') }}</span>
        </div>

        <style>
          @keyframes slideIn {
            from { opacity: 0; transform: translateX(100%); }
            to { opacity: 1; transform: translateX(0); }
          }
          @keyframes slideOut {
            from { opacity: 1; transform: translateX(0); }
            to { opacity: 0; transform: translateX(100%); }
          }
          .animate-slide-in{
            animation: slideIn 0.10s ease-out forwards;
          }
        </style>

        <script>
        setTimeout(() => {
          const toast = document.getElementById('toastSuccess');
          toast.style.animation = "slideOut 0.5s ease-in forwards";
          setTimeout(() => toast.remove(), 600);
        }, 3000);
        </script>
      @endif
    <!-- End Notifikasi berhasil disimpan -->

    <!-- Title -->
      <div class="text-center mt-10">
        <h2
          class="font-bold inline-block relative after:content-[''] after:block after:h-[2px] after:bg-amber-600 after:mx-auto after:mt-1 mb-5 text-amber-600 text-3xl"
        >
          Struktur Prejuru Desa
        </h2>
      </div>
    <!-- End Title -->

    <!-- Tombol Edit -->
    @auth
      @if(Auth::user()->role == 0)
        <div class="flex justify-center mt-6">
          <a href="{{ route('structure.tabel-structure') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
            <i class="fa-solid fa-edit"></i> Kelola Struktur Prejuru
          </a>
        </div>
      @endif
    @endauth
    <!-- End Tombol Edit -->

    <style>
      .highcharts-figure, .highcharts-data-table table {
        min-width: 360px; 
        max-width: 800px;
        margin: 1em auto;
      }
      .highcharts-data-table table {
        background-color: 'yellow';
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
      }
      .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
      }
      .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
      }
      .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
      }
      .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
      }
      .highcharts-data-table tr:hover {
        background: #f1f7ff;
      }
      #container h4 {
        text-transform: none;
        font-size: 14px;
        font-weight: normal;
      }
      #container p {
        font-size: 13px;
        line-height: 16px;
      }

      @media screen and (max-width: 600px) {
        #container h4 {
          font-size: 2.3vw;
          line-height: 3vw;
        }
        #container p {
          font-size: 2.3vw;
          line-height: 3vw;
        }
      }
    </style>

    <div class="content">
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/sankey.js"></script>
      <script src="https://code.highcharts.com/modules/organization.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>

      <figure class="highcharts-figure">
      <div id="container"></div>
      </figure>

    </div>

    <script>
      Highcharts.chart('container', {
      chart: {
        height: 1000,
        inverted: true
      },

      title: {
        text: ''
      },

      accessibility: {
        point: {
          descriptionFormatter: function (point) {
            var nodeName = point.toNode.name,
              nodeId = point.toNode.id,
              nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
              parentDesc = point.fromNode.id;
            return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
          }
        }
      },

      series: [{
        type: 'organization',
        name: 'Highsoft',
        keys: ['from', 'to'],
        data: [
          ['Kepala Desa', 'Wakil Kepala Desa'],
          ['Wakil Kepala Desa', 'Sekretaris Desa'],
          ['Wakil Kepala Desa', 'Bendahara 1'],
          
          ['Bendahara 1', 'Baga Parahyangan'],
          ['Bendahara 1', 'Baga Palemahan'],
          ['Bendahara 1', 'Baga Pawongan'],

          ['Baga Parahyangan', 'Anggota 1'],
          
          ['Baga Palemahan', 'Anggota 2'],
          ['Anggota 2', 'Anggota 3'],
          
          ['Baga Pawongan', 'Anggota 4'],
          ['Anggota 4', 'Anggota 5'],
        ],

        levels: [
          {
            level: 0,
            color: 'orange',
            dataLabels: {
              color: 'black'
            },
            height: 25
          }, 
          {
            level: 1,
            color: 'orange',
            dataLabels: {
              color: 'black'
            },
            height: 25
          }, 
          {
            level: 2,
            color: 'orange',
            dataLabels: {
              color: 'black'
            },
          }, 
          {
            level: 4,
            color: '#FFA620',
            dataLabels: {
              color: 'black'
            },
            height: 10
          },
          {
            level: 5,
            color: '#FFA620',
            dataLabels: {
              color: 'black'
            },
          },
          {
            level: 6,
            color: '#FFA620',
            dataLabels: {
              color: 'black'
            },
          },
          {
            level: 7,
            color: '#FFA620',
            dataLabels: {
              color: 'black'
            },
          },
          {
            level: 8,
            color: '#FFA620',
            dataLabels: {
              color: 'black'
            },
          }
        ],

        nodes: [ 
          {
            id: 'Kepala Desa',
            title: '{{$structures[0]->position}}',
            name: '{{$structures[0]->name}}',
            image: '{{ asset('storage/' . $structures[0]->image) }}'
          },

          {
            id: 'Wakil Kepala Desa',
            title: '{{$structures[1]->position}}',
            name: '{{$structures[1]->name}}',
            image: '{{ asset('storage/' . $structures[1]->image) }}'
          }, 
          
          {
            id: 'Sekretaris Desa',
            title: '{{$structures[2]->position}}',
            name: '{{$structures[2]->name}}',
            image: '{{ asset('storage/' . $structures[2]->image) }}'
          }, 
          
          {
            id: 'Bendahara 1',
            title: '{{$structures[3]->position}}',
            name: '{{$structures[3]->name}}',
            image: '{{ asset('storage/' . $structures[3]->image) }}'
          }, 
          
        // Anggota Baga Parahyangan
          {
          id: 'Anggota 1',
          title: '{{$structures[5]->position}}',
          name: '{{$structures[5]->name}}',
          image: '{{ asset('storage/' . $structures[5]->image) }}'
          },  
                  
        // Anggota Baga Palemahan
          {
          id: 'Anggota 2',
          title: '{{$structures[9]->position}}',
          name: '{{$structures[9]->name}}',
          image: '{{ asset('storage/' . $structures[9]->image) }}'
          }, 
          
          {
          id: 'Anggota 3',
          title: '{{$structures[10]->position}}',
          name: '{{$structures[10]->name}}',
          image: '{{ asset('storage/' . $structures[10]->image) }}'
          }, 
           
        // Anggota Baga Pawongan
          {
          id: 'Anggota 4',
          title: '{{$structures[13]->position}}',
          name: '{{$structures[13]->name}}',
          image: '{{ asset('storage/' . $structures[13]->image) }}'
          }, 
          
          {
          id: 'Anggota 5',
          title: '{{$structures[14]->position}}',
          name: '{{$structures[14]->name}}',
          image: '{{ asset('storage/' . $structures[14]->image) }}'
          },       
        ],

        colorByPoint: false,
        color: 'orange',
        dataLabels: {
          color: 'black'
        },
        borderColor: 'white',
        nodeWidth: 65
      }],
        tooltip: {
          outside: true
        },
        exporting: {
          allowHTML: true,
          sourceWidth: 800,
          sourceHeight: 600
        }
      });
    </script>

</x-layout>