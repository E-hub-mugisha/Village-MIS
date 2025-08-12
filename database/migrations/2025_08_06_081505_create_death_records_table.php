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
        Schema::create('death_records', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_of_death');
            $table->string('gender');
            $table->integer('age')->nullable();
            $table->string('cause_of_death');
            $table->string('place_of_death');
            $table->string('village');
            $table->string('informant_name');
            $table->date('registration_date');
            $table->string('certificate_number')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // registered by
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('death_records');
    }
};
