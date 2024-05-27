<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalKonsultasi;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function proses(){

        $data = JadwalKonsultasi::where('status', 'diproses')->get();
        return view('dashboard.dokter.admin.proses', compact('data'));
    }

    public function riwayat(){

        $data = JadwalKonsultasi::where('status','!=' ,'diproses')->get();
        return view('dashboard.dokter.admin.riwayat', compact('data'));
    }

    public function update(Request $request, $id){
        
        try{
            $data = JadwalKonsultasi::find($id);
            $data->status = $request->status;
            $data->save();
            return redirect()->back();
        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
