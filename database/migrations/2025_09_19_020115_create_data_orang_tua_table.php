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
        Schema::create('data_orang_tua', function (Blueprint $table) {
            $table->id();
            $table->string("Nama_Orang_Tua", 150);
            $table->tinyInteger("Umur")->unsigned();
            $table->string("Alamat", 100);
            $table->bigInteger("NIK_Orang_Tua");
            $table->enum("Agama" , ["Islam", "Kristen", "Katolik", "Hindhu", "Buddha", "Konghucu"]);
            $table->string("Pekerjaan", 50);
            $table->bigInteger("Nomor_telepon");
            $table->tinyInteger("Kode_Pos");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_orang_tua');
    }
};
