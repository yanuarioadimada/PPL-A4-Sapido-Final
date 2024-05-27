<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalKonsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index(){
        $profile_id = Auth::user()->profile->id;
        $data = JadwalKonsultasi::where('id_profile', $profile_id)->get();
        return view('dashboard.dokter.index', compact('data'));
    }

    public function create(){
        $profil_id = Auth::user()->profile->id;
        $konsultasi = JadwalKonsultasi::where('id_profile', $profil_id)->where('status','diproses')->get();
        // dd($konsultasi);
        $dokter = Dokter::all();
        if($konsultasi->isNotEmpty()){
            return redirect()->back()->with('error', 'Maaf, Anda masih memiliki konsultasi yang sedang diproses. Silahkan tunggu hingga selesai.');
        }
        return view('dashboard.dokter.proses', compact('dokter'));
    }

    public function store(Request $request){
        $dokter_jadwal = JadwalKonsultasi::where('tanggal_konsultasi', $request->tanggal_konsultasi)->pluck('id_dokter');
            if($dokter_jadwal->isNotEmpty()){
                dd($dokter_jadwal);
                $dokter = Dokter::where('id', $dokter_jadwal)->pluck('id');
                // dd($dokter);
                if($dokter->contains($request->dokter)){
                    return redirect()->back()->with('error', 'Maaf, Tidak ada dokter yang tersedia pada tanggal tersebut. Silahkan pilih tanggal lain.');
                }
        }
        
            
            
            JadwalKonsultasi::create([
                'id_profile' => Auth::user()->profile->id,
                'id_dokter' => $request->dokter,
                'tanggal_konsultasi' => $request->tanggal_konsultasi,
                'waktu_konsultasi' => $request->waktu_konsultasi,
                'keterangan' => $request->keterangan,
                'status' => 'pending'
            ]);
            return redirect()->route('konsultasi.index');
        

    }

    public function edit($id){
        $data = JadwalKonsultasi::find($id);
        $dokter = Dokter::all();
        return view('dashboard.dokter.edit', compact('data','dokter'));
    }

    public function update(Request $request, $id){
        $data = JadwalKonsultasi::find($id);
        $data->update([
            'id_dokter' => $request->dokter,
            'tanggal_konsultasi' => $request->tanggal_konsultasi,
            'waktu_konsultasi' => $request->waktu_konsultasi,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);
        return redirect()->route('konsultasi.index');
    }

    public function destroy($id){
        $data = JadwalKonsultasi::find($id);
        $data->delete();
        return redirect()->route('konsultasi.index');
    }



    

}
