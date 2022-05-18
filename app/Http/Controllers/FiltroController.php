<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('View.filtro');
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $tema= $request->tema??"";
    $tema = "%$tema%";
    $titulo = $request->titulo??"";
    $titulo = "%$titulo%";

    $sql ="SELECT * FROM repositorio r INNER JOIN (repotema rt 
       INNER JOIN tema t ON rt.tema_id=t.id) 
       ON rt.repositorio_id = r.id 
       INNER JOIN detallerepo dr ON dr.repositorio_id=r.id 
       INNER JOIN (usuario u  INNER JOIN usuariorol ur ON ur.usuario_id=u.id)
       ON u.id=r.usuario_id 
       WHERE upper(trim(t.descripcion)) like upper(trim(:tema)) AND 
        dr.material_id like :tipo AND
        upper(trim(r.documento)) like upper(trim(:titulo))";

       $parametros= ['tema'=> $tema,
        'titulo'=> $titulo];

        $query=DB::raw($sql2);
        $resultados= DB::select(DB::raw($sql2),$parametros);
            //dd ($repositorios); exit;

        return view ('View.filtro', compact('resultados'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
