<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Forms\ExpedienteForm;

class Expedientes extends Component
{
    use WithPagination;
    public $modalExp = false;

    public $busquedaExp = '';

    public $expedienteEncontrado;

    public $asunto;

    public $causante;

    public ExpedienteForm $expedienteForm;

    public function render()
    {
        $expedientes = $this->getExp();
        //$expedienteEncontrado = $this->buscar();
        return view('livewire.expedientes', [
            'expedientes' => $expedientes
            //'expedienteEncontrado' => $expedienteEncontrado
        ]);
    }
    public function getExp()
    {
        $query = \App\Models\Expediente::query();
        return $query->paginate(10);
    }
    public function buscar()
    {
        if (strlen($this->busquedaExp) > 0) {
            $this->expedienteEncontrado = \App\Models\ExpMitiv::where('numero', 'ILIKE', '%' . $this->busquedaExp . '%')->first();
            if (strlen($this->expedienteEncontrado['asunto']) > 0) {
                $this->asunto = $this->expedienteEncontrado['asunto'];
            } else {
                $this->asunto = \App\Models\TipoAsunto::where('id', $this->expedienteEncontrado['asunto_id'])->first()->nombre;
            }
            $this->causante = \App\Models\Causante::where('id', $this->expedienteEncontrado['causante_id'])->first()->nombre;
        }
    }

    public function guardar()
    {

        $this->expedienteForm->num_exp = $this->expedienteEncontrado['numero'];
        $this->expedienteForm->asunto = $this->asunto;
        $this->expedienteForm->folio = $this->expedienteEncontrado['folio'];
        $this->expedienteForm->causante = $this->causante;
        $this->validate();
        $resultado = $this->expedienteForm->store();
    }
} // fin de clase

// Video que explica cómo habilitar las ligaduras
// https://youtu.be/PRMQ7bFK3L4
// https://worldofzero.com/posts/enable-font-ligatures-vscode/