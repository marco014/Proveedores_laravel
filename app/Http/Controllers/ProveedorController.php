<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request) : View 
    {
        $buscar = $request->input('buscar');

        //Inicio una consulta al modelo Proveedor
        $query = Proveedor::query();

        //Si hay un termino de busqueda, añadimos el filtro a la consulta
        if($buscar) {
            $query ->where('nombre', 'LIKE', "%{$buscar}%")
                    ->orWhere('email', 'LIKE', "%{$buscar}%");
        }

        //Realizo la consulta (con o sin filtro) y paginamos
        $proveedores = $query->latest()->paginate(5);

        //Envio los resultados y el termino de busqueda a la vista
        return view('proveedores.index', compact('proveedores', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProveedorRequest $request) : RedirectResponse
    {
        Proveedor::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'user_id' => auth()->id(), //Aqui asignamos al usuario autenticado
        ]);

        return redirect()->route('proveedores.index')->withSuccess('Proveedor creado exitosamente');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor) : View
    {
        $this->authorizeProveedor($proveedor);
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor) : View
    {
        $this->authorizeProveedor($proveedor);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProveedorRequest $request, Proveedor $proveedor) : RedirectResponse
    {
        $this->authorizeProveedor($proveedor);
        
        $proveedor->update($request->all());
        return redirect()->route('proveedores.index')->withSuccess('Proveedor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor) : RedirectResponse
    {
        $this->authorizeProveedor($proveedor);

        $proveedor->delete();
        return redirect()->route('proveedores.index')->withSuccess('Proveedor eliminado');
    }


    //metodo para asegurar que el proveedor pertenezca al usuario autenticado
    private function authorizeProveedor(Proveedor $proveedor) {
        if ($proveedor->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para acceder a este proveedor');
        }
    }
}
