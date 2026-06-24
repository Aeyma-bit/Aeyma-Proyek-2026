<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DocumentationFile;
use App\Http\Controllers\FeedController;

// Rute Halaman Utama & Statis
Route::get('/', [HomeController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);

// Rute Resource Campaign
Route::resource('campaign', CampaignController::class)->except(['show']);
// 1. Rute custom dengan ID ditaruh paling atas
Route::get('/donation/create/{campaign_id?}', [DonationController::class, 'create']);
// 2. Rute resource hanya memakai method yang tersedia di DonationController
Route::resource('donation', DonationController::class)->only(['index', 'store']);
Route::get('documentationfile', [DocumentationFile::class, 'index']);
Route::post('documentationfile', [DocumentationFile::class, 'store']);
Route::delete('/documentationfile/{id}', [DocumentationFile::class, 'destroy'])->name('documentation.destroy');
Route::get('/feeds', [FeedController::class, 'index']);