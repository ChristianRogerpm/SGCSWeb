<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsTAVEpTareaVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsTAVEpTareaVersion', function (Blueprint $table) {
            $table->increments('TAVEid_tareaversion');
            $table->double('TAVEnumeroversion');
            $table->string('TAVEenlace_tareaversion');
            $table->date('TAVEfecha_emitida_tareaversion');
            $table->boolean('TAVEestado_tareaversion');
            $table->unsignedInteger('TAREid_revision');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsTAVEpTareaVersion');
    }
}
