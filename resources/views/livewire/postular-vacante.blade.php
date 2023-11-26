<div class="bg-gray-200 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">
        Postularme a esta vacante
    </h3>

    {{-- //mensaje si se postula por segunda vez --}}
    @if (session()->has('error'))
        <div class="uppercase border border-red-600 bg-red-100 text-red-600 p-2 font-bold my-5 text-sm rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    {{-- //alerta si se postulo correctamente la vacante --}}
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 p-2 font-bold my-5 text-sm rounded-lg">
            {{ session('mensaje') }}
        </div>
    @else
        <form wire:submit.prevent="postularme" class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label fot="cv" :value="__('Curriculum u hoja de vida (PDF)')" class="text-black" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full" />
            </div>
            <x-input-error :messages="$errors->get('cv')"/>
            <x-primary-button class="my-5">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif
    
</div>
