<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo', function (Blueprint $table) {
            $table->id();
            $table ->string('AutorNombre');
            $table ->string('AutorApellido');
            $table ->string('LibroNombre');
            $table ->string('LibroGenero');
            $table ->string('TapaFrontal');
            $table ->string('TapaTrasera');         
            $table ->string('EditorialNombre');
            $table ->string('Precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogos');
    }
}
