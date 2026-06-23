<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documentaionfile extends Model
{
    protected $table = 'documentaion_files_tabel';
    protected $fillable = ['title', 'file_path', 'file_type'];
}
