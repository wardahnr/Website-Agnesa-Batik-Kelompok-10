<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // Ini agar kolomnya bisa diisi lewat form
    protected $fillable = ['nama_platform', 'url'];
}
