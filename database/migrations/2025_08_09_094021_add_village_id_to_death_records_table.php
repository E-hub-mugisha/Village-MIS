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
        Schema::table('death_records', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('village_id')->nullable()->after('village');
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('death_records', function (Blueprint $table) {
            //
            $table->dropForeign(['village_id']);
            $table->dropColumn('village_id');
        });
    }
};
