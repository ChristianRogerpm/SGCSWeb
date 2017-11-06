<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsENTRtEntregableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsENTRtEntregable', function (Blueprint $table) {
            $table->increments('ENTRid_entregable');
            $table->unsignedInteger('METid_metodologia');
            $table->unsignedInteger('FAid_fase');
            $table->string('ENTRnombre_entregable');
            $table->mediumText('ENTRdescripcion_entregable');
            $table->boolean('ENTRestado_entregable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsENTRtEntregable');
    }
}
