@extends('app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Daftar Campaign</h1>

<a href="/campaign/create" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition shadow">
    Tambah Campaign
</a>

<table class="table-auto w-full mt-4 bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-2 text-left">Judul</th>
            <th class="text-left">Target</th>
            <th class="text-left">Terkumpul</th>
            <th class="text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($campaigns as $c)
        <tr class="border-t hover:bg-gray-50">
            <td class="p-2">{{ $c->title }}</td>
            <td>{{ number_format($c->target_donation) }}</td>
            <td>{{ number_format($c->collected_donation) }}</td>
            <td class="p-2 flex space-x-2">
                <!-- Tombol Edit Warna Kuning -->
                <a href="/campaign/{{ $c->id }}/edit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm transition shadow-sm">
                    Edit
                </a>

                <!-- Tombol Hapus dengan Konfirmasi -->
                <form action="/campaign/{{ $c->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus campaign ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition shadow-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection