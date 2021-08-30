<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['catalogos']=Catalogo::paginate(4);
        return view('catalogo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('catalogo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'AutorNombre'=>'required|string|max:100',
            'AutorApellido'=>'required|string|max:100',
            'LibroNombre'=>'required|string|max:100',
             'LibroGenero'=>'required|string|max:100',
            'TapaFrontal'=>'required|max:10000|mimes:jpeg,png,jpg',
            'TapaTrasera'=>'required|max:10000|mimes:jpeg,png,jpg',    
            'EditorialNombre'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'TapaFrontal.required'=> 'La Tapa Frontal es requerida',
            'TapaTrasera.required'=> 'La Tapa Trasera  es requerida'
            
        ];
        $this->validate($request, $campos, $mensaje);


        $datosdecatalogo = request()->except('_token');
       
        if($request->hasFile('TapaFrontal')) {
            $datosdecatalogo['TapaFrontal']=$request->file('TapaFrontal')->store('uploads','public');
        }
        if($request->hasFile('TapaTrasera')) {
            $datosdecatalogo['TapaTrasera']=$request->file('TapaTrasera')->store('uploads','public');
        }
        catalogo::insert($datosdecatalogo);

return redirect('catalogo')->with('mensaje','Se agrego un nuevo libro ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function show(Catalogo $catalogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
        $catalogo=Catalogo::findOrFail($id);
        return view('catalogo.edit', compact('catalogo') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'AutorNombre'=>'required|string|max:100',
            'AutorApellido'=>'required|string|max:100',
            'LibroNombre'=>'required|string|max:100',
             'LibroGenero'=>'required|string|max:100',
            'EditorialNombre'=>'required|string|max:100',
            'Precio'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',            
        ];
        if($request->hasFile('TapaFrontal')){
           $campos=[ 'TapaFrontal'=>'required|max:10000|mimes:jpeg,png,jpg'];
        }
        if($request->hasFile('TapaFrontal')){
            $campos=[ 'TapaFrontal'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=[ 'TapaFrontal.required'=> 'La Tapa Frontal es requerida'];
         }
         if($request->hasFile('TapaTrasera')){
            $campos=[ 'TapaTrasera'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=[ 'TapaTrasera.required'=> 'La Tapa Trasera  es requerida'];
         }
        $this->validate($request, $campos, $mensaje);


        $datosdecatalogo = request()->except(['_token','_method']);

        if($request->hasFile('TapaFrontal')) {
            $catalogo=Catalogo::findOrFail($id);
            Storage::delete('public/'.$catalogo->TapaFrontal);
            $datosdecatalogo['TapaFrontal']=$request->file('TapaFrontal')->store('uploads','public');
        }
        if($request->hasFile('TapaTrasera')) {
            $catalogo=Catalogo::findOrFail($id);
            Storage::delete('public/'.$catalogo->TapaTrasera);
            $datosdecatalogo['TapaTrasera']=$request->file('TapaTrasera')->store('uploads','public');
        }
        Catalogo::where('id','=','$id')->update($datosdecatalogo);
         $catalogo=Catalogo::findOrFail($id);
         return redirect('catalogo')->with('mensaje','Se edito un libro ');
        
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogo  $catalogo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $catalogo=Catalogo::findOrFail($id);
        if(Storage::delete('public/'.$catalogo->TapaFrontal)){
            Catalogo::destroy($id);
        }
       
        return redirect('catalogo')->with('mensaje','Se elimino un libro ');
    }
}
