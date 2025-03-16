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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('jurusan', ['Rekayasa Perangkat Lunak', 'Teknik Komputer dan Jaringan', 'Teknik Pemesinan', 'Teknik Kendaraan Ringan dan Otomotif', 'Teknik Bisnis dan Sepeda Motor']);
            $table->enum('tingkat_kelas', ['X', 'XI', 'XII']);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('email')->unique();
            $table->string('nomor_telepon')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
