<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('description')->nullable();
            $table->integer('prix')->unsigned()->nullable();
            $table->string('type');
            $table->integer('qtte')->unsigned()->nullable();
            $table->tinyInteger('isFinit')->nullable();
            $table->integer('client_id')->unsigned()->index()->nullable();
            $table->integer('fournisseur_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('produits');
    }
}
