<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsENTRREVpEntregableRevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsENTRREVpEntregableRevision', function (Blueprint $table) {
            $table->increments('ENTRREVid_entregablerevision');
            $table->string('ENTRREVobservacion_entregablerevision');
            $table->string('ENTRREVurl_entregablerevision');
            $table->string('ENTRREVfecha_emitida_entregablerevision');
            $table->unsignedInteger('ENTRPROid_entregableproyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsENTRREVpEntregableRevision');
    }
}
