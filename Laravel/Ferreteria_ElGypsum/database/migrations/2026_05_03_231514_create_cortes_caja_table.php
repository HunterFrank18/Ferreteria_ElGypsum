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
        Schema::create('cortes_caja', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->decimal('monto_inicial',10,2)->default(0);
    $table->decimal('total_ventas',10,2)->default(0);
    $table->decimal('total_efectivo',10,2)->default(0);
    $table->decimal('total_transferencia',10,2)->default(0);
    $table->decimal('total_tarjeta',10,2)->default(0);
    $table->decimal('total_credito',10,2)->default(0);
    $table->decimal('total_abonos',10,2)->default(0);
    $table->decimal('total_egresos',10,2)->default(0);
    $table->decimal('saldo_final',10,2)->default(0);
    $table->timestamp('apertura');
    $table->timestamp('cierre')->nullable();
    $table->timestamps();
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cortes_caja');
    }
};
