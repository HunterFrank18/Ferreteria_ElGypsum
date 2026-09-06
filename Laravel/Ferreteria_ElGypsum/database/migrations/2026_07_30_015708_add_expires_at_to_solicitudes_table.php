<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->timestamp('expires_at')->nullable()->after('notified_at');
            $table->timestamp('approved_at')->nullable()->after('expires_at');
            $table->timestamp('closed_at')->nullable()->after('approved_at');
        });
    }

    public function down(): void
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->dropColumn(['expires_at', 'approved_at', 'closed_at']);
        });
    }
};
