<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BeritaController extends Controller
{
    // Method untuk menampilkan semua berita
    public function index()
    {
        $beritas = Berita::all();
        return view('admin.berita.index', compact('beritas'));
    }

    // Method untuk menampilkan halaman detail berita
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.showDetail', compact('berita'));
    }


    // Method untuk menyimpan berita baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required',
        ]);

       
        $berita = new Berita;
        $berita->judul = $validatedData['judul'];
        $berita->deskripsi = $validatedData['deskripsi'];
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $name = time() . '.' . $gambar->getClientOriginalExtension();
            $destinationPath = public_path('public/berita');
            $gambar->move($destinationPath, $name);
            $berita->gambar = $name;
        }
        // dd($berita);
        $berita->save();


        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }


    // Method untuk menampilkan halaman edit berita
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    // Method untuk memperbarui berita
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required',
        ]);

        $berita->judul = $validatedData['judul'];
        $berita->deskripsi = $validatedData['deskripsi'];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            Storage::disk('public')->delete($berita->gambar);

            // Upload dan simpan gambar baru
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
            $berita->gambar = $gambarPath;
        }

        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }


    // Method untuk menghapus berita
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar terkait dari storage
        Storage::disk('public')->delete($berita->gambar);

        // Hapus berita dari database
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
