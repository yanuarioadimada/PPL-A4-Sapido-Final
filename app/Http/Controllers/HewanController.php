<?php

namespace App\Http\Controllers;

use App\Http\Requests\HewanRequest;
use App\Models\Hewan;
use App\Models\Profile;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HewanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hewan = Hewan::all();
        return view('dashboard.hewan.index',compact('hewan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hewan = Hewan::all();
        $kelompok = Profile::all();
        return view('dashboard.hewan.form',compact('hewan','kelompok'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HewanRequest $request)
    {
        
        try{
            $gambar = $request->file('gambar');
            if($gambar){
                $gambar->storeAs('public/hewan',$gambar->hashName());
                $path = 'storage/hewan/'.$gambar->hashName();
                $nogambar = $request->except('gambar');
                $withgambar = array_merge($nogambar,['gambar' => $path]);
                
            }else{
                $withgambar = $request->all();
            }
            Hewan::create($withgambar);

            return redirect()->route('hewan.index')->with('success','Data berhasil ditambahkan');
        }catch(\Exception $e){
            return redirect()->route('hewan.index')->with('error',$e->getMessage());
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
        $hewans = Hewan::all();
        $kelompok = Profile::all();
        $hewan = Hewan::find($id);
        return view('dashboard.hewan.edit',compact('hewan','hewans','kelompok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'jenis_kelamin' => 'required|in:jantan,betina',
            'keterangan' => 'required',
            'jenis_hewan' => 'required|in:sapi,kambing',
            'nomor_hewan' => 'required|unique:hewan,nomor_hewan,'.$id,
            'gambar' => 'nullable|image',
            'id_induk' => 'nullable|exists:hewan,id',
            'id_profile' => 'required|exists:profile,id',
        ]);


        $hewan = Hewan::find($id);
        try{
            $gambar = $request->file('gambar');
            if($gambar){
                $gambar->storeAs('public/hewan',$gambar->hashName());
                $path = 'storage/hewan/'.$gambar->hashName();
                $nogambar = $request->except('gambar');
                $withgambar = array_merge($nogambar,['gambar' => $path]);
                
            }else{
                $request->merge(['gambar' => $hewan->gambar]);
                $withgambar = $request->all();
            }
            $hewan->update($withgambar);
            return redirect()->route('hewan.index')->with('success','Data berhasil diubah');
        }catch(\Exception $e){
            return redirect()->route('hewan.index')->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hewan = Hewan::find($id);
        try{
            $hewan->delete();
        return redirect()->route('hewan.index')->with('success','Data berhasil dihapus');
        }catch(\Exception $e){
            return redirect()->route('hewan.index')->with('error',$e->getMessage());
        }
        
    }
}
