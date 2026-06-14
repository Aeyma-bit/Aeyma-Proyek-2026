<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignAccount extends Model
{
    protected $fillable = [
        'campaign_id',
        'bank_name',
        'account_number',
        'account_holder'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}