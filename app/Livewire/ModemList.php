<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ModemList extends Component
{
    use WithPagination;
    public $ordenColumna = 'id';
    public $direction = 'asc';
    public $search = '';

    public function render()
    {
        $modems = $this->getModems();
        return view('livewire.modem-list', [
            'modems' => $modems
        ]);
    }
    public function getModems()
    {
        $query = \App\Models\Modem::query();
        if (strlen($this->search) > 0) {
            $query->whereAny(['oficina', 'modelo'], 'ILIKE', '%' . $this->search . '%');
        }
        // Ordenar los resultados de acuerdo a la columna y la dirección especificada
        return $query->orderBy($this->ordenColumna, $this->direction)->paginate(10);
    }

    public function ordenOficina()
    {
        $this->ordenarPor('oficina');
    }

    public function ordenModelo()
    {
        $this->ordenarPor('modelo');
    }

    public function ordenNombre()
    {
        $this->ordenarPor('nombre');
    }

    public function ordenClave()
    {
        $this->ordenarPor('clave');
    }

    public function ordenIp()
    {
        $this->ordenarPor('ip');
    }
    public function ordenProxy()
    {
        $this->ordenarPor('proxy');
    }

    public function ordenLan()
    {
        $this->ordenarPor('ip_lan');
    }

    public function ordenAdmin()
    {
        $this->ordenarPor('usuario');
    }

    public function ordenClaveAdmin()
    {
        $this->ordenarPor('clave2');
    }

    public function ordenMac()
    {
        $this->ordenarPor('mac');
    }
    private function ordenarPor($columna)
    {
        // Si ya estás ordenando por la misma columna, alterna la dirección
        if ($this->ordenColumna === $columna) {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            // Si es una nueva columna, establece la dirección en ascendente
            $this->direction = 'asc';
        }

        $this->ordenColumna = $columna;
    }
    public function flecha($columna)
    {
        if ($this->ordenColumna === $columna) {
            return $this->direction === 'asc' ? '↑' : '↓';
        }
        return ''; // No devuelve nada si no es la columna actual de ordenación
    }
}
