<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membership_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->integer('duration_days')->default(30); // 30 hari, 365 hari, dsb.
            $table->integer('listing_limit')->default(5); // kuota listing aktif
            $table->integer('featured_limit')->default(0); // kuota featured listing
            $table->string('badge_label')->nullable(); // 'PRO', 'POPULAR', 'DEALER'
            $table->json('features')->nullable(); // list fitur JSON
            $table->boolean('is_featured')->default(false); // sorot paket terpopuler
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_plans');
    }
};
