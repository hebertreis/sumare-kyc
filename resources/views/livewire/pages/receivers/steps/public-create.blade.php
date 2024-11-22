<div class="flex items-center justify-center h-screen bg-gray-50/50">
    <div class="w-full p-8 bg-white rounded-lg shadow-lg max-w-7xl">
        <!-- Top section with logo -->
        <div class="flex items-center justify-between p-4 bg-[#3D9BE9] rounded-t-lg">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12">
            <h1 class="text-2xl font-bold text-white">Centro Universitário Sumaré</h1>
        </div>
        <!-- Main content -->
        <div class="grid grid-cols-1 gap-6 mt-4 lg:grid-cols-4">
            <div class="lg:col-span-1">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold">Comece a vender hoje no Centro Universitário Sumaré!</h2>
                    <p class="mt-2 text-sm text-gray-500">
                        Para que você tenha acesso às nossas facilidades, precisamos de alguns dados sobre você e seu negócio. Cadastre-se, leva poucos minutos!
                    </p>
                </div>
                <div class="mb-8">
                    <nav class="space-y-1">
                        @foreach ($steps as $step)
                            <div class="flex items-center gap-3 p-3 rounded-lg {{ $currentStep === $step['id'] ? 'bg-[#3D9BE9]/10' : '' }} {{ $step['completed'] || $currentStep > $step['id'] ? 'text-[#3D9BE9]' : '' }}">
                                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border {{ $currentStep === $step['id'] ? 'border-[#3D9BE9]' : '' }} {{ $step['completed'] || $currentStep > $step['id'] ? 'bg-[#3D9BE9] border-[#3D9BE9]' : '' }}">
                                    @if ($step['completed'] || $currentStep > $step['id'])
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    @else
                                        <div class="h-2 w-2 rounded-full {{ $currentStep === $step['id'] ? 'bg-[#3D9BE9]' : 'bg-gray-300' }}"></div>
                                    @endif
                                </div>
                                <span class="text-sm font-medium">{{ $step['name'] }}</span>
                            </div>
                        @endforeach
                    </nav>
                </div>
            </div>
            <div class="lg:col-span-3">
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($currentStep === 1)
                    @include('livewire.pages.receivers.steps.step1')
                @elseif ($currentStep === 2)
                    @include('livewire.pages.receivers.steps.step2')
                @elseif ($currentStep === 3)
                    @include('livewire.pages.receivers.steps.step3')
                @elseif ($currentStep === 4)
                    @include('livewire.pages.receivers.steps.step4')
                @elseif ($currentStep === 5)
                    @include('livewire.pages.receivers.steps.step5')
                @elseif ($currentStep === 6)
                    @include('livewire.pages.receivers.steps.step6')
                @endif
                <div class="flex justify-between mt-6">
                    <button
                        wire:click="prevStep"
                        class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300"
                        {{ $currentStep === 1 ? 'disabled' : '' }}
                    >
                        Anterior
                    </button>
                    <button
                        wire:click="nextStep"
                        class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600"
                        {{ $currentStep === 6 ? 'disabled' : '' }}
                    >
                        Próximo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
