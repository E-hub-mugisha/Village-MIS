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
        Schema::create('populations', function (Blueprint $table) {
            $table->id();
            // Foreign keys to location tables
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();
            $table->unsignedBigInteger('cell_id')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();

            // Year for the population data
            $table->year('year');

            // Population numbers
            $table->integer('total_births')->default(0);
            $table->integer('total_deaths')->default(0);
            $table->integer('current_population')->default(0);
            $table->string('status')->default('alive');

            $table->timestamps();

            // Foreign key constraints (assuming you have those tables)
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');
            $table->foreign('cell_id')->references('id')->on('cells')->onDelete('cascade');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');

            $table->unique(['province_id', 'district_id', 'sector_id', 'cell_id', 'village_id', 'year'], 'population_location_year_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populations');
    }
};
