<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Livewire\Forms\ExpedienteForm;

class Expedientes extends Component
{
    use WithPagination;
    public $modalExp = false;
    public $modalEdit = false;

    public $busquedaExp = '';

    public $expedienteEncontrado;
    
    public $selectedExpediente;

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
            $this->expedienteEncontrado = \App\Models\VistaExpedientes::where('numero', 'ILIKE', '%' . $this->busquedaExp . '%')->first();
            if(!is_null($this->expedienteEncontrado)) {
            if (strlen($this->expedienteEncontrado['asunto']) > 0) {
                $this->asunto = $this->expedienteEncontrado['asunto'];
            } else {
                $this->asunto = $this->expedienteEncontrado['oficina'];
            }
            $this->causante = $this->expedienteEncontrado['causante'];
        }}else{
            $this->asunto=null;
            $this->causante=null;
        }
    }

    public function seleccionar()
    {
        $this->expedienteForm->num_exp = $this->expedienteEncontrado['numero'];
        $this->expedienteForm->asunto = $this->asunto;
        $this->expedienteForm->folio = $this->expedienteEncontrado['folio'];
        $this->expedienteForm->causante = $this->causante;
        $this->expedienteForm->fecha_ingreso = now()->format('d-m-Y'); //Establece la fecha actual
    }
    public function guardar(){
        $this->validate();
        $resultado = $this->expedienteForm->store();
        $this->modalExp=false;        
        $this->expedienteForm->num_exp=null;
        $this->expedienteForm->asunto=null;
        $this->expedienteForm->folio=null;
        $this->expedienteForm->causante=null;
        $this->expedienteForm->fecha_ingreso=null;
        $this->expedienteEncontrado=null;
    }
    public function editar($id){
        $this->modalEdit= true;
        $expediente = \App\Models\Expediente::find($id);
        $this->expedienteForm->loadExpMitiv($expediente);
        //$this->selectedExpediente=\App\Models\Expediente::find($id);
    }

    public function actualizar(){
        $this->expedienteForm->update();
        $this->modalEdit=false;
    }

    public function borrar($id){
        $expediente = \App\Models\Expediente::find($id);
        $this->expedienteForm->delete($expediente);
    }
} // fin de clase

// Video que explica cómo habilitar las ligaduras
// https://youtu.be/PRMQ7bFK3L4
// https://worldofzero.com/posts/enable-font-ligatures-vscode/