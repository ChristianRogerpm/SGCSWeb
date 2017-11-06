<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsFAtFaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsFAtFase', function (Blueprint $table) {
            $table->increments('FAid_fase');
            $table->unsignedInteger('METid_metodologia');
            $table->string('FAnombre_fase');
            $table->mediumText('FAdescripcion_fase');
            $table->boolean('FAestado_fase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsFAtFase');
    }
}
