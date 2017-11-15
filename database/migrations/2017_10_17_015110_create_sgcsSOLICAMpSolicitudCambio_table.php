<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsSOLICAMpSolicitudCambioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsSOLICAMpSolicitudCambio', function (Blueprint $table) {
            $table->increments('SOLICAMid_solicitudcambio');
            $table->string('SOLICAMobjetivo_solicitudcambio');
            $table->string('SOLICAMdescripcion_solicitudcambio');
            $table->date('SOLICAMfecha_solicitud_solicitudcambio');
            $table->unsignedInteger('PROid_proyecto');
            $table->unsignedInteger('FAid_fase');
            $table->unsignedInteger('TAid_tarea');
            $table->unsignedInteger('ENTPROid_entregableproyecto');
            $table->string('SOLICAMcodigo_solicitudcambio');
            $table->boolean('SOLICAMestado_solicitudcambio');
            $table->unsignedInteger('USUid_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsSOLICAMpSolicitudCambio');
    }
}
