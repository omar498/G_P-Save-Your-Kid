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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->unsignedBigInteger('Bus_ID');
            $table->unsignedBigInteger('student_ID')->unique(); // If student_ID should be unique, not a primary key.
            $table->dateTime('enroll_time');
            $table->tinyInteger('Enroll_Status')->nullable();
            $table->timestamps();

            $table->primary('Bus_ID');
            $table->foreign('Bus_ID')->references('id')->on('buses_info');
            // Assuming you have buses_info table that 'Bus_ID' should reference.
            $table->foreign('student_ID')->references('id')->on('students');
            // Assuming you have students table that 'student_ID' should reference.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
