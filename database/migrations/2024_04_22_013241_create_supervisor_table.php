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
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Full_Name');
            $table->string('Password');
            $table->binary('Image');
            $table->string('Email');
            $table->unsignedBigInteger('Phone');
            $table->string('Address')->nullable();
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_info');
    }
};
