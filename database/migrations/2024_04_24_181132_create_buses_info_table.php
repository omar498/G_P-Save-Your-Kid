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
            $table->integer('Bus_ID', false);
            $table->integer('Bus_Supervisor_ID')->unique('bus_supervisor');
            $table->integer('Bus_Driver_ID')->index('bus_driver_id');
            $table->string('Bus_Line_Name');

            /* $table->primary(['Bus_ID', 'Bus_Supervisor_ID', 'Bus_Driver_ID']);
         */
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
