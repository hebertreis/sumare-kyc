<!-- step4.blade.php -->
<div class="space-y-6">
    <div class="space-y-2">
        <label for="representative_cep" class="block font-medium">CEP</label>
        <x-input type="text" id="representative_cep" wire:model.defer="formData.representative_cep" placeholder="00000-000" />
    </div>
    <div class="space-y-2">
        <label for="representative_street" class="block font-medium">Rua</label>
        <x-input type="text" id="representative_street" wire:model.defer="formData.representative_street" placeholder="Ex. Rua Bento de Almeida..." />
    </div>
    <div class="space-y-2">
        <label for="representative_number" class="block font-medium">Número</label>
        <x-input type="text" id="representative_number" wire:model.defer="formData.representative_number" placeholder="Ex. 1203" />
    </div>
    <div class="space-y-2">
        <label for="representative_complement" class="block font-medium">Complemento</label>
        <x-input type="text" id="representative_complement" wire:model.defer="formData.representative_complement" placeholder="Ex. Sala 5" />
    </div>
    <div class="space-y-2">
        <label for="representative_neighborhood" class="block font-medium">Bairro</label>
        <x-input type="text" id="representative_neighborhood" wire:model.defer="formData.representative_neighborhood" placeholder="Ex. Itaim Bibi" />
    </div>
    <div class="space-y-2">
        <label for="representative_city" class="block font-medium">Cidade</label>
        <x-input type="text" id="representative_city" wire:model.defer="formData.representative_city" placeholder="Ex. São Paulo" />
    </div>
    <div class="space-y-2">
        <label for="representative_state" class="block font-medium">Estado</label>
        <x-select id="representative_state" wire:model.defer="formData.representative_state" placeholder="Digite para buscar" :options="['SP' => 'São Paulo', 'RJ' => 'Rio de Janeiro', 'MG' => 'Minas Gerais']">
        </x-select>
    </div>
    <div class="space-y-2">
        <label for="representative_reference" class="block font-medium">Ponto de referência</label>
        <x-input type="text" id="representative_reference" wire:model.defer="formData.representative_reference" placeholder="Ex. Ao lado do mercado 24h" />
    </div>
</div>