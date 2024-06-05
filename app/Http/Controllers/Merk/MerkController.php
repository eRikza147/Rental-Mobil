<?php

namespace App\Http\Controllers\Merk;

use App\Http\Controllers\Controller;
use App\Http\Requests\TambahMerk;
use App\Http\Requests\UpdateMerk;
use App\Models\merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MerkController extends Controller
{
 public function home(){
   $data['merk']=merk::get();
    return view('merk.home',$data);
 }

 public function tambah(){
    return view('merk.tambah');
 }

 public function save(TambahMerk $r){
   if ($r->validated()) {
      $logo=$r->logo->getClientOriginalName();
      $r->logo->move('logo/', $logo);

         merk::create([
            'merk' => $r->merk,
            'logo' => $logo
         ]);
      return redirect('merk')->with('pesan', 'Data berhasil diinputkan');
   }
 }

 public function edit($id){
   $data['merk']=merk::where('id',$id)->first();
   return view('merk/edit',$data);
 }

 public function update(UpdateMerk $r, $id){
   if ($r->validated()) {
      if ($r->logo) {

          $cek = merk::where('id',$id)->first();

          if (File::exists(public_path('logo/'.$cek->logo))) {
              File::delete(public_path('logo/'.$cek->logo));
          }

          $logo = $r->logo->getClientOriginalName();
          $r->logo->move('logo/', $logo);

          $data['logo']=$logo;
      }
      $data['merk']= $r->merk;


      merk::where('id',$id)->update($data);
      return redirect('merk');
  }
 }

 public function delete($id){
   merk::where('id',$id)->delete();
   return redirect('merk');
 }
}
