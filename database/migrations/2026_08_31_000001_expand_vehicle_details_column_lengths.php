<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicle_details', function (Blueprint $table) {
            $table->string('engine_capacity', 255)->nullable()->change();
            $table->string('color', 255)->nullable()->change();
            $table->string('transmission', 50)->nullable()->change();
            $table->string('fuel_type', 50)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('vehicle_details', function (Blueprint $table) {
            $table->string('engine_capacity', 20)->nullable()->change();
            $table->string('color', 50)->nullable()->change();
            $table->string('transmission', 20)->nullable()->change();
            $table->string('fuel_type', 20)->nullable()->change();
        });
    }
};
