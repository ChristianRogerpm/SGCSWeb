<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSgcsMETtMetodologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sgcsMETtMetodologia', function (Blueprint $table) {
            $table->increments('METid_metodologia');
            $table->string('METnombre_metodologia');
            $table->mediumText('METdescripcion_metodologia');
            $table->boolean('METestado_metodologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sgcsMETtMetodologia');
    }
}
