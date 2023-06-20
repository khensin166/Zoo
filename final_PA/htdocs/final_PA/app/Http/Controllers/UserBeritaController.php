<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class UserBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return(1);
        $beritas = Berita::all();
        return view('wisatawan.berita.index', compact('beritas'));
    }

    public function show( $id)
    {
        $berita = Berita::findOrFail($id);
        return view('wisatawan.berita.showDetail', compact('berita'));
    }
}
