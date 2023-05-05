<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transparencia_detalles', function (Blueprint $table) {
            $table->id();
            $table->longText('contenido');
            $table->text('resolucion');
            $table->text('articulo')->nullable();
            $table->text('url_resolucion')->nullable();
            $table->text('url_lotaip')->nullable();
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
        Schema::dropIfExists('transparencia_detalles');
    }
};
