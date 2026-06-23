<?php

namespace App\Http\Controllers;

use App\Models\documentaionfile as DocumentaionFile;
use Illuminate\Http\Request;
// Tambahkan facade Storage di bawah ini untuk menghapus file fisik
use Illuminate\Support\Facades\Storage; 

class DocumentationFile extends Controller
{
    public function index()
    {
        $files = DocumentaionFile::latest()->get();

        return view('documentaionfile', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'attachment' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5128',
        ]);

        $file = $request->file('attachment');
        $extension = strtolower($file->getClientOriginalExtension());
        $folder = in_array($extension, ['jpg', 'jpeg', 'png']) ? 'images' : 'document';
        $path = $file->store($folder, 'public');

        DocumentaionFile::create([
            'title' => $request->title,
            'file_path' => $path,
            'file_type' => $extension,
        ]);

        return redirect()->back()->with('success', 'File berhasil diunggah.');
    }

    // ==================== TAMBAHKAN FUNGSI DESTROY INI ====================
    public function destroy($id)
    {
        // 1. Cari data di database berdasarkan ID
        $file = DocumentaionFile::findOrFail($id);

        // 2. Cek dan hapus file fisik dari folder storage/public
        if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        // 3. Hapus baris data dari database
        $file->delete();

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'File dan dokumentasi berhasil dihapus.');
    }
}