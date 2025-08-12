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
            $table->unsignedBigInteger('birth_record_id')->nullable()->after('id');
            $table->foreign('birth_record_id')->references('id')->on('birth_records')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('death_records', function (Blueprint $table) {
            //
            $table->dropForeign(['birth_record_id']);
            $table->dropColumn('birth_record_id');
        });
    }
};
