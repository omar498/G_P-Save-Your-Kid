<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTable extends Migration
{
    public function up()
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Full_Name');
            $table->binary('Image')->nullable();
            $table->unsignedBigInteger('Phone');
            $table->string('Email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver');
    }
}
