<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index(){
        $dokter = Dokter::all();
        return view('dashboard.dokter.admin.index',compact('dokter'));
    }

    public function create(){
        return view('dashboard.dokter.admin.form');
    }

    public function store(Request $request){

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            
        ]);
        try{
            $foto_profil = $request->file('foto_profil');
            if($foto_profil){
                $foto_profil->storeAs('public/dokter',$foto_profil->hashName());
                $path = 'storage/dokter/'.$foto_profil->hashName();
                $no_foto_profil = $request->except('foto_profil');
                $with_foto_profil = array_merge($no_foto_profil,['foto_profil' => $path]);
            }else{
                $with_foto_profil = $request->all(); 
            }
            Dokter::create($with_foto_profil);
            return redirect()->route('dokter.index')->with('success','Data berhasil ditambahkan');
        }catch(\Exception $e){
            return redirect()->route('dokter.index')->with('error',$e->getMessage());
        }
    }

    public function edit($id){
        $dokter = Dokter::find($id);
        // dd($dokter);
        return view('dashboard.dokter.admin.edit',compact('dokter'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);
        try{
            $dokter = Dokter::find($id);
            $foto_profil = $request->file('foto_profil');
            if($foto_profil){
                $foto_profil->storeAs('public/dokter',$foto_profil->hashName());
                $path = 'storage/dokter/'.$foto_profil->hashName();
                $no_foto_profil = $request->except('foto_profil');
                $with_foto_profil = array_merge($no_foto_profil,['foto_profil' => $path]);
            }else{
                $with_foto_profil = $request->all(); 
            }
            $dokter->update($with_foto_profil);
            return redirect()->route('dokter.index')->with('success','Data berhasil diupdate');
        }catch(\Exception $e){
            return redirect()->route('dokter.index')->with('error',$e->getMessage());
        }
    }

    public function destroy($id){
        try{
            $dokter = Dokter::find($id);
            $dokter->delete();
            return redirect()->route('dokter.index')->with('success','Data berhasil dihapus');
        }catch(\Exception $e){
            return redirect()->route('dokter.index')->with('error',$e->getMessage());
        }
    }
}
