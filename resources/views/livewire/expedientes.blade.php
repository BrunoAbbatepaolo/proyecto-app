<div>
<div class="flex justify-center py-3">
    <button type="button" class="bg-gray-300 hover:bg-blue-200 text-black font-bold py-2 px-5 rounded" wire:click="$set('modalExp', true)">
        Cargar Expediente
    </button>
</div>

<div>
    <div class="flex flex-wrap gap-4">
        <div class="flex-1 min-w-[200px]">
            <x-label value="Número"/>
            <x-input wire:model="expedienteForm.num_exp"/>
            <x-input-error for="expedienteForm.num_exp"/>
        </div>
    
        <div class="flex-1 min-w-[200px]">
            <x-label value="Folio"/>
            <x-input wire:model="expedienteForm.folio"/>
            <x-input-error for="expedienteForm.folio"/>
        </div>
    
        <div class="flex-1 min-w-[200px]">
            <x-label value="Causante"/>
            <x-input wire:model="expedienteForm.causante"/>
            <x-input-error for="expedienteForm.causante"/>
        </div>
    
        <div class="flex-1 min-w-[200px]">
            <x-label value="Asunto"/>
            <x-input wire:model="expedienteForm.asunto"/>
            <x-input-error for="expedienteForm.asunto"/>
        </div>
    
        <div class="flex-1 min-w-[200px]">
            <x-label value="Ofi-Salida"/>
            <x-input wire:model="expedienteForm.ofi_salida"/>
            <x-input-error for="expedienteForm.ofi_salida"/>
        </div>
    
        <div class="flex-1 min-w-[200px]">
            <x-label value="Fecha-Salida"/>
            <x-input wire:model="expedienteForm.fecha_salida"/>
            <x-input-error for="expedienteForm.fecha_salida"/>
        </div>
    </div>

<div class="my-3 flex justify-center">
    <x-button-blue wire:click="guardar">Guardar</x-button-blue>
</div>
</div>

<div class="flex justify-center">
    <table class="border-gray-300 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="px-4 py-2 border border-gray-300">Número</th>
                <th class="px-4 py-2 border border-gray-300">NºFojas</th>
                <th class="px-4 py-2 border border-gray-300">Fecha Ingreso</th>
                <th class="px-4 py-2 border border-gray-300">Causante</th>
                <th class="px-4 py-2 border border-gray-300">Asunto</th>
                <th class="px-4 py-2 border border-gray-300">Oficina Salida</th>
                <th class="px-4 py-2 border border-gray-300">Fecha Salida</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expedientes as $expediente)
            <tr class="text-center hover:bg-blue-200">
                <td class="px-4 py-2 border border-gray-300">{{ $expediente->num_exp }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $expediente->folio }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $expediente->fecha_ingreso }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $expediente->causante }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $expediente->asunto }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $expediente->ofi_salida }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $expediente->fecha_salida }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    <x-dialog-modal wire:model="modalExp">
        <x-slot:title>Busqueda de Expedientes</x-slot:title>
        <x-slot:content>
            <!-- Campo de búsqueda -->
            <div class="flex justify-center" >
                <input type="text" wire:model="busquedaExp" placeholder="Buscar expediente" wire:keydown.enter="buscar"/>
                <button wire:click="buscar" class="bg-gray-300 hover:bg-blue-200 text-black font-bold py-2 px-5 rounded">Buscar</button>
            </div>
    
            <!-- Mostrar el expediente encontrado si existe -->
            @if(strlen($busquedaExp)>0&&$expedienteEncontrado)
            <div class="my-3">
                <label>Numº Expediente</label>
                <input type="text" value="{{ $expedienteEncontrado['numero'] }}" class="w-full rounded" readonly/>
            </div>
            <div class="my-3">
                <label>Asunto</label>
                <input type="text" value="{{ $asunto }}" class="w-full rounded" readonly/>
            </div>
            <div class="my-3">
                <label>Fecha de Creacion</label>
                <input type="text" value="{{ $expedienteEncontrado['fecha'] }}" class="w-full rounded" readonly/>
            </div>
            @else
                <p>No se encontró ningún expediente.</p>
            @endif
        </x-slot:content>
        <x-slot:footer>
            <div class="flex gap-4">
            <x-button wire:click="$set('modalExp', false)">Cerrar</x-button>
            <x-button-blue wire:click="$set('modalExp', false)">Seleccionar</x-button-blue>
            </div>
    </x-slot:footer>
    </x-dialog-modal>
</div>
</div>