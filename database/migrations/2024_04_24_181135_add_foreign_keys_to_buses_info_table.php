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
        Schema::table('buses_info', function (Blueprint $table) {
            $table->foreign(['Bus_Supervisor_ID'], 'buses_info_ibfk_2')->references(['ID'])->on('supervisor')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['Bus_Driver_ID'], 'buses_info_ibfk_3')->references(['ID'])->on('driver')->onUpdate('restrict')->onDelete('restrict');
            /*  $table->foreign(['Bus_ID'], 'buses_info_ibfk_4')->references(['Bus_ID'])->on('enrollment')->onUpdate('restrict')->onDelete('restrict');
         */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buses_info', function (Blueprint $table) {
            $table->dropForeign('buses_info_ibfk_2');
            $table->dropForeign('buses_info_ibfk_3');
            /* $table->dropForeign('buses_info_ibfk_4'); */
        });
    }
};
