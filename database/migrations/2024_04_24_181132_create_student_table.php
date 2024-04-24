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
        Schema::create('student', function (Blueprint $table) {
            $table->integer('ID')->unique('id');
            $table->string('FullName')->primary();
            $table->integer('Parent_ID')->index('parent_id');
            $table->binary('Image')->default('NULL');
            $table->string('grade');
            $table->string('class');
            $table->integer('Supervisor_ID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
