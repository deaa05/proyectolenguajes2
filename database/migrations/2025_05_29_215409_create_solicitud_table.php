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
        Schema::create('solicitud', function (Blueprint $table) {
       $table->id();
        $table->string('tema');
        $table->string('descripcion');
        $table->enum('aera', ['ti', 'contabilidad', 'administracion', 'operador']);
        $table->enum('estado', ['solicitado', 'aprovado', 'rechazado']);
        $table->boolean('usuario')->default(false);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud');
    }
};
