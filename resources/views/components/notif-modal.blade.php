<style>
.notif-modal {
    display: none; /* default hidden */
}

.notif-modal .notif-card {
    max-width: 320px;
    background-color: #fff;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    text-align: center;
    z-index: 10000;
}
</style>

<div id="notifModal"
     class=" notif-card hidden fixed inset-0 bg-black/40 
            flex items-center justify-center z-[9999]">

    <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
        <h2 class="text-lg font-bold mb-2 text-red-600">
            <i class="fa-solid fa-triangle-exclamation mb-2"></i>
            Fitur Sedang Diperbaiki
        </h2>

        <p class="text-gray-700 font-medium mb-2">
            Struktur Prejuru Desa saat ini sedang dalam proses pembaruan
        </p>
        <p class="text-gray-500 text-sm mb-4">
            Kami sedang menyempurnakan data agar informasi yang disampaikan lebih akurat
        </p>

        <button id="notifCloseBtn" class="text-sm text-gray-500 underline">
            Tutup
        </button>
    </div>
</div>
