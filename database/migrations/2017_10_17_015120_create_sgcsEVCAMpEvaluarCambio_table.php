<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsEVCAMpEvaluarCambioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsEVCAMpEvaluarCambio', function (Blueprint $table) {
            $table->increments('EVCAMid_evaluarcambio');
            $table->string('EVCAMprioridad_evaluarcambio');
            $table->string('EVCAMobservacion_evaluarcambio');
            $table->boolean('EVCAMestado_evaluarcambio');
            $table->unsignedInteger('SOLICAMid_solicitudcambio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsEVCAMpEvaluarCambio');
    }
}
