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
        Schema::create('varietats', function (Blueprint $table) {
            $table->id();
            $table->string('varCodi')->unique();
            $table->string('name');
            $table->foreignId('especie_id')->constrained();
            $table->string('varNomCientific')->nullable();
            $table->string('varNomOficial')->nullable();
            $table->string('varCategoria')->nullable();
            $table->text('varDescripcio')->nullable();
            $table->text('varObservacions')->nullable();
            $table->float('varPreuLlavor', 8, 2)->nullable();
            $table->float('varPreuFruit', 8, 2)->nullable();
            $table->string('varCodiBarresImg')->nullable();
            $table->integer('varAnyBaixa');

/* Tipologia */
            $table->string('varTipRegistre')->nullable();
            $table->string('varTipCataleg')->nullable();
            $table->string('varTipDeclaracio')->nullable();

/* Info. Agronòmica*/
            $table->string('varAgrCicle')->nullable();
            $table->string('varAgrPrecocitat')->nullable();
            $table->string('varAgrAltRendiment')->nullable();
            $table->string('varAgrToleranciaSequera')->nullable();
            $table->string('varAgrRecomanaHortBalco')->nullable();
            $table->string('varAgrPostcollita')->nullable();
            $table->string('varAgrConsellProfessionals')->nullable();
            $table->string('varAgrConsellSembra')->nullable();
            $table->string('varAgrCmSembra')->nullable();
            $table->string('varAgrMarcPlantacio')->nullable();
            $table->string('varAgrSembraIni')->nullable();
            $table->string('varAgrSembraFin')->nullable();
            $table->string('varAgrCollitaIni')->nullable();
            $table->string('varAgrCollitaFin')->nullable();
            $table->text('varAgrSeguiment')->nullable();

/* Origen */
            $table->foreignId('persone_id')->nullable()->constrained();
            $table->integer('varOriAny')->nullable();
            $table->text('varOriObservacions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varietats');
    }
};
