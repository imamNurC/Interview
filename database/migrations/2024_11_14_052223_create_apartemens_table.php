<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartemensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartemens', function (Blueprint $table) {
            $table->id(); // ID apartemen
            $table->string('nomor_apartemen'); // Nomor apartemen
            $table->integer('lantai'); // Lantai apartemen
            $table->enum('status', ['tersedia', 'terisi', 'maintenance']); // Status apartemen
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
        Schema::dropIfExists('apartemens');
    }
}
