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
        Schema::table('photos', function (Blueprint $table) {
            // Add the qr_url column as a unique string, making it nullable
            // in case existing records don't have a QR URL yet.
            $table->string('qr_url')->unique()->nullable()->after('original_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            // Remove the qr_url column in the down method
            $table->dropColumn('qr_url');
        });
    }
};
