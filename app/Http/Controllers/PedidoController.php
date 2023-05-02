<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Article;


class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pedidos = Pedido::orderBy('id', 'desc')->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $articulos = article::orderBy('id', 'desc');
        return view('pedidos.create', compact('articulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        //Hacemos las validaciones de todos los campos
        $request->validate([
            'producto' => ['required', 'string', 'min:3'],
            'cantidad' => ['required', 'integer', 'min:1'],
            'sede' => ['required', 'string', 'min:5'],

        ]);

        Pedido::create([
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'sede' => $request->sede,

        ]);

        $pedido = new Pedido();
        $pedido->updateStock($request->id,$request->cantidad);
        
        return redirect()->route('dashboard')->with('mensaje', 'Pedido creado correctamente!!');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
