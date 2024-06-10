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
        Schema::create('lots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mostre_id')->constrained();
            $table->foreignId('varietat_id')->constrained();
            $table->foreignId('especie_id')->constrained();
            $table->string('lotCodi')->nullable();
            $table->integer('lotAny');
            $table->date('lotDataCreacio')->nullable();
            $table->float('lotGramsNets', 8, 2)->nullable();
            $table->string('lotTipus')->nullable();
            $table->text('lotPrObservacions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};
