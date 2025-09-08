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
        Schema::create('t_kelurahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("provinsi_id");
            $table->unsignedBigInteger("kecamatan_id");
            $table->string("kode")->unique();
            $table->string("nama");
            $table->boolean("is_active");

            $table->foreign("provinsi_id")->references("id")->on("t_provinsi");
            $table->foreign("kecamatan_id")->references("id")->on("t_kecamatan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahans');
    }
};
