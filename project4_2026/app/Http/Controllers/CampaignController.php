<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    // Menampilkan daftar semua campaign
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaign.index', compact('campaigns'));
    }

    // Menampilkan form untuk membuat campaign baru
    public function create()
    {
        return view('campaign.create');
    }

    // Menyimpan data campaign baru ke database
    public function store(Request $request)
    {
        Campaign::create($request->all());
        return redirect('/campaign')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit untuk campaign tertentu
    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaign.edit', compact('campaign'));
    }

    // Memperbarui data campaign di database
    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);
        
        // Melakukan update data berdasarkan input form
        $campaign->update($request->all());

        return redirect('/campaign')->with('success', 'Campaign berhasil diperbarui!');
    }

    // Menghapus data campaign dari database
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();

        return redirect('/campaign')->with('success', 'Campaign berhasil dihapus!');
    }
}
