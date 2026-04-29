@extends('app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-green-600">Mari Berdiskusi</h1>
        <p class="text-gray-500 mt-2">Punya pertanyaan atau ingin berkolaborasi? Kami siap mendengar cerita Anda.</p>
    </div>

    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="space-y-6">
            <div class="bg-green-600 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-green-500 rounded-full opacity-50"></div>
                
                <h2 class="text-2xl font-bold mb-6">Informasi Kontak</h2>
                
                <div class="space-y-6 relative z-10">
                    <div class="flex items-start space-x-4">
                        <span class="bg-green-500 p-3 rounded-xl text-xl">📞</span>
                        <div>
                            <p class="text-green-100 text-sm">WhatsApp Fast Response</p>
                            <p class="font-semibold text-lg">+1652 3612 5351 253</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <span class="bg-green-500 p-3 rounded-xl text-xl">📧</span>
                        <div>
                            <p class="text-green-100 text-sm">Email Resmi</p>
                            <p class="font-semibold text-lg lowercase">bersamakitadonasi@gmail.com</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <span class="bg-green-500 p-3 rounded-xl text-xl">📍</span>
                        <div>
                            <p class="text-green-100 text-sm">Kantor Pusat</p>
                            <p class="font-semibold text-lg">Gedung Kebaikan Lt. 4, Jakarta</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12 flex space-x-4">
                    <a href="#" class="bg-white/20 hover:bg-white/40 p-3 rounded-full transition text-xs font-bold uppercase">Instagram</a>
                    <a href="#" class="bg-white/20 hover:bg-white/40 p-3 rounded-full transition text-xs font-bold uppercase">Twitter</a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm font-medium uppercase tracking-wider">Status Kantor</p>
                    <p class="text-gray-700 font-bold italic">Senin - Jumat | 09:00 - 17:00</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-green-500 animate-pulse text-xs font-bold">ONLINE</span>
                    <div class="text-green-500 text-xl animate-pulse">●</div>
                </div>
            </div>
        </div>

        <div class="bg-white p-8 md:p-10 rounded-3xl shadow-2xl border border-gray-50">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Kirim Pesan Langsung</h3>
            <form action="#" class="space-y-5">
                <div>
                    <label class="block text-gray-600 text-sm font-semibold mb-2 ml-1">Nama Lengkap</label>
                    <input type="text" class="w-full px-4 py-3 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none" placeholder="Masukkan nama Anda...">
                </div>
                
                <div>
                    <label class="block text-gray-600 text-sm font-semibold mb-2 ml-1">Kategori Pesan</label>
                    <select class="w-full px-4 py-3 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none text-gray-500">
                        <option>Pertanyaan Umum</option>
                        <option>Bantuan Donasi</option>
                        <option>Kemitraan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-600 text-sm font-semibold mb-2 ml-1">Pesan Anda</label>
                    <textarea rows="4" class="w-full px-4 py-3 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none" placeholder="Apa yang bisa kami bantu hari ini?"></textarea>
                </div>

                <button class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-green-200 transition-all active:scale-95 flex items-center justify-center space-x-2">
                    <span>🚀 Kirim Pesan</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection