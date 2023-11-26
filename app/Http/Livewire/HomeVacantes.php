<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario;

    // *recibimos los terminos emitidos desde filtrarVacantes (hijo) y se los asignamos a la funcion buscar
    Protected $listeners = [
        'terminosBusqueda' => 'buscar'
    ];

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }

    public function render()
    {
        // $vacantes = Vacante::all();

        //! El when se ejecuta unicamente si hay un termino,si lo hay se ejecuta la funcion en la variable query que le agregamos la condicion o busqueda
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE' , '%' . $this->termino . '%'); 
        })
        ->when($this->termino, function($query){
            $query->orWhere('empresa', 'LIKE' , '%' . $this->termino . '%');
        })
        ->when($this->categoria, function($query){
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function($query){
            $query->where('salario_id', $this->salario);
        })
        ->paginate(5);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
