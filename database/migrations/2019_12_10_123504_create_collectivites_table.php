<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectivites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('designation');
            $table->string('superficie');
            $table->integer('population');
            $table->string('densite');
            $table->string('region');
            $table->double('latitude');
            $table->string('longitude');
            $table->string('telephone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collectivites');
    }
}
