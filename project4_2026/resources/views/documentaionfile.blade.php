@extends('app')

@section('title', 'Dokumentasi')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-green-600">Dokumentasi Donasi</h1>
        <p class="text-gray-500 mt-2">Unggah dokumen dan gambar pendukung agar laporan donasi tetap rapi.</p>
    </div>

    @if(session('success'))
        <div class="max-w-5xl mx-auto mb-6 bg-green-100 text-green-700 px-5 py-3 rounded-2xl shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="max-w-5xl mx-auto mb-6 bg-red-100 text-red-700 px-5 py-3 rounded-2xl shadow-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1">
            <div class="bg-white p-8 rounded-3xl shadow-2xl border border-gray-50">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Upload File</h2>

                <form action="/documentationfile" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div>
                        <label for="title" class="block text-gray-600 text-sm font-semibold mb-2 ml-1">Nama Dokumen/Gambar</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            class="w-full px-4 py-3 bg-gray-50 border border-transparent rounded-2xl focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none"
                            placeholder="Contoh: Bukti transfer tahap 1"
                            required
                        >
                    </div>

                    <div>
                        <label for="attachment" class="block text-gray-600 text-sm font-semibold mb-2 ml-1">Pilih File</label>
                        <input
                            type="file"
                            name="attachment"
                            id="attachment"
                            accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                            class="w-full px-4 py-3 bg-gray-50 border border-transparent rounded-2xl file:mr-4 file:rounded-xl file:border-0 file:bg-green-500 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-green-600 focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-100 transition-all outline-none"
                            required
                        >
                        <p class="text-xs text-gray-400 mt-2 ml-1">Gambar disimpan ke folder images. Dokumen disimpan ke folder document.</p>
                    </div>

                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-green-200 transition-all active:scale-95">
                        Simpan Dokumentasi
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100">
                <div class="flex items-center justify-between border-b-2 border-green-500 pb-3 mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">File Tersimpan</h2>
                    <span class="text-sm font-semibold text-green-600">{{ $files->count() }} file</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="p-3 font-semibold text-sm text-gray-700">Nama</th>
                                <th class="p-3 font-semibold text-sm text-gray-700">Tipe</th>
                                <th class="p-3 font-semibold text-sm text-gray-700">Folder</th>
                                <th class="p-3 font-semibold text-sm text-gray-700">Aksi & Preview</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $file)
                                @php
                                    $isImage = in_array(strtolower($file->file_type), ['jpg', 'jpeg', 'png']);
                                @endphp
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3 text-sm font-bold text-gray-800">{{ $file->title }}</td>
                                    <td class="p-3 text-sm text-gray-600 uppercase">{{ $file->file_type }}</td>
                                    <td class="p-3 text-sm text-green-600 font-medium">{{ $isImage ? 'images' : 'document' }}</td>
                                    <td class="p-3 flex items-center gap-2">
                                        @if($isImage)
                                            <img src="{{ asset('storage/' . $file->file_path) }}" alt="{{ $file->title }}" class="h-14 w-20 object-cover rounded-xl border border-gray-100">
                                        @else
                                            <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank" class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-xl text-sm font-semibold transition">
                                                Lihat File
                                            </a>
                                        @endif

                                        <form action="/documentationfile/{{ $file->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-50 hover:bg-red-500 text-red-500 hover:text-white p-2 rounded-xl transition duration-200" title="Hapus File">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center text-gray-500 italic">Belum ada dokumentasi yang diunggah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <div class="max-w-5xl mx-auto mt-12">
        <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    📂 <span>Preview Keseluruhan File & Gambar</span>
                </h2>
                <p class="text-sm text-gray-400 mt-1">Menampilkan preview visual langsung untuk gambar maupun dokumen dari database.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($files as $file)
                    @php
                        $fileType = strtolower($file->file_type);
                        $isImage = in_array($fileType, ['jpg', 'jpeg', 'png']);
                        $isPdf = $fileType === 'pdf';
                    @endphp

                    <div class="group bg-gray-50 border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                        
                        <div class="relative w-full aspect-[4/3] bg-gray-200 flex items-center justify-center overflow-hidden">
                            @if($isImage)
                                <img src="{{ asset('storage/' . $file->file_path) }}" 
                                     alt="{{ $file->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @elseif($isPdf)
                                <object data="{{ asset('storage/' . $file->file_path) }}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" class="w-full h-full object-cover">
                                    <div class="flex flex-col items-center justify-center text-red-500 p-4 text-center">
                                        <span class="text-4xl mb-1">📕</span>
                                        <span class="text-xs font-semibold">PDF Document</span>
                                    </div>
                                </object>
                            @else
                                <div class="flex flex-col items-center justify-center text-blue-600 p-4 text-center">
                                    <span class="text-5xl mb-2">📘</span>
                                    <span class="text-xs font-bold px-2 py-1 bg-blue-100 rounded-lg uppercase">{{ $fileType }}</span>
                                </div>
                            @endif

                            <span class="absolute top-3 right-3 bg-black/60 text-white text-[10px] font-bold px-2.5 py-1 rounded-full backdrop-blur-sm uppercase tracking-wider z-10">
                                {{ $file->file_type }}
                            </span>
                        </div>

                        <div class="p-4 bg-white border-t border-gray-100 flex-grow flex flex-col justify-between">
                            <div class="mb-4">
                                <h4 class="text-sm font-bold text-gray-800 line-clamp-1" title="{{ $file->title }}">{{ $file->title }}</h4>
                                <p class="text-xs text-gray-400 mt-1">Folder: 
                                    <span class="font-semibold {{ $isImage ? 'text-green-600' : 'text-blue-600' }}">
                                        {{ $isImage ? 'images' : 'document' }}
                                    </span>
                                </p>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <a href="{{ asset('storage/' . $file->file_path) }}" 
                                   target="_blank" 
                                   class="flex-1 text-center bg-gray-100 hover:bg-green-500 hover:text-white text-gray-700 font-semibold text-xs py-2.5 rounded-xl transition duration-200">
                                    🔍 Preview Penuh
                                </a>

                                <form action="/documentationfile/{{ $file->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus file ini?')" class="block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-50 hover:bg-red-500 text-red-500 hover:text-white font-semibold text-xs px-3 py-2.5 rounded-xl transition duration-200" title="Hapus File">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full py-12 flex flex-col items-center justify-center text-gray-400 border-2 border-dashed border-gray-200 rounded-3xl bg-gray-50">
                        <span class="text-4xl mb-2">📁</span>
                        <p class="text-sm font-medium">Belum ada file atau gambar yang tersimpan di database.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    </div>
@endsection