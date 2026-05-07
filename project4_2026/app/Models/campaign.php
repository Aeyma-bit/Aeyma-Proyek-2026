<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campaign extends Model
{
    protected $filltable = [
        'title',
        'description',
        'collected_donation',
        'deadline'
    ];
}
