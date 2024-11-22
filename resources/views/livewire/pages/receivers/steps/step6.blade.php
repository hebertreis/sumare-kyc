<!-- step6.blade.php -->
<div class="space-y-6">
    <div class="space-y-2">
        <x-select id="bank" label="Banco" wire:model.defer="formData.bank" placeholder="Digite para buscar" :options="['001' => 'Banco do Brasil', '341' => 'Itaú', '033' => 'Santander']">
        </x-select>
    </div>
    <div class="space-y-2">
        
        <x-select label="Tipo de conta" id="accountType" wire:model.defer="formData.accountType" placeholder="Digite para buscar" :options="['checking' => 'Conta Corrente', 'savings' => 'Conta Poupança']">
        </x-select>
    </div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2 space-y-2">
            <label for="agency" class="block font-medium">Agência</label>
            <x-input type="text" id="agency" wire:model.defer="formData.agency" placeholder="Apenas números" />
        </div>
        <div class="space-y-2">
            <label for="agencyDigit" class="block font-medium">Dígito</label>
            <x-input type="text" id="agencyDigit" wire:model.defer="formData.agencyDigit" placeholder="0" />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-2 space-y-2">
            <label for="account" class="block font-medium">Conta</label>
            <x-input type="text" id="account" wire:model.defer="formData.account" placeholder="Apenas números" />
        </div>
        <div class="space-y-2">
            <label for="accountDigit" class="block font-medium">Dígito</label>
            <x-input type="text" id="accountDigit" wire:model.defer="formData.accountDigit" placeholder="00" />
        </div>
    </div>
    <p class="text-sm text-gray-500">A conta bancária informada precisa estar associada ao CNPJ da empresa.</p>
</div>
