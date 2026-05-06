<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Link;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }


   public function produk()
    {
        $kategori = Kategori::all();
        return view('admin.produk_list', compact('kategori'));
    }

    public function store_produk(Request $request)
    {
        $nama_file = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('assets'), $nama_file);

        Kategori::create([
            'nama_kategori' => $request->nama,
            'foto_kategori' => $nama_file,
        ]);

        return back()->with('success', 'Koleksi berhasil ditambah!');
    }

    public function hapus_produk($id)
    {
        $data = Kategori::find($id);

        if($data) {
            $data->delete();
            return back()->with('success', 'Koleksi berhasil dihapus!');
        }

        return back()->with('error', 'Data tidak ditemukan!');
    }

    public function update_produk(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama;
        $kategori->deskripsi = $request->deskripsi;

        if (!$kategori) {
            return back()->with('error', 'Data tidak ditemukan!');
        }

        // Update Nama
        $kategori->nama_kategori = $request->nama;

        // Update Foto
        if ($request->hasFile('foto')) {
            $nama_file = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('assets'), $nama_file);
            $kategori->foto_kategori = $nama_file;
        }

        $kategori->save();

        return back()->with('success', 'Koleksi berhasil diperbarui!');
    }

    public function detail_koleksi($id)
    {
        $koleksi = Kategori::find($id);

        $produk = Produk::where('id_kategori', $id)->get();

        return view('admin.produk_detail', compact('koleksi', 'produk'));
    }

    public function store_produk_detail(Request $request)
    {
        $nama_file = time().'.'.$request->foto_produk->extension();
        $request->foto_produk->move(public_path('assets'), $nama_file);

        // Simpan ke Database
        Produk::create([
            'id_kategori'      => $request->id_kategori,
            'nama_produk'      => $request->nama_produk,
            'harga_produk'     => $request->harga,
            'foto_produk'      => $nama_file,
            'deskripsi_produk' => $request->deskripsi,
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update_produk_detail(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga;
        $produk->deskripsi_produk = $request->deskripsi;

        if ($request->hasFile('foto_produk')) {
            $nama_file = time().'.'.$request->foto_produk->extension();
            $request->foto_produk->move(public_path('assets'), $nama_file);
            $produk->foto_produk = $nama_file;
        }

        $produk->save();

        return back()->with('success', 'Data produk berhasil diperbarui!');
    }
// Hapus Produk
    public function hapus_produk_detail($id)
    {
        Produk::destroy($id);
        return back()->with('success', 'Produk berhasil dihapus!');
    }

    public function kontak()
    {
        $links = Link::all();

        return view('admin.kontak', compact('links'));
    }

    public function store_link(Request $request)
    {
        Link::create([
            'nama_platform' => $request->nama_platform,
            'url'           => $request->url
        ]);
        return back()->with('success', 'Link berhasil ditambahkan!');
    }

    public function update_link(Request $request, $id)
    {
        $link = Link::find($id);
        $link->update([
            'nama_platform' => $request->nama_platform,
            'url'           => $request->url
        ]);
        return back()->with('success', 'Link berhasil diupdate!');
    }

    // Hapus Link
    public function hapus_link($id)
    {
        $data = Link::find($id);

        if ($data) {
            $data->delete();
            return back()->with('success', 'Link berhasil dihapus!');
        }

        return back()->with('error', 'Data tidak ditemukan!');
    }
}



