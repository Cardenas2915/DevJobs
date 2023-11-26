<div>
    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-300 mb-12">Nuestras vacantes disponibles</h3>
            <div class="shadow-sm bg-gray-800 rounded-lg p-6 divide-y divide-gray-400">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-white" href="{{ route('vacantes.show', $vacante->id) }}">{{ $vacante->titulo }}</a>
                            <p class="text-base text-gray-200 mb-1">{{ $vacante->empresa }}</p>
                            <p class="text-xs text-gray-200 mb-1">{{ $vacante->categoria->categoria }}</p>
                            <p class="text-xs text-gray-200 mb-1">{{ $vacante->salario->salario}}</p>
                            <p class="font-bold text-xs text-gray-300">Utimo dia para postularse: <span class="font-normal">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span></p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-indigo-500 uppercase font-bold text-sm text-white p-3 rounded-lg cursor-pointer block text-center" href="{{ route('vacantes.show', $vacante->id) }}">Ver vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-white">No hay vacantes aun</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
