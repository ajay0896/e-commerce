<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(kategori $kategori)
    {
        $produk = produk::all();
        $kategori = kategori::all();
        return view('produk.index', compact('produk', 'kategori'));
    }



    public function post(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required|file|image',
        ]);

        produk::create([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'harga' => $request->harga,
            'foto' => $request->foto->store('iamges'),
        ]);

        return redirect()->route('admin.produk');
    }

    public function tampiledit(produk $produk)
    {
        $kategori = kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, produk $produk)
    {
        $data = $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required|file|image',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('iamge');
        } else {
            unset($data['foto']);
        }
        $produk->update($data);

        return redirect()->route('admin.produk');
    }

    public function delete(produk $produk)
    {
        $produk->delete();
        return back()->with('status'.'Berhasil Hapus Produk');
    }
}
