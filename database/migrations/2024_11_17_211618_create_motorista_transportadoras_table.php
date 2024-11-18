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
        Schema::create('motorista_transportadoras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motorista_id')->constrained('motoristas');
            $table->foreignId('transportadora_id')->constrained('transportadoras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorista_transportadoras');
    }
};
