<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\TambahCar;
use App\Http\Requests\UpdatecCar;
use App\Models\car;
use App\Models\merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function home(){
        $data['car']= car::leftJoin('merk', 'merk.id','car.merk')
        ->select('car.id','merk.merk','merk.logo','car.model','car.warna','car.tahun','car.foto_mobil')->get();
        return view('car/home',$data);
    }
    public function tambah(){
        $data['merk']=merk::get();
        return view('car/tambah',$data);
     }
    
     public function save(TambahCar $r){
       if ($r->validated()) {
          $foto_mobil=$r->foto_mobil->getClientOriginalName();
          $r->foto_mobil->move('foto_mobil/', $foto_mobil);
    
             car::create([
                'merk' => $r->merk,
                'model' => $r->model,
                'warna' => $r->warna,
                'tahun' => $r->tahun,
                'foto_mobil' => $foto_mobil
             ]);
          return redirect('car')->with('pesan', 'Data berhasil diinputkan');
       }
     }
    
     public function edit($id){
       $data['car']=car::where('id',$id)->first();
       return view('car/edit',$data);
     }
    
     public function update(UpdatecCar $r, $id){
       if ($r->validated()) {
          if ($r->foto_mobil) {
    
              $cek = car::where('id',$id)->first();
    
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
    
    
          car::where('id',$id)->update($data);
          return redirect('car');
      }
     }
    
     public function delete($id){
       car::where('id',$id)->delete();
       return redirect('car');
     }
}
