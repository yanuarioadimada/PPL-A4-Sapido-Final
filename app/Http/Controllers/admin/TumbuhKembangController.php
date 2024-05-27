<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TumbuhKembang;
use Illuminate\Http\Request;

class TumbuhKembangController extends Controller
{
    public function proses()
    {
        $tumbuh = TumbuhKembang::where('status','diproses')->get();
        return view('dashboard.tumbuh.admin.proses',compact('tumbuh'));
    }

    public function riwayat()
    {
        $tumbuh = TumbuhKembang::whereIn('status', ['ditolak', 'diterima'])->get();
        return view('dashboard.tumbuh.admin.riwayat',compact('tumbuh'));
    }

    public function update(Request $request, string $id){
        $tumbuh = TumbuhKembang::find($id);
        $tumbuh->status = $request->status;
        $tumbuh->save();
        return redirect()->route('admin.tumbuh.proses')->with('success','Data berhasil diubah');
        
    }
}
