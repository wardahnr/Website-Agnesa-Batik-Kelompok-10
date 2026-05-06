<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    // WAJIB ADA: Daftarkan kolom yang boleh diisi
   protected $fillable = ['nama_kategori', 'foto_kategori', 'deskripsi'];
}
