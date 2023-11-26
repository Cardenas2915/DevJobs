<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{   
    Use WithFileUploads;
    public $cv;
    public $vacante;

    Protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {

        //almacenar CV en el disco duro
        $datos = $this->validate();

        // validar que el usuario no haya postulado a la vacante
        if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
            session()->flash('error', 'Ya postulaste a esta vacante anteriormente');
            
        }else{
            $cv = $this->cv->store('public/cv');
            $datos['cv'] = str_replace('public/cv/', '', $cv);

            //crear la candidato a la vacante
            $this->vacante->candidatos()->create([
                'user_id' => auth()->user()->id,
                'cv' => $datos['cv']
            ]);

            //crear notificacion y enviar email - se tiene que crear una relacion en el modelo
            //se utiliza el modelo de vacante y se usa la relacion de reclutador para enviar la notificacion pasandole parametros
            $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

            //mostrar el usuario mensaje de ok
            session()->flash('mensaje', 'se envio correctamente tu informacion, mucha suerte');
            return redirect()->back();
        }
        
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
