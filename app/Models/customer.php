<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable=['depan','belakang','email','lahir','alamat','telpon','foto_diri','foto_ktp','foto_sim'];
}
