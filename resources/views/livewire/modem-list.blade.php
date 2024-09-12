<div class="center-table">
    Cantidad de modems:{{$modems->count()}}
    <div> 
        <input type="text" wire:model.live="search" placeholder="Buscar por oficina..." class="form-control mb-3">
    </div>
    <div class="relative max-w-md mx-auto">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" wire:model.live="search" placeholder="Buscar por oficina..." class="block w-full p-3 pl-25 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
    </div>
    
    
    <table class="table-bordered">
        <thead>
            <tr class="bg-gray-250">
                <th><button wire:click='ordenOficina'>Oficina {!!$this->flecha('oficina')!!}</button></th>
                <th><button wire:click='ordenModelo'>Modelo{!!$this->flecha('modelo')!!}</button></th>
                <th><button wire:click='ordenNombre'>Nombre de Red{!!$this->flecha('nombre')!!}</button></th>
                <th><button wire:click='ordenClave'>Clave de Red{!!$this->flecha('clave')!!}</button></th>
                <th><button wire:click='ordenIp'>IP{!!$this->flecha('ip')!!}</button></th>
                <th><button wire:click='ordenProxy'>Servidor Proxy{!!$this->flecha('proxy')!!}</button></th>
                <th><button wire:click='ordenLan'>IP-Lan{!!$this->flecha('ip_lan')!!}</button></th>
                <th><button wire:click='ordenAdmin'>Nombre admin{!!$this->flecha('usuario')!!}</button></th>
                <th><button wire:click='ordenClaveAdmin'>Clave admin{!!$this->flecha('clave2')!!}</button></th>
                <th><button wire:click='ordenMac'>MAC{!!$this->flecha('mac')!!}</button></th>
            </tr>
        </thead>
        <tbody>
            @foreach($modems as $modem)
            <tr style="text-align: center;">
                <td>{{ $modem->oficina }}</td>
                <td>{{ $modem->modelo }}</td>
                <td>{{ $modem->nombre }}</td>
                <td>{{ $modem->clave }}</td>
                <td>{{ $modem->ip }}</td>
                <td>{{ $modem->proxy }}</td>
                <td>{{ $modem->ip_lan }}</td>
                <td>{{ $modem->usuario }}</td>
                <td>{{ $modem->clave2 }}</td>
                <td>{{ $modem->mac }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>{{ $modems->links() }}</div>
</div>