<!-- step2.blade.php -->
<div class="space-y-6">
    <div class="space-y-2">
        <label for="cnpj" class="block font-medium">CNPJ</label>
        <x-input type="text" id="cnpj" wire:model.defer="formData.cnpj" placeholder="00.000.000/0000-00" />
    </div>
    <div class="space-y-2">
        <label for="phone" class="block font-medium">Telefone</label>
        <x-input type="tel" id="phone" wire:model.defer="formData.phone" placeholder="(00) 0000-0000" />
    </div>
    <div class="space-y-2">
        <label for="annual_revenue" class="block font-medium">Faturamento médio anual</label>
        <x-input type="text" id="annual_revenue" wire:model.defer="formData.annual_revenue" placeholder="R$ 0,00" />
    </div>
    <div class="space-y-2">
        <label for="website_platform" class="block font-medium">Plataforma do site</label>
        <x-select id="website_platform" wire:model.defer="formData.website_platform" placeholder="Select one status" :options="['WordPress', 'Shopify', 'Wix']">
        </x-select>
    </div>
    <div class="space-y-2">
        <label for="social_site" class="block font-medium">Site ou Rede Social</label>
        <x-input type="text" id="social_site" wire:model.defer="formData.social_site" placeholder="https://minhaempresa.com.br" />
    </div>
    <div class="space-y-2">
        <label for="fantasy_name" class="block font-medium">Nome fantasia</label>
        <x-input type="text" id="fantasy_name" wire:model.defer="formData.fantasy_name" placeholder="O nome fantasia da sua empresa, como 'Luiza Joias'" />
    </div>
    <div class="space-y-2">
        <label for="business_reason" class="block font-medium">Razão social</label>
        <x-input type="text" id="business_reason" wire:model.defer="formData.business_reason" placeholder="Minha Empresa LTDA." />
    </div>
</div>