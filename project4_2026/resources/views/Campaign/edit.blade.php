@extends('app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Edit Campaign</h1>

    <form action="/campaign/{{ $campaign->id }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Judul Campaign</label>
            <input type="text" name="title" value="{{ $campaign->title }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">{{ $campaign->description }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Target Donasi</label>
                <input type="number" name="target_donation" value="{{ $campaign->target_donation }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Dana Terkumpul</label>
                <input type="number" name="collected_donation" value="{{ $campaign->collected_donation }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Deadline</label>
            <input type="date" name="deadline" value="{{ $campaign->deadline }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex items-center justify-end space-x-3 pt-4">
            <a href="/campaign" class="text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200 shadow-md">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection