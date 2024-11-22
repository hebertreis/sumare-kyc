<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('register_information', function (Blueprint $table) {
            $table->id();
            $table->integer('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            $table->date('birthdate')->nullable();
            $table->string('document');
            $table->string('mother_name');
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->enum('type', ['PJ', 'PF']);
            $table->date('founding_date')->nullable();
            $table->string('site_url')->nullable();
            $table->string('trading_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('name')->nullable();
            $table->string('professional_occupation')->nullable();
            $table->decimal('annual_revenue', 10, 2)->nullable();
            $table->enum('corporation_type', ['LTDA', 'MEI', 'SA']);
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('register_information');
    }
};
