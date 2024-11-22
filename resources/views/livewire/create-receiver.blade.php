<?php
    
?>

<div>
    <form wire:submit.prevent="submit">
        @if ($currentStep == 1)
            <x-input label="Transfer Day" wire:model="transfer_day" />
            <x-input label="Transfer Interval" wire:model="transfer_interval" />
            <x-checkbox label="Transfer Enabled" wire:model="transfer_enabled" />
            <x-button label="Next" wire:click="nextStep" />
        @endif

        @if ($currentStep == 2)
            <x-input label="Metadata" wire:model="metadata" />
            <x-input label="Code" wire:model="code" />
            <x-button label="Previous" wire:click="previousStep" />
            <x-button label="Next" wire:click="nextStep" />
        @endif

        @if ($currentStep == 3)
            <x-input label="Account Number" wire:model="account_number" />
            <x-input label="Bank" wire:model="bank" />
            <x-input label="Branch Number" wire:model="branch_number" />
            <x-input label="Holder Document" wire:model="holder_document" />
            <x-input label="Holder Type" wire:model="holder_type" />
            <x-input label="Account Check Digit" wire:model="account_check_digit" />
            <x-input label="Type" wire:model="type" />
            <x-input label="Holder Name" wire:model="holder_name" />
            <x-button label="Previous" wire:click="previousStep" />
            <x-button label="Next" wire:click="nextStep" />
        @endif

        @if ($currentStep == 4)
            <x-input label="Delay" wire:model="delay" />
            <x-input label="Days" wire:model="days" />
            <x-input label="Volume Percentage" wire:model="volume_percentage" />
            <x-input label="Anticipation Type" wire:model="anticipation_type" />
            <x-checkbox label="Anticipation Enabled" wire:model="anticipation_enabled" />
            <x-button label="Previous" wire:click="previousStep" />
            <x-button label="Next" wire:click="nextStep" />
        @endif

        @if ($currentStep == 5)
            <x-input label="Birthdate" wire:model="birthdate" />
            <x-input label="Document" wire:model="document" />
            <x-input label="Mother Name" wire:model="mother_name" />
            <x-input label="Monthly Income" wire:model="monthly_income" />
            <x-input label="Register Type" wire:model="register_type" />
            <x-input label="Founding Date" wire:model="founding_date" />
            <x-input label="Phone Numbers" wire:model="phone_numbers" />
            <x-input label="Site URL" wire:model="site_url" />
            <x-input label="Trading Name" wire:model="trading_name" />
            <x-button label="Previous" wire:click="previousStep" />
            <x-button label="Next" wire:click="nextStep" />
        @endif

        @if ($currentStep == 6)
            <x-input label="Main Address Reference Point" wire:model="main_address.reference_point" />
            <x-input label="Main Address City" wire:model="main_address.city" />
            <x-input label="Main Address Street" wire:model="main_address.street" />
            <x-input label="Main Address Street Number" wire:model="main_address.street_number" />
            <x-input label="Main Address Neighborhood" wire:model="main_address.neighborhood" />
            <x-input label="Main Address State" wire:model="main_address.state" />
            <x-input label="Main Address Complementary" wire:model="main_address.complementary" />
            <x-input label="Main Address Zip Code" wire:model="main_address.zip_code" />
            <x-button label="Previous" wire:click="previousStep" />
            <x-button label="Next" wire:click="nextStep" />
        @endif

        @if ($currentStep == 7)
            <x-input label="Company Name" wire:model="company_name" />
            <x-input label="Name" wire:model="name" />
            <x-input label="Professional Occupation" wire:model="professional_occupation" />
            <x-input label="Annual Revenue" wire:model="annual_revenue" />
            <x-input label="Corporation Type" wire:model="corporation_type" />
            <x-input label="Email" wire:model="email" />
            <x-button label="Previous" wire:click="previousStep" />
            <x-button label="Next" wire:click="nextStep" />
        @endif

        @if ($currentStep == 8)
            <x-input label="Address Reference Point" wire:model="address.reference_point" />
            <x-input label="Address City" wire:model="address.city" />
            <x-input label="Address Street" wire:model="address.street" />
            <x-input label="Address Street Number" wire:model="address.street_number" />
            <x-input label="Address Neighborhood" wire:model="address.neighborhood" />
            <x-input label="Address State" wire:model="address.state" />
            <x-input label="Address Complementary" wire:model="address.complementary" />
            <x-input label="Address Zip Code" wire:model="address.zip_code" />
            <x-button label="Previous" wire:click="previousStep" />
            <x-button type="submit" label="Submit" />
        @endif
    </form>
</div>