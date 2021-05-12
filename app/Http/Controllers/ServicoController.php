<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Servico;
use App\TipoServico;

class ServicoController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $servicos = Servico::all();
        $tipo_servicos = TipoServico::all();
        return view('app.servico.index', ['servicos' => $servicos, 'tipo_servicos' => $tipo_servicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $tipo_servicos = TipoServico::all();
        return view ('app.servico.create', ['tipo_servicos' => $tipo_servicos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $regras = [
            'descricao' => 'required',
            'tipo_servico_id' => 'exists:tipo_servicos,id'
        ];

        $feedback = [
            'required' => 'O campo descrição deve ser preenchido',
            'tipo_servico_id.exists' => 'O tipo de serviço não existe'
        ];

        $request->validate($regras, $feedback);

        //Transactions Control
        DB::beginTransaction();
        try {
            Servico::create($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->route('servico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servico  $servico
     *     * @return \Illuminate\Http\Response
     */
    public function show(Servico $servico) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit(Servico $servico) {
        $tipo_servicos = TipoServico::all();
        return view('app.servico.edit', ['servico' => $servico, 'tipo_servicos' => $tipo_servicos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servico $servico) {
        $regras = [
            'descricao' => 'required'
        ];

        $feedback = [
            'required' => 'O campo descrição deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        DB::beginTransaction();
        try {
            $servico->update($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
       
        return redirect()->route('servico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico) {
        $servico->delete();
        return redirect()->route('servico.index');
    }
}
