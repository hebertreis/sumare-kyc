<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            $table->string('account_number');
            $table->string('bank');
            $table->string('branch_number');
            $table->string('holder_document');
            $table->enum('holder_type', ['individual', 'corporation']);
            $table->string('account_check_digit');
            $table->enum('type', ['checking', 'savings']);
            $table->string('holder_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
};
