<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadastro;
use App\Opcoes;
use PDF;
class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Coloquei um retorno de uma lista de ususarios para caso deseje futuramente listar os usuarios na view 
        //index possa acessar  pela variavel usuario.
        $usuario = Cadastro::all();
        return view('cadastro.index')->with(['usuario'=>$usuario]);
        //Fum da consulta.
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Consulta a tabela opcoes para retornar um array para view create para que o usuario 
        // possa acessar as opções.
        $opcao = Opcoes::all();
        return view('cadastro.create')->with(['opcao'=>$opcao]);
        //fim da consulta 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Trecho de validação dos campos nome, cpf e opcao_id
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|min:14',
            'opcao_id' => 'required',
        ],[
                'nome.required' =>'Insira o seu nome',
                'cpf.required' => 'Insira no minimo 14 digitos',
                'opcao_id.required' => 'Escolha uma opção'

            ]);
            //fim do codigo de validação

        $usuario = Cadastro::create($request->all());
        //Trecho de código que devolve as informações do Usuário na view pdf.blade.php
        echo '<div class="row"  align="center">';
                echo '<div class="col">';
                    echo '<h4> Nome Usuário: '.$request->nome.'</h4>';
                echo '</div>';
                echo '<div class="w-100"></div>';
                echo '<div class="col">';
                    echo '<h4> Cpf Usuário:'.$request->cpf.'</h4>';
                echo '</div>';
                echo '<div class="w-100"></div>';
                echo '<div class="col">';
                    echo '<h4> Opção escolhida pelo Usuário:'.$request->opcao_id.'</h4>';
                echo '</div>';
                echo '<div class="w-100"></div>';
                echo '<div class="col" >';
                    echo '<input  type="button" class="btn btn-primary" value="Imprimir Comprovante" onClick="window.print()"/>';
                echo '</div>';
        echo '</div>';
        //fim do codigo de informações ususario
        return view('cadastro.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
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
