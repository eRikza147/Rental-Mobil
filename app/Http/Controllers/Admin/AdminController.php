<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home(){
        $data['harga'] = DB::table('harga')
        ->leftJoin('car', 'car.id', '=', 'harga.model')
        ->leftJoin('merk', 'merk.id', '=', 'car.merk')
        ->select('harga.id', 'car.model', 'car.warna', 'car.tahun', 'harga.plat', 'harga.harga', 'car.foto_mobil','merk.merk')
        ->get();
        return view('admin.home',$data);
    }
}
