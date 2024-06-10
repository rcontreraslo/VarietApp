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
        Schema::create('mostres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mosCodi')->nullable();
            $table->foreignId('varietat_id')->constrained();
            $table->foreignId('multiplicador_id')->constrained();
            $table->integer('mosAny');
            $table->string('mosEstatMostra')->nullable();
        // Previsió
            $table->string('mosPrOrigen')->nullable();
            $table->string('mosPrSeleccio')->nullable();
            $table->string('mosPrCollita')->nullable();
            $table->date('mosPrDataEntrega')->nullable();
            $table->float('mosPrMinGrams', 8, 2)->nullable();
            $table->float('mosPrMaxGrams', 8, 2)->nullable();
            $table->string('mosPrFormatEntrega')->nullable();
            $table->string('mosPrTipusEntrega')->nullable();
            $table->date('mosPrDataSembra')->nullable();
            $table->float('mosPrKgSembrats', 8, 2)->nullable();
            $table->float('mosPrPreuAcordat', 8, 2)->nullable();
            $table->text('mosPrObservacions')->nullable();
        // Arribada
            $table->date('mosArrDataEntrega')->nullable();
            $table->string('mosArrFormatEntrega')->nullable();
            $table->string('mosArrTipusEntrega')->nullable();
            $table->string('mosArrEstatEntrega')->nullable();
            $table->string('mosArrEstatGenetic')->nullable();
            $table->float('mosArrGrams', 8, 2)->nullable();
            $table->text('mosArrObservacions')->nullable();
        // Comptabilitat i estoc
            $table->string('mosEstatComptable')->nullable();
            $table->date('mosDataEntrega')->nullable();
            $table->date('mosDataPagament')->nullable();
            $table->float('mosPreuPagat', 8, 2)->nullable();
            $table->float('mosGramsNets', 8, 2)->nullable();
            $table->float('mosLlavorsGram', 8, 2)->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mostres');
    }
};
