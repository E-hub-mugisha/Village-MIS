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
        Schema::table('birth_records', function (Blueprint $table) {
           $table->unsignedBigInteger('village_id')->after('population_id');

            // Assuming you have a villages table and want to set up FK constraint:
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('birth_records', function (Blueprint $table) {
            //
            $table->dropForeign(['village_id']);
            $table->dropColumn('village_id');
        });
    }
};
