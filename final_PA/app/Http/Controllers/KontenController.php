<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Konten;
use Illuminate\Http\Request;

class KontenController extends Controller
{
    public function create()
    {
        $kategori = Kategori::all();
        $konten = Konten::all();
        return view('admin.kontenKategori.index', compact('kategori', 'konten'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,gif|max:2048',
            'detail' => 'required',
        ]);

        $konten = new Konten;
        $konten->name = $validatedData['name'];
        $konten->kategori_id = $validatedData['kategori_id'];
        $konten->detail = $validatedData['detail'];
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $name = time() . '.' . $gambar->getClientOriginalExtension();
            $destinationPath = public_path('public/konten');
            $gambar->move($destinationPath, $name);
            $konten->gambar = $name;
        }
    
        $konten->save();
    
        return redirect()->route('konten.create')->with('success', 'Konten berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        $kategoris = Kategori::all();
        $konten = Konten::findOrFail($id);
        return view('admin.kontenKategori.edit', compact('kategoris', 'konten'));
    }
    

    public function update(Request $request, Konten $konten)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,gif|max:2048',
            'detail' => 'required',
        ]);

        $konten->name = $validatedData['name'];
        $konten->kategori_id = $validatedData['kategori_id'];
        $konten->detail = $validatedData['detail'];
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $name = time() . '.' . $gambar->getClientOriginalExtension();
            $destinationPath = public_path('public/konten');
            $gambar->move($destinationPath, $name);
            $konten->gambar = $name;
        }
    
        $konten->save();

        return redirect()->route('konten.create')->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy(Konten $konten)
    {
        $konten->delete();
        return redirect()->route('konten.create')->with('success', 'Konten berhasil dihapus.');
    }
    public function indexDetail($id)
    {
        $kategoris = Kategori::all();
        $kategori = Kategori::findOrFail($id);
        $konten = Konten::findOrFail($id);
        return view('admin.kontenKategori.detail', compact('kategoris', 'konten', 'kategori'));
    }

}
