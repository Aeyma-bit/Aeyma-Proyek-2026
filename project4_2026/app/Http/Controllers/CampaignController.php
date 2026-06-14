<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('account', 'categories', 'donations')->get();
        return view('campaign.index', compact('campaigns'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('campaign.create', compact('categories'));
    }

    // ─── PERBAIKAN PADA FUNGSI STORE (TAMBAH DATA) ───
    public function store(Request $request)
    {
        // 1. Validasi input form wajib diisi agar tidak memicu error 'cannot be null' di database
        $request->validate([
            'title'            => 'required|string|max:255',
            'target_donation'  => 'required|numeric|min:1',
            'bank_name'        => 'required|string|max:100',
            'account_number'   => 'required|string|max:50',
            'account_holder'   => 'required|string|max:255',
            'categories'       => 'nullable|array',
        ]);

        // 2. Simpan data Campaign utama menggunakan data yang tervalidasi
        $campaign = Campaign::create([
            'title'              => $request->title,
            'target_donation'    => $request->target_donation,
            'collected_donation' => 0, // Set nilai awal donasi terkumpul ke 0
        ]);

        // 3. Simpan data akun bank relasi One-to-One
        $campaign->account()->create([
            'bank_name'      => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder' => $request->account_holder,
        ]);

        // 4. Hubungkan data kategori relasi Many-to-Many jika dipilih
        if ($request->categories) {
            $campaign->categories()->attach($request->categories);
        }

        return redirect('/campaign')->with('success', 'Data campaign berhasil ditambahkan');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect('/campaign')->with('success', 'Kampanye berhasil dihapus');
    }

    public function edit(Campaign $campaign)
    {
        $categories = Category::all();
        $campaign->load('account', 'categories');
        return view('campaign.edit', compact('campaign', 'categories'));
    }

    // ─── TAMBAHAN VALIDASI PADA FUNGSI UPDATE (UBAH DATA) ───
    public function update(Request $request, Campaign $campaign)
    {
        // Validasi juga saat melakukan update data agar tetap aman
        $request->validate([
            'title'            => 'required|string|max:255',
            'target_donation'  => 'required|numeric|min:1',
            'bank_name'        => 'required|string|max:100',
            'account_number'   => 'required|string|max:50',
            'account_holder'   => 'required|string|max:255',
            'categories'       => 'nullable|array',
        ]);

        // Update data campaign utama
        $campaign->update([
            'title'           => $request->title,
            'target_donation' => $request->target_donation,
        ]);

        // Update relasi One-to-One (rekening bank)
        $campaign->account()->update([
            'bank_name'      => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder' => $request->account_holder,
        ]);

        // Update relasi Many-to-Many (kategori) menggunakan sync
        if ($request->categories) {
            $campaign->categories()->sync($request->categories);
        } else {
            $campaign->categories()->sync([]);
        }

        return redirect('/campaign')->with('success', 'Kampanye berhasil diperbarui');
    }
}