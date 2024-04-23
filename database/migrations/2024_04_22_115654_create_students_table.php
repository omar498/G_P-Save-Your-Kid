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
        Schema::create('students', function (Blueprint $table) {
            $table->id('ID');
            $table->string('FullName');
            $table->unsignedBigInteger('Parent_ID');
            $table->binary('Image');
            $table->string('grade');
            $table->string('class')->nullable();
            $table->unsignedBigInteger('Supervisor_ID');

            $table->foreign('Parent_ID')->references('ID')->on('parents');
            $table->foreign('Supervisor_ID')->references('ID')->on('supervisors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
