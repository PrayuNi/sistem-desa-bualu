<div id="loginModal" style="background-color: rgba(0, 0, 0, 0.395)" class="hidden fixed inset-0 bg-opacity-50 flex items-center justify-center z-[99999]">
    <div class="bg-white p-6 rounded shadow-lg w-80 text-center z-[100000]">
        <h2 class="text-lg font-bold mb-2">Harus Login</h2>
        <p class="text-gray-600 mb-4">
            Anda harus login terlebih dahulu untuk mengajukan surat
        </p>

        <div class="flex justify-center gap-3">
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Masuk</a>
            <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded">Daftar</a>
        </div>

        <button onclick="document.getElementById('loginModal').classList.add('hidden')" class="mt-4 text-gray-500 underline">
            Tutup
        </button>
    </div>
</div>