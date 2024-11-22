#!/bin/bash

# Rodar os comandos para criar migrations, models, controllers

# 1. Criar Models
php artisan make:model Receiver -m
php artisan make:model TransferSetting -m
php artisan make:model BankAccount -m
php artisan make:model AutomaticAnticipationSetting -m
php artisan make:model Address -m
php artisan make:model RegisterInformation -m
php artisan make:model Phone -m

# 2. Criar Controllers
php artisan make:controller ReceiverController
php artisan make:controller TransferSettingController
php artisan make:controller BankAccountController
php artisan make:controller AutomaticAnticipationSettingController
php artisan make:controller AddressController
php artisan make:controller RegisterInformationController
php artisan make:controller PhoneController

# 3. Popular as migrations
echo "Populando migrations..."

# Migration: Receivers
cat <<EOT > database/migrations/$(date +%Y_%m_%d_%H%M%S)_create_receivers_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('receivers', function (Blueprint \$table) {
            \$table->id();
            \$table->string('code')->unique();
            \$table->string('metadata')->nullable();
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receivers');
    }
};
EOT

# Migration: Transfer Settings
cat <<EOT > database/migrations/$(date +%Y_%m_%d_%H%M%S)_create_transfer_settings_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transfer_settings', function (Blueprint \$table) {
            \$table->id();
            \$table->integer('receiver_id');
            \$table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            \$table->integer('transfer_day');
            \$table->enum('transfer_interval', ['Daily', 'Weekly', 'Monthly']);
            \$table->boolean('transfer_enabled');
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transfer_settings');
    }
};
EOT

# Migration: Bank Accounts
cat <<EOT > database/migrations/$(date +%Y_%m_%d_%H%M%S)_create_bank_accounts_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint \$table) {
            \$table->id();
            \$table->integer('receiver_id');
            \$table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            \$table->string('account_number');
            \$table->string('bank');
            \$table->string('branch_number');
            \$table->string('holder_document');
            \$table->enum('holder_type', ['individual', 'corporation']);
            \$table->string('account_check_digit');
            \$table->enum('type', ['checking', 'savings']);
            \$table->string('holder_name');
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
};
EOT

# Migration: Automatic Anticipation Settings
cat <<EOT > database/migrations/$(date +%Y_%m_%d_%H%M%S)_create_automatic_anticipation_settings_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('automatic_anticipation_settings', function (Blueprint \$table) {
            \$table->id();
            \$table->integer('receiver_id');
            \$table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            \$table->integer('delay');
            \$table->string('volume_percentage');
            \$table->enum('type', ['1025', 'other']);
            \$table->boolean('enabled');
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('automatic_anticipation_settings');
    }
};
EOT

# Migration: Addresses
cat <<EOT > database/migrations/$(date +%Y_%m_%d_%H%M%S)_create_addresses_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint \$table) {
            \$table->id();
            \$table->integer('receiver_id');
            \$table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            \$table->string('street');
            \$table->string('street_number');
            \$table->string('neighborhood');
            \$table->string('city');
            \$table->string('state');
            \$table->string('zip_code');
            \$table->string('reference_point')->nullable();
            \$table->string('complementary')->nullable();
            \$table->enum('address_type', ['main', 'secondary']);
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
EOT

# Migration: Register Information
cat <<EOT > database/migrations/$(date +%Y_%m_%d_%H%M%S)_create_register_information_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('register_information', function (Blueprint \$table) {
            \$table->id();
            \$table->integer('receiver_id');
            \$table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            \$table->date('birthdate')->nullable();
            \$table->string('document');
            \$table->string('mother_name');
            \$table->decimal('monthly_income', 10, 2)->nullable();
            \$table->enum('type', ['PJ', 'PF']);
            \$table->date('founding_date')->nullable();
            \$table->string('site_url')->nullable();
            \$table->string('trading_name')->nullable();
            \$table->string('company_name')->nullable();
            \$table->string('name')->nullable();
            \$table->string('professional_occupation')->nullable();
            \$table->decimal('annual_revenue', 10, 2)->nullable();
            \$table->enum('corporation_type', ['LTDA', 'MEI', 'SA']);
            \$table->string('email')->nullable();
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('register_information');
    }
};
EOT

# Migration: Phones
cat <<EOT > database/migrations/$(date +%Y_%m_%d_%H%M%S)_create_phones_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('phones', function (Blueprint \$table) {
            \$table->id();
            \$table->integer('receiver_id');
            \$table->foreign('receiver_id')->references('id')->on('receivers')->onDelete('cascade');
            \$table->string('phone_number');
            \$table->enum('phone_type', ['mobile', 'landline']);
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phones');
    }
};
EOT

echo "Migrations criadas com sucesso!"

