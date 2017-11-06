<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsUSUPROpUsuarioProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsUSUPROpUsuarioProyecto', function (Blueprint $table) {
            $table->increments('USUPROid_usuarioproyecto');
            $table->unsignedInteger('USUid_usuario');
            $table->unsignedInteger('PROid_proyecto');
            $table->boolean('USUPROestado_usuarioproyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsUSUPROpUsuarioProyecto');
    }
}
