<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsPROMETpProyectoMetodologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsPROMETpProyectoMetodologia', function (Blueprint $table) {
            $table->increments('PROMETid_proyectometodologia');
            $table->unsignedInteger('PROid_proyecto');
            $table->unsignedInteger('METid_metodologia');
            $table->unsignedInteger('PROMETestado_proyectometodologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsPROMETpProyectoMetodologia');
    }
}
