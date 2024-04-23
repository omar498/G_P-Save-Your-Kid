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
        Schema::create('buses_info', function (Blueprint $table) {
            $table->id('Bus_ID');
            $table->unsignedBigInteger('Bus_Supervisor_ID');
            $table->id('Bus_Driver_ID');
            $table->string('Bus_Line_Name');

            $table->foreign('Bus_Supervisor_ID')->references('ID')->on('supervisors');
            $table->foreign('Bus_Driver_ID')->references('ID')->on('drivers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses_info');
    }
};
