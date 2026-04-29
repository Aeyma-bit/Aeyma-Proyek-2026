@extends('app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-extrabold text-green-600 mb-4 italic">Bersama Menabur Kebaikan</h1>
        <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
            <span class="font-semibold text-green-700">Donasiku</span> bukan sekadar platform digital. Kami adalah wadah gotong royong modern yang memastikan setiap sen bantuanmu sampai ke tangan yang tepat untuk mengukir senyuman baru.
        </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-20 text-center">
        <div class="p-4">
            <p class="text-3xl font-bold text-green-600">500+</p>
            <p class="text-gray-500 text-sm">Kampanye Aktif</p>
        </div>
        <div class="p-4">
            <p class="text-3xl font-bold text-green-600">12Rb+</p>
            <p class="text-gray-500 text-sm">Donatur Baik</p>
        </div>
        <div class="p-4">
            <p class="text-3xl font-bold text-green-600">100%</p>
            <p class="text-gray-500 text-sm">Transparan</p>
        </div>
        <div class="p-4">
            <p class="text-3xl font-bold text-green-600">24/7</p>
            <p class="text-gray-500 text-sm">Dukungan Tim</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-lg border-b-4 border-green-500 hover:transform hover:-translate-y-2 transition duration-300">
            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-6 text-2xl">🔍</div>
            <h3 class="text-xl font-bold mb-3 text-gray-800">Transparansi Total</h3>
            <p class="text-gray-600 text-sm leading-relaxed">
                Setiap rupiah yang masuk dapat dilacak secara real-time. Kami percaya kepercayaan adalah fondasi dari setiap kebaikan.
            </p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-lg border-b-4 border-green-500 hover:transform hover:-translate-y-2 transition duration-300">
            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-6 text-2xl">📱</div>
            <h3 class="text-xl font-bold mb-3 text-gray-800">Donasi Sekali Klik</h3>
            <p class="text-gray-600 text-sm leading-relaxed">
                Berbagi tak pernah semudah ini. Dengan berbagai pilihan pembayaran digital, kamu bisa membantu kapan saja dan di mana saja.
            </p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-lg border-b-4 border-green-500 hover:transform hover:-translate-y-2 transition duration-300">
            <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-6 text-2xl">🌱</div>
            <h3 class="text-xl font-bold mb-3 text-gray-800">Tumbuh Bersama</h3>
            <p class="text-gray-600 text-sm leading-relaxed">
                Kami memastikan bantuanmu menciptakan kemandirian bagi penerima manfaat, bukan sekadar bantuan sesaat.
            </p>
        </div>
    </div>

    <div class="mt-20 bg-green-600 rounded-3xl p-10 text-center text-white shadow-xl">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Siap menjadi bagian dari perubahan?</h2>
        <p class="mb-8 text-green-100">Kebaikanmu hari ini adalah harapan bagi mereka esok hari.</p>
        <a href="/donasi" class="bg-white text-green-600 px-8 py-3 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-lg">
            Mulai Berdonasi
        </a>
    </div>
</div>
@endsection