<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    //

protected $fillable = [
    'transfer_day',
    'transfer_interval',
    'transfer_enabled',
    'metadata',
    'code',
    'default_bank_account_id',
    'automatic_anticipation_settings_id',
    'enabled',
    'register_address_id',
    'birthdate',
    'document',
    'mother_name',
    'monthly_income',
    'register_type',
    'founding_date',
    'phone_numbers',
    'site_url',
    'trading_name',
    'main_address',
    'name',
    'surname',
    'email',
    'isRepresentative',
    'bank',
    'accountType',
    'agency',
    'agencyDigit',
    'account',
    'accountDigit',
    'cnpj',
    'phone',
    'annual_revenue',
    'website_platform',
    'social_site',
    'fantasy_name',
    'business_reason',
    'representative_name',
    'representative_fullname',
    'representative_email',
    'representative_birthdate',
    'representative_phone',
    'representative_income',
    'representative_occupation',
    'representative_cep',
    'representative_street',
    'representative_number',
    'representative_complement',
    'representative_neighborhood',
    'representative_city',
    'representative_state',
    'representative_reference',
    'company_cep',
    'company_street',
    'company_number',
    'company_complement',
    'company_neighborhood',
    'company_city',
    'company_state',
    'company_reference',
];

}