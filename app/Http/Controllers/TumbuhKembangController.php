<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\TumbuhKembang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TumbuhKembangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tumbuh = TumbuhKembang::all();
        return view('dashboard.tumbuh.index',compact('tumbuh'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hewan = Hewan::where('id_profile',Auth::user()->profile->id)->get();
        return view('dashboard.tumbuh.form',compact('hewan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_hewan' => 'required',
            'umur' => 'required',
            'berat_badan' => 'required',
            'tinggi' => 'required',
            'jumlah_gigi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
        ]);
        try{
            $gambar = $request->file('gambar');
            if($gambar){
                $gambar->storeAs('public/tumbuh',$gambar->hashName());
                $path = 'storage/tumbuh/'.$gambar->hashName();
                $nogambar = $request->except('gambar');
                $withgambar = array_merge($nogambar,['gambar' => $path, 'status' => 'diproses']);
            }else{
                $request->merge(['status' => 'diproses']);
                $withgambar = $request->all(); 
            }
            TumbuhKembang::create($withgambar);
            return redirect()->route('tumbuh.index')->with('success','Data berhasil ditambahkan');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('tumbuh.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tumbuh = TumbuhKembang::find($id);
        $hewan = Hewan::where('id_profile',Auth::user()->profile->id)->get();
        return view('dashboard.tumbuh.edit',compact('tumbuh','hewan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_hewan' => 'required',
            'umur' => 'required',
            'berat_badan' => 'required',
            'tinggi' => 'required',
            'jumlah_gigi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'required',
        ]);
        $tumbuh = TumbuhKembang::find($id);

        try{
            $gambar = $request->file('gambar');
            if($gambar){
                $gambar->storeAs('public/tumbuh',$gambar->hashName());
                $path = 'storage/tumbuh/'.$gambar->hashName();
                $nogambar = $request->except('gambar');
                $withgambar = array_merge($nogambar,['gambar' => $path,'status' => 'diproses']);
            }else{
                $request->merge(['gambar' => $tumbuh->gambar, 'status' => 'diproses']);
                $withgambar = $request->all();
            }
            $tumbuh->update($withgambar);
            return redirect()->route('tumbuh.index')->with('success','Data berhasil diubah');
        }catch(\Exception $e){
            return redirect()->route('tumbuh.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tumbuh = TumbuhKembang::find($id);
        $tumbuh->delete();
        return redirect()->route('tumbuh.index')->with('success','Data berhasil dihapus');
    }
}
