<?php

namespace App\Http\Controllers\Harga;

use App\Http\Controllers\Controller;
use App\Http\Requests\TambahHarga;
use App\Http\Requests\UpdateHarga;
use App\Models\car;
use App\Models\harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HargaController extends Controller
{
    public function home(){
        $data['harga']= harga::leftJoin('car', 'car.id','harga.model')
        ->select('harga.id','car.model','car.warna','car.tahun','harga.plat','harga.harga')->get();
        return view('harga/home',$data);
    }
    public function tambah(){
        $data['car']=car::get();
        return view('harga/tambah',$data);
     }
    
     public function save(TambahHarga $r){
       if ($r->validated()) {
             harga::create([
                'model' => $r->model,
                'plat' => $r->plat,
                'harga' => $r->harga
             ]);
          return redirect('harga')->with('pesan', 'Data berhasil diinputkan');
       }
     }
    
     public function edit($id){
       $data['harga']=harga::where('id',$id)->first();
       return view('harga/edit',$data);
     }
    
     public function update(UpdateHarga $r, $id){
       if ($r->validated()) {
          if ($r->foto_mobil) {
    
              $cek = harga::where('id',$id)->first();
    
              if (File::exists(public_path('foto_mobil/'.$cek->foto_mobil))) {
                  File::delete(public_path('foto_mobil/'.$cek->foto_mobil));
              }
    
              $foto_mobil = $r->foto_mobil->getClientOriginalName();
              $r->foto_mobil->move('foto_mobil/', $foto_mobil);
    
              $data['foto_mobil']=$foto_mobil;
          }
          $data['merk']= $r->merk;
          $data['model']= $r->model;
          $data['warna']= $r->warna;
          $data['tahun']= $r->tahun;
    
    
          harga::where('id',$id)->update($data);
          return redirect('car');
      }
     }
    
     public function delete($id){
       harga::where('id',$id)->delete();
       return redirect('car');
     }
}
