<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // UBAH BAGIAN INI SESUAI NAMA DI PHPMyAdmin KAMU
    protected $table = 'produk_detail';

    protected $primaryKey = 'id_produk';
    public $timestamps = false;
    protected $fillable = ['id_kategori', 'nama_produk', 'foto_produk', 'harga_produk', 'deskripsi_produk'];
}
