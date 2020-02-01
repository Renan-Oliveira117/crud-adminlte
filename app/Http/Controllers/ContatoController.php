<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

     public function relatorio(){

        $contatos=Contato::all();

        return \PDF::loadview('contato.pdf',compact('contatos'))->stream();

        //return\PDF::loadview('contato.pdf')->download('relatorio_contatos.pdf');

        //return view('contato.pdf');

     }
    public function index()
    {
        $contatos=Contato::all();
        return view('contato.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        try{ 
            $contatos= Contato::create($request->all());


        flash('Salvo Com Sucesso')->success();

        return redirect ('/contatos');


        }catch(\Exception $erro){

            flash('Erro ao Salvar')->error();

            return redirect()->back();
            
        }


        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $contato= Contato::find ($id);

        return view ('contato.form', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contato = Contato::Find($id);

        $contato->update($request->all());

        return redirect('/contatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato=Contato::find($id);
        $contato->delete();

        flash('Contato Excluido Com Sucesso')->success();

    }
}
