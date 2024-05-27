<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\KelahiranKematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelahiranKematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KelahiranKematian::all();
        return view('dashboard.kelahiran_kematian.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hewan = Hewan::where('id_profile',Auth::user()->profile->id)->get();
        return view('dashboard.kelahiran_kematian.form',compact('hewan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_hewan' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try{
            $gambar = $request->file('gambar');
            if($gambar){
                $gambar->storeAs('public/kelahiran_kematian',$gambar->hashName());
                $path = 'storage/kelahiran_kematian/'.$gambar->hashName();
                $nogambar = $request->except('gambar');
                $withgambar = array_merge($nogambar,['gambar' => $path, 'status' => 'diproses']);
            }else{
                $request->merge(['status' => 'diproses']);
                $withgambar = $request->all(); 
            }
            KelahiranKematian::create($withgambar);
            return redirect()->route('kelahiran-kematian.index')->with('success','Data berhasil ditambahkan');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('kelahiran-kematian.index')->with('error',$e->getMessage());
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
        $data = KelahiranKematian::find($id);
        $hewan = Hewan::where('id_profile',Auth::user()->profile->id)->get();
        return view('dashboard.kelahiran_kematian.edit',compact('data','hewan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_hewan' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try{
            $data = KelahiranKematian::find($id);
            $gambar = $request->file('gambar');
            if($gambar){
                $gambar->storeAs('public/kelahiran_kematian',$gambar->hashName());
                $path = 'storage/kelahiran_kematian/'.$gambar->hashName();
                $nogambar = $request->except('gambar');
                $withgambar = array_merge($nogambar,['gambar' => $path]);
            }else{
                $request->merge(['gambar' => $data->gambar, 'status' => 'diproses']);
                $withgambar = $request->all();
            }
            $data->update($withgambar);
            return redirect()->route('kelahiran-kematian.index')->with('success','Data berhasil diubah');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->route('kelahiran-kematian.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
