<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignSeeder extends Seeder
{
    
    public function run(): void
    {
        Campaign::create([
            'title' => 'Bantu Korban Banjir',
            'description' => 'Donasi untuk korban',
            'target_donation' => 1000000,
            'collected_donation' => 250000,
            'deadline' => '2026-12-31'
        ]);

         Campaign::create([
            'title' => 'Bantu Korban Banjir',
            'description' => 'Donasi untuk korban',
            'target_donation' => 1000000,
            'collected_donation' => 250000,
            'deadline' => '2026-12-31'
        ]);
    
        
    
    }
}