<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-white my-3">{{ $vacante->titulo }}</h3>
        <div class="md:grid md:grid-cols-2 bg-gray-600 p-4 my-10">
            <p class="font-bold text-sm uppercase text-white my-2">Empresa:
                <span class="normal-case font-normal"> {{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-white my-2">Ultimo dia para postularse:
                <span class="normal-case font-normal"> {{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-white my-2">Categoria:
                <span class="normal-case font-normal"> {{ $vacante->categoria->categoria }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-white my-2">Salario:
                <span class="normal-case font-normal"> {{ $vacante->salario->salario}}</span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ 'imagen vacante' . $vacante->titulo }}">
        </div>
        <div class="text-white md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripcion del puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-200 border-dashed p-5 text-center">
            <p>
                ¿Desea aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest

    {{-- la funcion cannot es para mostrar la vista a los usuarios que estan definidos en el policy de vacante y se le pasa el modelo a usar --}}
    {{-- *en este caso revisa que el usuario dev no pueda crear vacantes --}}
    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot
        
</div>
