<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;

// Rute Halaman Utama & Statis
Route::get('/', [HomeController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);

// Rute Resource Campaign
Route::resource('campaign', CampaignController::class);

// ─── PERBAIKAN RUTE DONATION (URUTAN SANGAT PENTING) ───
// 1. Rute custom dengan ID ditaruh paling atas
Route::get('/donation/create/{campaign_id?}', [DonationController::class, 'create']);

// 2. Rute resource bawaan dimatikan fungsi 'create'-nya agar tidak bentrok
Route::resource('donation', DonationController::class)->except(['create']);