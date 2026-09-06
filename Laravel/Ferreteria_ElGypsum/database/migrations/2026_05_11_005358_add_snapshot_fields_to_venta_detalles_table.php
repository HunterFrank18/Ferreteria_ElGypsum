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
    Schema::table('venta_detalles', function (Blueprint $table) {
        $table->string('product_name')->nullable()->after('product_variant_id');
        $table->string('brand_name')->nullable()->after('product_name');
        $table->string('presentation')->nullable()->after('brand_name');
        $table->string('sku')->nullable()->after('presentation');
    });
}

public function down(): void
{
    Schema::table('venta_detalles', function (Blueprint $table) {
        $table->dropColumn(['product_name', 'brand_name', 'presentation', 'sku']);
    });
}

};
