<!-- step5.blade.php -->
<div class="space-y-6">
    <div class="space-y-2">
        <label for="company_cep" class="block font-medium">CEP</label>
        <x-input type="text" id="company_cep" wire:model.defer="formData.company_cep" placeholder="00000-000" />
    </div>
    <div class="space-y-2">
        <label for="company_street" class="block font-medium">Rua</label>
        <x-input type="text" id="company_street" wire:model.defer="formData.company_street" placeholder="Ex. Rua Bento de Almeida..." />
    </div>
    <div class="space-y-2">
        <label for="company_number" class="block font-medium">Número</label>
        <x-input type="text" id="company_number" wire:model.defer="formData.company_number" placeholder="Ex. 1203" />
    </div>
    <div class="space-y-2">
        <label for="company_complement" class="block font-medium">Complemento</label>
        <x-input type="text" id="company_complement" wire:model.defer="formData.company_complement" placeholder="Ex. Sala 5" />
    </div>
    <div class="space-y-2">
        <label for="company_neighborhood" class="block font-medium">Bairro</label>
        <x-input type="text" id="company_neighborhood" wire:model.defer="formData.company_neighborhood" placeholder="Ex. Itaim Bibi" />
    </div>
    <div class="space-y-2">
        <label for="company_city" class="block font-medium">Cidade</label>
        <x-input type="text" id="company_city" wire:model.defer="formData.company_city" placeholder="Ex. São Paulo" />
    </div>
    <div class="space-y-2">
        <label for="company_state" class="block font-medium">Estado</label>
        <x-select id="company_state" wire:model.defer="formData.company_state" placeholder="Digite para buscar" :options="['SP' => 'São Paulo', 'RJ' => 'Rio de Janeiro', 'MG' => 'Minas Gerais']">
        </x-select>
    </div>
    <div class="space-y-2">
        <label for="company_reference" class="block font-medium">Ponto de referência</label>
        <x-input type="text" id="company_reference" wire:model.defer="formData.company_reference" placeholder="Ex. Ao lado do mercado 24h" />
    </div>
</div>