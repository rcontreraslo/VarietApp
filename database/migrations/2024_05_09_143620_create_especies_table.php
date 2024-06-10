<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('espCodi');
            $table->string('name');
            $table->string('espNomCientific')->nullable();
            $table->foreignId('familie_id')->constrained();
            $table->string('espSector')->nullable();
            $table->integer('passaportFito');
            $table->string('espRegulacio')->nullable();
            $table->integer('espTempGermOptima')->nullable();
            $table->string('espTempGermInterval')->nullable();
            $table->string('espDiesGerm')->nullable();
            $table->integer('espAnysDuracio')->nullable();
            $table->integer('espPercGerm')->nullable();
            $table->integer('espGrReserva')->nullable();
            $table->integer('espKNO3Germ')->nullable();
            $table->integer('espNumLlavorsGr')->nullable();
            $table->integer('espDeclarCultius')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especies');
    }
};
