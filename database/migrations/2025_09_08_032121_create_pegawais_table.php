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
        Schema::create('t_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("jenis_kelamin");
            $table->string("agama");
            $table->text("alamat");

            $table->unsignedBigInteger("provinsi_id");
            $table->foreign("provinsi_id")->references("id")->on("t_provinsi");

            $table->unsignedBigInteger("kecamatan_id");
            $table->foreign("kecamatan_id")->references("id")->on("t_kecamatan");

            $table->unsignedBigInteger("kelurahan_id");
            $table->foreign("kelurahan_id")->references("id")->on("t_kelurahan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
