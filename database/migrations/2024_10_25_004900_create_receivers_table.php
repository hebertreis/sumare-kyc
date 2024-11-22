<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {   
        /*
        criar migration para laravel 11 ter uma tabela receiver que ira controlar os dados abaixo;

{
  transfer_settings: {
    transfer_day: 5,
    transfer_interval: 'Daily',
    transfer_enabled: true
  },
  metadata: 'cadastro-2.0',
  code: '123',
  default_bank_account: {
    account_number: '8877771',
    bank: '077',
    branch_number: '0001',
    holder_document: '33586973802',
    holder_type: 'individual',
    account_check_digit: '3',
    type: 'checking',
    holder_name: 'hebert reis'
  },
  automatic_anticipation_settings: {
    delay: '0',
    days: [ '30', '15' ],
    volume_percentage: '50',
    type: '1025',
    enabled: true
  },
  register_information: {
    address: {
      reference_point: '.',
      city: 'Rio de Janeiro',
      street: 'Rua conde de barca',
      street_number: '324',
      neighborhood: 'Bairro',
      state: 'RJ',
      complementary: 'complemento',
      zip_code: '12345098'
    },
    birthdate: '1900-01-01',
    document: '1123123',
    mother_name: 'Eliene',
    monthly_income: 10000,
    type: 'PJ',
    founding_date: '2000-01-01',
    phone_numbers: [ [Object], [Object] ],
    site_url: 'http://exemplo.com',
    trading_name: 'Minha Razao Social LTDA',
    main_address: {
      reference_point: 'Perto de algum lugar',
      city: 'Sao Paulo',
      street: 'Conde Barca',
      street_number: '311',
      neighborhood: 'Barieeo',
      state: 'SP',
      complementary: 'Complemento',
      zip_code: '02840-010'
    },
    company_name: 'System Express',
    name: 'Hebert',
    professional_occupation: 'Cargo de algo',
    annual_revenue: 10000,
    corporation_type: 'LTDA',
    email: '123@123.com'
  }
}

    considerando o codigo acima crie uma tabela receiver com os campos sem utilizar json, mas considerando oacima como base considerando outras tabelas para carnalidades diferentes 
    considere o conteudo do arquivo ./create_receiver_module.sh                       
        */
        Schema::create('receivers', function (Blueprint $table) {
            $table->id();
            $table->string('transfer_day')->nullable();
            $table->string('transfer_interval')->nullable();
            $table->boolean('transfer_enabled')->nullable();
            $table->string('metadata')->nullable();
            $table->string('code')->nullable();
            $table->foreignId('default_bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('cascade');
            $table->foreignId('automatic_anticipation_settings_id')->nullable()->constrained('automatic_anticipation_settings')->onDelete('cascade');
            $table->boolean('enabled')->nullable();
            $table->foreignId('register_address_id')->nullable()->constrained('addresses')->onDelete('cascade');
            $table->date('birthdate')->nullable();
            $table->string('document')->nullable();
            $table->string('mother_name')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->enum('type', ['PJ', 'PF'])->nullable();
            $table->date('founding_date')->nullable();
            $table->string('site_url')->nullable();
            $table->string('trading_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('name')->nullable();
            $table->string('professional_occupation')->nullable();
            $table->decimal('annual_revenue', 10, 2)->nullable();
            $table->enum('corporation_type', ['LTDA', 'MEI', 'SA'])->nullable();
            $table->foreignId('default_phone_id')->nullable()->constrained('phones')->onDelete('cascade');
            $table->foreignId('main_address_id')->nullable()->constrained('addresses')->onDelete('cascade');
            $table->string('email')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receivers');
    }
};
