<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->string('brochure_pdf')->nullable()->after('featured');
            $table->string('qr_3d_image')->nullable()->after('brochure_pdf');
            $table->string('external_3d_url')->nullable()->after('qr_3d_image');
            $table->string('promo_dp')->nullable()->after('external_3d_url');
        });
    }

    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn(['brochure_pdf', 'qr_3d_image', 'external_3d_url', 'promo_dp']);
        });
    }
};
