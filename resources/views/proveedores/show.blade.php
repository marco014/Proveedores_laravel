@extends('proveedores.layouts')

@section('content')
<h2 class="text-xl font-semibold mb-4">Detalle del proveedor</h2>
<a href="{{ route('proveedores.index') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">&larr; Volver al listado</a>

<div class="bg-white shadow rounded-lg p-6 space-y-4">
    <div>
        <span class="font-medium">Nombre:</span> {{ $proveedor->nombre }}
    </div>
    <div>
        <span class="font-medium">Email:</span> {{ $proveedor->email }}
    </div>
    <div>
        <span class="font-medium">Teléfono:</span> {{ $proveedor->telefono ?? 'N/A' }}
    </div>
    <div>
        <span class="font-medium">Dirección:</span> {{ $proveedor->direccion ?? 'N/A' }}
    </div>
</div>
@endsection
