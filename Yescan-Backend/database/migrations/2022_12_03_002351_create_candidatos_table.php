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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_candidato');
            $table->string('raza');
            $table->string('edad');
            $table->unsignedBigInteger('responsable_id'); 
            $table->foreign('responsable_id')->references('id')->on('responsables');
            $table->unsignedBigInteger('sexo_id'); 
            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->softDeletes();            
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
        Schema::dropIfExists('candidatos');
    }
};
