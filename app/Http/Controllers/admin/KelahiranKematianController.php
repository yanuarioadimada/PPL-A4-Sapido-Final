<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KelahiranKematian;
use Illuminate\Http\Request;

class KelahiranKematianController extends Controller
{
    public function proses()
    {
        $data = KelahiranKematian::where('status','diproses')->get();
        return view('dashboard.kelahiran_kematian.admin.proses',compact('data'));
    }

    public function riwayat()
    {
        $data = KelahiranKematian::whereIn('status', ['ditolak', 'diterima'])->get();
        return view('dashboard.kelahiran_kematian.admin.riwayat',compact('data'));
    }

    public function update(Request $request, string $id){
        $data = KelahiranKematian::find($id);
        $data->status = $request->status;
        // dd($data);
        $data->save();
        return redirect()->route('admin.kelahiran-kematian.proses')->with('success','Data berhasil diubah');
        
    }
}
