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
        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lot_id')->constrained();
            $table->foreignId('varietat_id')->constrained();
            $table->foreignId('especie_id')->constrained();
            $table->string('packCodi')->nullable();
            $table->date('packDataCreacio')->nullable();
            $table->string('packCodiCBPAE')->nullable();
            $table->string('packTipusSobre')->nullable();
            $table->integer('packNumSobres')->nullable();
            $table->float('packGramsSobre', 8, 2)->nullable();
            $table->float('packLlavorsSobre', 8, 2)->nullable();
            $table->float('packTotalGrams', 8, 2)->nullable();
            $table->text('packObservacions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packs');
    }
};
