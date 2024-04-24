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
        Schema::table('student', function (Blueprint $table) {
            $table->foreign(['Supervisor_ID'], 'student_ibfk_1')->references(['ID'])->on('supervisor')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['Parent_ID'], 'student_ibfk_2')->references(['ID'])->on('parent')->onUpdate('restrict')->onDelete('restrict');
            /*   $table->foreign(['ID'], 'student_ibfk_3')->references(['student_ID'])->on('enrollment')->onUpdate('restrict')->onDelete('restrict');
         */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student', function (Blueprint $table) {
            $table->dropForeign('student_ibfk_1');
            $table->dropForeign('student_ibfk_2');
        });
    }
};
