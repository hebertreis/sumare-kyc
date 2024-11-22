<!-- step1.blade.php -->
<div class="space-y-6">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="space-y-2">
            <label for="name" class="block font-medium">Nome</label>
            <x-input type="text" id="name" wire:model.defer="formData.name" placeholder="Nome" />
        </div>
        <div class="space-y-2">
            <label for="surname" class="block font-medium">Sobrenome (Completo)</label>
            <x-input type="text" id="surname" wire:model.defer="formData.surname" placeholder="Sobrenome" />
        </div>
    </div>
    <div class="space-y-2">
        <label for="email" class="block font-medium">Seu e-mail</label>
        <x-input type="email" id="email" wire:model.defer="formData.email" placeholder="email@example.com" />
        <p class="text-sm text-gray-500">Seu e-mail será usado como login da sua conta aqui no Pagar.me.</p>
    </div>
    <div class="space-y-2">
        <label class="block font-medium">Você é o representante da empresa?</label>
        <div class="flex items-center space-x-2">
            <input type="radio" id="representative_yes" name="isRepresentative" wire:model.defer="formData.isRepresentative" value="1">
            <label for="representative_yes">Sim</label>
        </div>
        <div class="flex items-center space-x-2">
            <input type="radio" id="representative_no" name="isRepresentative" wire:model.defer="formData.isRepresentative" value="0">
            <label for="representative_no">Não</label>
        </div>
    </div>
</div>