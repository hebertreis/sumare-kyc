<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transfer_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            $table->integer('transfer_day');
            $table->enum('transfer_interval', ['Daily', 'Weekly', 'Monthly']);
            $table->boolean('transfer_enabled');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transfer_settings');
    }
};
