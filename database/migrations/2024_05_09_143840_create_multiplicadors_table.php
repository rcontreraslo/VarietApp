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
        Schema::create('multiplicadors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mulNIF')->nullable();
            $table->string('mulCBPAE')->nullable();
            $table->string('mulAdreca')->nullable();
            $table->string('mulCadastral')->nullable();
            $table->integer('mulPoligon')->nullable();
            $table->integer('mulParcela')->nullable();
            $table->integer('mulRecinte')->nullable();
            $table->string('mulPersonaContacte')->nullable();
            $table->string('mulTelefon')->nullable();
            $table->string('mulEmail')->nullable();
            $table->foreignId('municipi_id')->constrained();
            $table->string('mulCP')->nullable();
            $table->text('mulObservacions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multiplicadors');
    }
};
