<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function sejarah() {
        return view('user.sejarah');
    }

    public function produk()
    {
        $kategori = DB::table('kategori')->get();
        return view('user.produk', compact('kategori'));
    }

    public function koleksi($id)
    {
        $kategori_nama = DB::table('kategori')->where('id_kategori', $id)->first();
        $produk = DB::table('produk_detail')->where('id_kategori', $id)->get();

        return view('user.koleksi', compact('produk', 'kategori_nama'));
    }

    public function kontak()
    {
        $links = DB::table('links')->get();

        return view('user.kontak', compact('links'));
    }
}
