@extends('app')

@section('title', 'Riwayat Donasi')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg">
    <h2 class="text-2xl font-bold border-b-2 border-green-500 pb-2 mb-6">Daftar Riwayat Donasi</h2>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3 font-semibold text-sm text-gray-700">No</th>
                    <th class="p-3 font-semibold text-sm text-gray-700">Nama Donatur</th>
                    <th class="p-3 font-semibold text-sm text-gray-700">Target Campaign</th>
                    <th class="p-3 font-semibold text-sm text-gray-700">Jumlah Donasi</th>
                    <th class="p-3 font-semibold text-sm text-gray-700">Pesan</th>
                    <th class="p-3 font-semibold text-sm text-gray-700">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($donations as $index => $donation)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 text-sm text-gray-600">{{ $index + 1 }}</td>
                        <td class="p-3 text-sm font-bold text-gray-800">{{ $donation->donor_name }}</td>
                        <td class="p-3 text-sm text-green-600 font-medium">{{ $donation->campaign->title }}</td>
                        <td class="p-3 text-sm text-gray-700 font-semibold">Rp {{ number_format($donation->amount, 0, ',', '.') }}</td>
                        <td class="p-3 text-sm text-gray-500 italic">{{ $donation->message ?? '-' }}</td>
                        <td class="p-3 text-sm text-gray-400">{{ $donation->created_at?->format('d M Y H:i') ?? '-' }} WIB</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500 italic">Belum ada transaksi donasi yang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection