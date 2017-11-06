<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsTApTareaProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsTApTareaProyecto', function (Blueprint $table) {
            $table->increments('TAid_tarea');
            $table->string('TAnombre_tarea');
            $table->string('TAdescripcion_tarea');
            $table->boolean('TAestado_tarea');
            $table->unsignedInteger('FAid_fase');
            $table->unsignedInteger('ENTPROid_entregableproyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsTApTareaProyecto');
    }
}
