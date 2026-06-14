<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    // 1. Menampilkan Semua Riwayat Donasi
    public function index()
    {
        $donations = Donation::with('campaign')->latest()->get();
        return view('donation.index', compact('donations'));
    }

    // 2. Menampilkan Form Donasi (Mendukung Dropdown & Klik Tombol Sekaligus)
    public function create($campaign_id = null)
    {
        // Ambil semua data campaign untuk diisi ke dropdown select di blade (Perintah Asli Modul)
        $campaigns = Campaign::all();
        
        // Simpan ID campaign yang diklik dari halaman depan (jika ada)
        $selected_campaign_id = $campaign_id;
        
        // Kirim keduanya ke view form donasi
        return view('campaign.createdonate', compact('campaigns', 'selected_campaign_id'));
    }

    // 3. Menyimpan Transaksi Donasi & Otomatis Update Saldo Campaign (Sesuai Tugas Modul)
    public function store(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'donor_name'  => 'required|string|max:255',
            'amount'      => 'required|numeric|min:1',
            'message'     => 'nullable|string',
        ]);

        // Simpan data donasi baru
        Donation::create([
            'campaign_id' => $request->campaign_id,
            'donor_name'  => $request->donor_name,
            'amount'      => $request->amount,
            'message'     => $request->message,
        ]);

        // PERINTAH TUGAS: Otomatis tambahkan nominal donasi ke kolom collected_donation di tabel campaign
        $campaign = Campaign::findOrFail($request->campaign_id);
        $campaign->increment('collected_donation', $request->amount);

        return redirect('/campaign')->with('success', 'Donasi berhasil dikirim, saldo campaign otomatis diperbarui!');
    }
}