<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Konten;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:kategori',
        ]);

        Kategori::create([
            'name' => $request->name,
        ]);

        return redirect()->route('kategori.index.admin')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'name' => 'required|unique:kategori,name,' . $kategori->id,
        ]);

        $kategori->update([
            'name' => $request->name,
        ]);

        return redirect()->route('kategori.index.admin')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index.admin')->with('success', 'Kategori berhasil dihapus.');
    }
    public function indexWisatawan()
    {
        $kategori = Kategori::all();
        $konten = Konten::all();
        return view('konten', compact('kategori', 'konten'));
    }
    
    public function indexDetail($id)
    {
        $kategoris = Kategori::all();
        $kategori = Kategori::findOrFail($id);
        $konten = Konten::findOrFail($id);
        return view('kontenDetail', compact('kategoris', 'konten', 'kategori'));
    }
}
