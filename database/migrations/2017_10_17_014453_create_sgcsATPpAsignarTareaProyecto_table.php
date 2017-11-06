<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsATPpAsignarTareaProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsATPpAsignarTareaProyecto', function (Blueprint $table) {
            $table->increments('ATPid_asignartareaproyecto');
            $table->unsignedInteger('TAid_tarea');
            $table->unsignedInteger('USUPROid_usuarioproyecto');
            $table->unsignedInteger('FAid_fase');
            $table->unsignedInteger('ENTRPROid_entregableproyecto');
            $table->date('ATPfecha_inicio_tareaproyecto');
            $table->date('ATPfecha_fin_tareaproyecto');
            $table->boolean('ATPestado_tareaproyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsATPpAsignarTareaProyecto');
    }
}
