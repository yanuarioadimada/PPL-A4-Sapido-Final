<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function proses(){
        $penyakit = Penyakit::where('status','diproses')->get();
        return view('dashboard.penyakit.admin.proses',compact('penyakit'));
    }

    public function riwayat(){
        $penyakit = Penyakit::whereIn('status', ['ditolak', 'diterima'])->get();
        return view('dashboard.penyakit.admin.riwayat',compact('penyakit'));
    }

    public function update(Request $request, string $id){
        $penyakit = Penyakit::find($id);
        $penyakit->status = $request->status;
        $penyakit->save();
        return redirect()->route('admin.penyakit.proses')->with('success','Data berhasil diubah');
        
    }
}



