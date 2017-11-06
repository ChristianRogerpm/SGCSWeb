<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsTAREpTareaRevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsTAREpTareaRevision', function (Blueprint $table) {
            $table->increments('TAREid_tarearevision');
            $table->string('TAREobservacion_tarearevision');
            $table->string('TAREurl_tarearevision');
            $table->date('TAREfecha_emitida_tarearevision');
            $table->unsignedInteger('ATPid_asignartareaproyecto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsTAREpTareaRevision');
    }
}
