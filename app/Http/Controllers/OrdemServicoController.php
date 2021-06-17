<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\OrdemServico;
use App\Servico;
use App\Instituicao;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordem_servicos = OrdemServico::all();
        $servicos = Servico::all();
        $instituicoes = Instituicao::all();
        
        return view('app.ordem_servico.index', ['ordem_servicos' => $ordem_servicos, 'servicos' => $servicos, 'instituicoes' => $instituicoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicos = Servico::all();
        $instituicoes = Instituicao::all();
        return view ('app.ordem_servico.create', ['servicos' => $servicos, 'instituicoes' => $instituicoes]);
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
            'servico_id' => 'exists:servicos,id',
            'descricao' => 'required',
            'valor' => 'required',
            'instituicao_id' => 'exists:instituicoes,id'
        ];

        $feedback = [
            'servico_id.exists' => 'O serviço não existe',
            'descricao.required' => 'O campo descrição deve ser preenchido',
            'valor.required' => 'O campo valor deve ser preenchido',
            'instituicao_id.exists' => 'O instituição não existe'
        ];

        $request->validate($regras, $feedback);

        //Transactions Control
        DB::beginTransaction();
        try {
            ordemServico::create($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->route('ordem_servico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function show(OrdemServico $ordemServico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdemServico $ordemServico)
    {
        $servicos = Servico::all();
        $instituicoes = Instituicao::all();
        
        return view('app.ordem_servico.edit', ['ordemServico' => $ordemServico, 'servicos' => $servicos, 'instituicoes' => $instituicoes]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdemServico $ordemServico)
    {
        $regras = [ 
            'servico_id' => 'exists:servicos,id',
            'descricao' => 'required',
            'valor' => 'required',
            'instituicao_id' => 'exists:instituicoes,id'
        ];

        $feedback = [
            'servico_id.exists' => 'O serviço não existe',
            'descricao.required' => 'O campo descrição deve ser preenchido',
            'valor.required' => 'O campo valor deve ser preenchido',
            'instituicao_id.exists' => 'O instituição não existe'
        ];
        $request->validate($regras, $feedback);

        //Transactions Control
        DB::beginTransaction();
        try {
            $ordemServico->update($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('ordem_servico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdemServico $ordemServico)
    {
        $ordemServico->delete();
        return redirect()->route('ordem_servico.index');
    }
}
