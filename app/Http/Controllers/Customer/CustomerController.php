<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\TambahCustomer;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home(){
        $data['customer']=customer::get();
        return view('costumer/home',$data);
    }

    public function tambah(){
        return view('costumer.tambah');
     }
    
     public function save(TambahCustomer $r){
       if ($r->validated()) {
        $foto_diri=$r->foto_diri->getClientOriginalName();
        $r->foto_diri->move('foto_diri/', $foto_diri);

        $foto_ktp=$r->foto_ktp->getClientOriginalName();
        $r->foto_ktp->move('foto_ktp/', $foto_ktp);

        $foto_sim=$r->foto_sim->getClientOriginalName();
        $r->foto_sim->move('foto_sim/', $foto_sim);

             customer::create([
                'depan' => $r->depan,
                'belakang' => $r->belakang,
                'email' => $r->email,
                'lahir' => $r->lahir,
                'alamat' => $r->alamat,
                'telpon' => $r->telpon,
                'foto_diri' => $foto_diri,
                'foto_ktp' => $foto_ktp,
                'foto_sim' => $foto_sim
             ]);
          return redirect('customer')->with('pesan', 'Data berhasil diinputkan');
       }
     }
    
    //  public function edit($id){
    //    $data['harga']=harga::where('id',$id)->first();
    //    return view('harga/edit',$data);
    //  }
    
//      public function update(UpdateHarga $r, $id){
//        if ($r->validated()) {
//           if ($r->foto_mobil) {
    
//               $cek = harga::where('id',$id)->first();
    
//               if (File::exists(public_path('foto_mobil/'.$cek->foto_mobil))) {
//                   File::delete(public_path('foto_mobil/'.$cek->foto_mobil));
//               }
    
//               $foto_mobil = $r->foto_mobil->getClientOriginalName();
//               $r->foto_mobil->move('foto_mobil/', $foto_mobil);
    
//               $data['foto_mobil']=$foto_mobil;
//           }
//           $data['merk']= $r->merk;
//           $data['model']= $r->model;
//           $data['warna']= $r->warna;
//           $data['tahun']= $r->tahun;
    
    
//           harga::where('id',$id)->update($data);
//           return redirect('car');
//       }
//      }
    
//      public function delete($id){
//        harga::where('id',$id)->delete();
//        return redirect('car');
//      }
}
