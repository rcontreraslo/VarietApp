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
        Schema::create('persones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('perCognoms')->nullable();
            $table->string('perOrganitzacio')->nullable();
            $table->integer('perAnyNaixement')->nullable();
            $table->string('perVinculacio')->nullable();
            $table->string('perCP')->nullable();
            $table->foreignId('municipi_id')->constrained();
            $table->string('perTelefon')->nullable();
            $table->string('perEmail')->nullable();
            $table->text('perObservacions')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persones');
    }
};
