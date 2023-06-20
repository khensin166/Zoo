<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allMobil = Mobil::all();

        return view('welcome', ['allMobil' => $allMobil]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahMobil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=> 'required|max:255',
            'deskripsi' => 'required',
            'gambar'=> 'required|image|mimes:jpeg,png,jpg|max:5000',
            'stok'=> 'required|integer|min:0',
            'harga'=> 'required|integer|min:0',
        ]);
    

        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/gambar';

        $file->move($tujuanFile, $namaFile);

        $newMobil = new Mobil;
        $newMobil->name = $request->nama;
        $newMobil->deskripsi = $request->deskripsi;
        $newMobil->gambar = $namaFile;
        $newMobil->stok = $request->stok;
        $newMobil->harga = $request->harga;

        $newMobil->save();

        return redirect("/")->with('status', 'Mobil berhasil di tambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobil $mobil)
    {
        return view('editMobil', ['mobil' => $mobil]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
        ]);

        $mobil->name = $request->nama;
        $mobil->deskripsi = $request->deskripsi;
        $mobil->stok = $request->stok;
        $mobil->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';
            $file->move($tujuanFile, $namaFile);

            $mobil->gambar = $namaFile;
        }

        $mobil->save();

        return redirect("/")-> with('status', 'Mobil dengan Id ' .$mobil->id. ' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($mobilId)
    {
        Mobil::where('id', $mobilId)->delete();

        return redirect("/")-> with('status', 'Mobil dengan id: ' .$mobilId. "berhasil dihapus");
    }
}
