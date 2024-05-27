<?php

namespace App\Http\Controllers;

use App\Http\Requests\PendaftarRequest;
use App\Models\PendaftarModel;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        return view('pendaftar.index');
    }
    public function store(PendaftarRequest $request)
    {
        try{
            

            $surat_pengajuan = $request->file('surat_ajuan');
            
            $surat_pengajuan->storeAs('public/surat_pengajuan',$surat_pengajuan->hashName());
            $path = 'storage/surat_pengajuan/'.$surat_pengajuan->hashName();
            $nosurat_pengajuan = $request->except('surat_ajuan','foto');
            $withsurat_pengajuan = array_merge($nosurat_pengajuan,['surat_ajuan' => $path, 'status' => 'diproses']);
            
            $foto = $request->file('foto');
            if($foto){
                $foto->storeAs('public/tumbuh',$foto->hashName());
                $path = 'storage/tumbuh/'.$foto->hashName();
                $withfoto = array_merge($withsurat_pengajuan,['foto' => $path]);
            }else{
                $withfoto = $withsurat_pengajuan; 
            }
            // dd($withfoto);
            PendaftarModel::create($withfoto);
            return redirect()->route('landing')->with('success','Pendaftaran Berhasil. Mohon tunggu konfirmasi dari Admin UPT untuk informasi lebih lanjut');
            }catch(\Exception $e){
            
            return redirect()->route('landing')->with('error',$e->getMessage());
            }
    
    }

    public function proses(){
        $pendaftar = PendaftarModel::where('status','diproses')->get();
        return view('pendaftar.admin.proses',compact('pendaftar'));
    }

    public function riwayat(){
        $pendaftar = PendaftarModel::where('status','diterima')->get();
        return view('pendaftar.admin.riwayat',compact('pendaftar'));
    }

    public function update(Request $request, $id){
        $pendaftar = PendaftarModel::find($id);

        $pendaftar->status = $request->status;
        $pendaftar->save();
        try{
            $this->createAccount($id);
            return redirect()->route('admin.pendaftar.proses')->with('success','Data berhasil diupdate');
        }catch(\Exception $e){
            return redirect()->route('admin.pendaftar.proses')->with('error',$e->getMessage());
        }
        
    }

    function createAccount($id){
        $pendaftar = PendaftarModel::find($id);
        $user = User::create([
            'name' => $pendaftar->nama,
            'email' => $pendaftar->email,
            'password' => bcrypt($pendaftar->password),
        ]);
        $user->assignRole('user');
        $profil = Profile::create([
            'id_user' => $user->id,
            'alamat' => $pendaftar->alamat,
            'foto_profile' => $pendaftar->foto,
        ]);
    }
    


}
