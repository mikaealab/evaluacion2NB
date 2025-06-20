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
        Schema::create('pilotos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('DNI');
            $table->string('nombre');
            $table->float('latitud1');
            $table->float('longitud1');
            $table->time('hora1');
            $table->float('latitud2');
            $table->float('longitud2');
            $table->time('hora2');
            $table->float('latitud3');
            $table->float('longitud3');
            $table->time('hora3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilotos');
    }
};
