<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriquePronosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_pronostics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('match');
            $table->string('pronostic');
            $table->string('cote');
            $table->string('date');
            $table->string('resultat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historique_pronostics');
    }
}
