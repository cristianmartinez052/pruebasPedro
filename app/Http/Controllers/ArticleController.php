<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $total=article::all()->count();
        $articulos = article::orderby('id', 'desc')->paginate(8);
        return view('articles.index', compact('articulos','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
         //Hacemos las validaciones de todos los campos
         $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:articles,nombre'],
            'descripcion' => ['required', 'string', 'min:10'],
            'stock' => ['required', 'integer', 'min:1'],
            'estado' => ['required']
        ]);

        Article::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'stock' => $request->stock,
            'estado' => $request->estado,
        ]);
        return redirect()->route('articles.index')->with('mensaje', 'Articulo creado correctamente!!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        return view('articles.info', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
         //Hacemos las validaciones de todos los campos
         $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:articles,nombre,'.$article->id],
            'descripcion' => ['required', 'string', 'min:10'],
            'stock' => ['required', 'integer', 'min:1'],
            'estado' =>['required']
        ]);
        //actualizamos el registro
       
        $article->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'stock' => $request->stock,
            'estado'=>$request->estado
        ]);
        //mostramos mensaje  retornamos a index
        return redirect()->route('articles.index')->with('mensaje', "Articulo editado correctamente!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
        return redirect()->route('articles.index')->with('mensaje','Artículo con id '.$article->id.' borrado correctamente');
    }
}
