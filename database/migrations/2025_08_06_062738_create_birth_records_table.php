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
        Schema::create('birth_records', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('village');
            $table->string('father_name');
            $table->string('mother_name');
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
        Schema::dropIfExists('birth_records');
    }
};
