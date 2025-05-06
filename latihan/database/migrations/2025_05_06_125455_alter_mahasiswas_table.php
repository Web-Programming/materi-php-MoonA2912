<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Attributes\After;
use function Laravel\Prompts\table;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->renameColumn("nama", " Nama_Mahasiswa");
            $table->text("alamat")->after("tanggal_lahir");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            //kalo dak jadi
            $table->renameColumn("Nama_Mahasiswa", "nama");
            $table->removeColumn("alamat");
        });
    }
};
