<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('automatic_anticipation_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            $table->integer('delay');
            $table->json('days');
            $table->string('volume_percentage');
            $table->enum('type', ['1025', 'other']);
            $table->boolean('enabled');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('automatic_anticipation_settings');
    }
};
