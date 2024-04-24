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
        Schema::table('parent', function (Blueprint $table) {
            $table->foreign(['Supervisor_ID'], 'parent_ibfk_1')->references(['ID'])->on('supervisor')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('parent', function (Blueprint $table) {
            $table->dropForeign('parent_ibfk_1');
        });
    }
};
