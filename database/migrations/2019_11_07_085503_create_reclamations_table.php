<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('titre');
            $table->text('description');
            $table->float('latitude');
            $table->float('longitude');
            $table->boolean('etat');
            $table->longText('image')->nullable();
            $table->unsignedBigInteger('citoyen_id');
            $table->foreign('citoyen_id')
                ->references('id')
                ->on('citoyens');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')
                ->references('id')
                ->on('categories');
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
        Schema::dropIfExists('reclamations');
    }
}
