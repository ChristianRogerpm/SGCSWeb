<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsEVACAMCOMpEvaluarCambioComiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsEVACAMCOMpEvaluarCambioComite', function (Blueprint $table) {
            $table->increments('EVCAMCOMid_evaluarcambiocomite');
            $table->unsignedInteger('COMCAid_comitecambio');
            $table->unsignedInteger('EVCAMid_evaluarcambio');
            $table->string('EVCAMCOMobservacion_evaluarcambiocomite');
            $table->boolean('EVCAMCOMestado_evaluarcambiocomite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsEVACAMCOMpEvaluarCambioComite');
    }
}
