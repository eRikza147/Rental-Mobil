<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('depan');
            $table->string('belakang');
            $table->string('email');
            $table->date('lahir');
            $table->text('alamat');
            $table->string('telpon');
            $table->string('foto_diri');
            $table->string('foto_ktp');
            $table->string('foto_sim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
