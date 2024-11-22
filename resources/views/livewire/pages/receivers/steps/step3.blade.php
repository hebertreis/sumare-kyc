<!-- step3.blade.php -->
<div class="space-y-6">
    <div class="space-y-2">
        <label for="representative_name" class="block font-medium">Nome</label>
        <x-input type="text" id="representative_name" wire:model.defer="formData.representative_name" placeholder="Como no seu documento de identificação" />
    </div>
    <div class="space-y-2">
        <label for="representative_fullname" class="block font-medium">Sobrenome (completo)</label>
        <x-input type="text" id="representative_fullname" wire:model.defer="formData.representative_fullname" placeholder="Sobrenome" />
    </div>
    <div class="space-y-2">
        <label for="representative_email" class="block font-medium">Seu e-mail</label>
        <x-input type="email" id="representative_email" wire:model.defer="formData.representative_email" placeholder="email@email.com.br" />
    </div>
    <div class="space-y-2">
        <label for="representative_birthdate" class="block font-medium">Data de nascimento</label>
        <x-input type="text" id="representative_birthdate" wire:model.defer="formData.representative_birthdate" placeholder="DD/MM/AAAA" />
    </div>
    <div class="space-y-2">
        <label for="representative_phone" class="block font-medium">Telefone celular</label>
        <x-input type="tel" id="representative_phone" wire:model.defer="formData.representative_phone" placeholder="(00) 0000-0000" />
    </div>
    <div class="space-y-2">
        <label for="representative_income" class="block font-medium">Renda mensal</label>
        <x-input type="text" id="representative_income" wire:model.defer="formData.representative_income" placeholder="R$ 0,00" />
    </div>
    <div class="space-y-2">
        <x-select
            label="Ocupação profissional"
            :async-data="route('ocupacoes.search')"
            wire:model.defer="formData.representative_occupation"
            option-label="title"
            option-value="title"
         
        />
    </div>
</div>