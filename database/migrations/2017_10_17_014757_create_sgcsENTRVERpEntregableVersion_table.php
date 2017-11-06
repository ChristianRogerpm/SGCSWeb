<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsENTRVERpEntregableVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsENTRVERpEntregableVersion', function (Blueprint $table) {
            $table->increments('ENTRVERid_entregableversion');
            $table->double('ENTRVERnumero_entregableversion');
            $table->string('ENTRVERemitidopor_entregableversion');
            $table->string('ENTRVERenlace_entregableversion');
            $table->date('ENTRVERfecha_emitida_entregableversion');
            $table->boolean('ENTRVERestado_entregableversion');
            $table->unsignedInteger('ENTRREVid_entregablerevision');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsENTRVERpEntregableVersion');
    }
}
