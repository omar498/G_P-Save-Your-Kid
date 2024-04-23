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
        Schema::create('parents', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Full_Name');
            $table->string('Password');
            $table->string('Child_Name');
            $table->string('Email')->unique();
            $table->unsignedBigInteger('Phone');
            $table->string('address');
            $table->unsignedBigInteger('Supervisor_ID');

            $table->foreign('Supervisor_ID')->references('ID')->on('supervisors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
