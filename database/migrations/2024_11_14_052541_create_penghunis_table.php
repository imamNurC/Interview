<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghunisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghunis', function (Blueprint $table) {
            $table->id(); // ID penghuni
            $table->foreignId('apart_id')->constrained('apartemens')->onDelete('cascade'); // Relasi ke tabel apartemen
            $table->string('nama'); // Nama penghuni
            $table->enum('jenis_kelamin', ['pria', 'wanita']); // Jenis kelamin
            $table->date('tanggal_lahir'); // Tanggal lahir
            $table->integer('umur'); // Umur
            $table->enum('status', ['aktif', 'non-aktif']); // Status penghuni
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penghunis');
    }
}
