<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaranController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $saran = Saran::all();
        return view('wisatawan.saran.index', compact('saran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $user = Auth::user();

        $imagePath = $request->file('image')->store('saran', 'public');

        $Saran = Saran::create([
            'user_id' => $user->id,
            'isi' => $request->input('isi'),
            'image' => $imagePath,
        ]);

        return redirect()->route('saran.create', $Saran->id)->with('success', 'Saran berhasil di tambahkan');
    }


    public function index()
    {
        $saran = Saran::all();
        return view('admin.saran.index', compact('saran'));
    }

    public function adminDestroy(Saran $Saran)
    {
        $Saran->delete();
        return redirect()->route('admin.saran.index')->with('success', 'Saran deleted successfully!');
    }

    public function showWisatawan( $id)
    {
        $saran =Saran::findOrFail($id);
        return view('wisatawan.saran.detailSaran', compact('saran'));
    }

    public function showAdmin( $id)
    {
        $saran =Saran::findOrFail($id);
        return view('admin.saran.detailSaran', compact('saran'));
    }
    
}