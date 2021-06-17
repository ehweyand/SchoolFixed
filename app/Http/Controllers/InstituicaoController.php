<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Instituicao;
use App\User;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $instituicoes = Instituicao::all();
        $usuarios = User::all();
        return view('app.instituicao.index', ['instituicoes' => $instituicoes, 'usuarios' => $usuarios]);
    }

    /**     
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        return view ('app.instituicao.create', ['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $regras = [ 
            'descricao' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'uf' => 'required',
            'user_id' => 'exists:usuarios,id'
        ];

        $feedback = [
            'descricao.required' => 'O campo descrição deve ser preenchido',
            'cep.required' => 'O campo cep deve ser preenchido',
            'logradouro.required' => 'O campo logradouro deve ser preenchido',
            'complemento.required' => 'O campo complemento deve ser preenchido',
            'bairro.required' => 'O campo bairro deve ser preenchido',
            'uf.required' => 'O campo uf deve ser preenchido',
            'user_id.exists' => 'O usuário não existe'
        ];

        $request->validate($regras, $feedback);

        //Transactions Control
        DB::beginTransaction();
        try {
            Instituicao::create($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->route('instituicao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function show(Instituicao $instituicao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituicao $instituicao)
    {
        $usuarios = User::all();
        return view('app.instituicao.edit', ['instituicao' => $instituicao, 'usuarios' => $usuarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituicao $instituicao)
    {
        $regras = [
            'descricao' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'uf' => 'required',
            'user_id' => 'exists:usuarios,id'
        ];

        $feedback = [
            'descricao.required' => 'O campo descrição deve ser preenchido',
            'cep.required' => 'O campo cep deve ser preenchido',
            'logradouro.required' => 'O campo logradouro deve ser preenchido',
            'complemento.required' => 'O campo complemento deve ser preenchido',
            'bairro.required' => 'O campo bairro deve ser preenchido',
            'uf.required' => 'O campo uf deve ser preenchido',
            'user_id.exists' => 'O usuário não existe'
        ];

        $request->validate($regras, $feedback);

        //Transactions Control
        DB::beginTransaction();
        try {
            $instituicao->update($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('instituicao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instituicao $instituicao)
    {
        $servico->delete();
        return redirect()->route('instituicao.index');
    }
}
