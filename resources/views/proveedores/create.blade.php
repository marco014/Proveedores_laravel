@extends('proveedores.layouts')

@section('content')
<h2 class="text-xl font-semibold mb-4">Agregar Nuevo Proveedor</h2>
<a href="{{ route('proveedores.index') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-block">&larr; Volver al listado</a>

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('proveedores.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label for="nombre" class="block text-sm font-medium">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label for="telefono" class="block text-sm font-medium">Teléfono</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" class="mt-1 block w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <label for="direccion" class="block text-sm font-medium">Dirección</label>
        <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" class="mt-1 block w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar Proveedor</button>
    </div>
</form>
@endsection
