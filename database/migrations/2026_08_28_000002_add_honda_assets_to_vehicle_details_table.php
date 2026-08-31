<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicle_details', function (Blueprint $table) {
            $table->string('brochure_url', 255)->nullable()->after('license_plate');
            $table->text('promo_package')->nullable()->after('brochure_url');
            $table->text('warranty_info')->nullable()->after('promo_package');
            $table->json('honda_features')->nullable()->after('warranty_info');
            $table->text('color_options')->nullable()->after('honda_features');
            $table->text('bonus_accessories')->nullable()->after('color_options');
        });
    }

    public function down(): void
    {
        Schema::table('vehicle_details', function (Blueprint $table) {
            $table->dropColumn([
                'brochure_url',
                'promo_package',
                'warranty_info',
                'honda_features',
                'color_options',
                'bonus_accessories',
            ]);
        });
    }
};
