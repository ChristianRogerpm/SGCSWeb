<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsCOMCApComiteCambioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsCOMCApComiteCambio', function (Blueprint $table) {
            $table->increments('COMCAid_comitecambio');
            $table->unsignedInteger('USUPROid_usuarioproyecto');
            $table->unsignedInteger('COMCAestado_comitecambio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsCOMCApComiteCambio');
    }
}
