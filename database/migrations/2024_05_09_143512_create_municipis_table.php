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
        Schema::create('municipis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('munIlla')->nullable();
            $table->foreignId('provincie_id')->constrained();
            $table->string('munPais');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipis');
    }
};
