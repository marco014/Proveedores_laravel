<p>Usuario autenticado: {{ auth()->check() ? auth()->user()->email : 'No autenticado' }}</p>


@extends('proveedores.layouts')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Listado de Proveedores</h2>
    <a href="{{ route('proveedores.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nuevo Proveedor</a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('proveedores.index') }}" class="mb-4">
    <input type="text" name="buscar" value="{{ $buscar ?? '' }}" placeholder="Buscar proveedor..." class="w-full md:w-1/3 px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
</form>

<div class="overflow-x-auto">
    <table class="w-full bg-white shadow rounded-lg">
        <thead class="bg-gray-50">
        <tr>
            <th class="p-3 text-left">#</th>
            <th class="p-3 text-left">Nombre</th>
            <th class="p-3 text-left">Email</th>
            <th class="p-3 text-left">Teléfono</th>
            <th class="p-3 text-left">Dirección</th>
            <th class="p-3 text-left">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse($proveedores as $index => $proveedor)
        <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
            <td class="p-3">{{ $loop->iteration + ($proveedores->firstItem() - 1) }}</td>
            <td class="p-3">{{ $proveedor->nombre }}</td>
            <td class="p-3">{{ $proveedor->email }}</td>
            <td class="p-3">{{ $proveedor->telefono }}</td>
            <td class="p-3">{{ $proveedor->direccion }}</td>
            <td class="p-3 space-x-2">
            <a href="{{ route('proveedores.show', $proveedor->id) }}" class="text-indigo-600 hover:text-indigo-900">Ver</a>
            <a href="{{ route('proveedores.edit', $proveedor) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
            <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Desea eliminar este proveedor?');" class="text-red-600 hover:text-red-900">Eliminar</button>
            </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="p-3 text-center text-gray-500">No se encontraron proveedores.</td>
        </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $proveedores->appends(['buscar' => $buscar])->links() }}
</div>
@endsection
