<?php

namespace App\Http\Controllers;

use App\Models\BimtekModel;
use App\Models\PesertaBimtek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimtekController extends Controller
{
    public function index()
    {
        $bimtek = BimtekModel::all();
        return view('dashboard.bimtek.admin.konten.table', compact('bimtek'));
    }

    public function regis($id){
        return view('dashboard.bimtek.form',compact('id'));
    }

    public function create()
    {
        return view('dashboard.bimtek.admin.konten.form');
    }

    public function store(Request $request)
    {
        try {
            $gambar = $request->file('gambar');
            if ($gambar) {
                $gambar->storeAs('public/bimtek', $gambar->hashName());
                $path = 'storage/bimtek/' . $gambar->hashName();
                $nogambar = $request->except('gambar');
                $withgambar = array_merge($nogambar, ['gambar' => $path, 'status' => 'aktif', 'id_admin' => Auth::id()]);
            } else {
                $withgambar = $request->all();
                $withgambar['status'] = 'aktif';
                $withgambar['id_admin'] = Auth::id();
            }
            BimtekModel::create($withgambar);

            return redirect()->route('admin.bimtek.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.bimtek.index')->with('error', $e->getMessage());
        }
    }

    public function konten(){
        $bimtek = BimtekModel::where('status', 'aktif')->get();
        return view('dashboard.bimtek.index', compact('bimtek'));
    }

    public function updateStatus(Request $request,$id){
        $bimtek = BimtekModel::find($id);
        
        $bimtek->status = $request->status;
        $bimtek->save();
        
    }

    public function daftar(Request $request){
        try{
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required'
            ]);
            PesertaBimtek::create($request->all());
            return redirect()->route('bimtek.konten')->with('success','Data berhasil ditambahkan');
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }

    public function peserta(){
        $peserta = PesertaBimtek::all();
        return view('dashboard.bimtek.admin.peserta.table', compact('peserta'));
    }

    public function show($id){
        $bimtek = BimtekModel::where('id', $id)->get();
        return view('dashboard.bimtek.index', compact('bimtek'));
    }

    public function edit($id){
        $bimtek = BimtekModel::find($id);
        return view('dashboard.bimtek.admin.konten.edit', compact('bimtek'));
    }

    public function update(Request $request, $id){
        try {
            $bimtek = BimtekModel::find($id);
            $gambar = $request->file('gambar');
            $nogambar = $request->except('gambar');
            if ($gambar) {
                $gambar->storeAs('public/bimtek', $gambar->hashName());
                $path = 'storage/bimtek/' . $gambar->hashName();
                $withgambar = array_merge($nogambar, ['gambar' => $path]);
            } else {

                $withgambar = array_merge($nogambar, ['gambar' => $bimtek->gambar]);
            }
            
            $bimtek->update($withgambar);

            return redirect()->route('admin.bimtek.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.bimtek.index')->with('error', $e->getMessage());
        }
    }
    
}
