<form action="" class="md:w-1/2 space-y-5" autocomplete="off" wire:submit.prevent='crearVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo de la vacante" />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message">
        @enderror
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario mensual')" />
        <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" wire:model="salario" id="salario">
                <option value="">--Seleccione--</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{$salario->salario}}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message">
        @enderror
    </div>
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" wire:model="categoria" id="categoria">
            <option value="">--Seleccione--</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message">
        @enderror
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Empresa: ej. Netflix, Uber, Shopify" />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message">
        @enderror
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message">
        @enderror
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripcion del puesto')" />
        <textarea wire:model="descripcion" id="descripcion" placeholder="Descripcion general del puesto..." class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72"></textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message">
        @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />
        <div class="my-5 w-96">
            @if ($imagen)
                imagen:
                <img src="{{$imagen->temporaryUrl()}}">
            @endif
        </div>
        @error('imagen')
            <livewire:mostrar-alerta :message="$message">
        @enderror
    </div>
    <x-primary-button> Crear vacante </x-primary-button>
</form>
