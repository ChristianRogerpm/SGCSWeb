<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsENTRPROpEntregableProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsENTRPROpEntregableProyecto', function (Blueprint $table) {
            $table->increments('ENTRPROid_entregableproyecto');
            $table->unsignedInteger('PROid_proyecto');
            $table->unsignedInteger('METid_metodologia');
            $table->unsignedInteger('FAid_fase');
            $table->unsignedInteger('ENTRid_entregable');
            $table->boolean('ENTRPROestado_entregable_proyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsENTRPROpEntregableProyecto');
    }
}
