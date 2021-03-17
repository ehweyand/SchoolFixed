<?php

namespace App\Http\Controllers;

use App\TipoServico;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TipoServicoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //        
        $tipo_servicos = TipoServico::all();

        return view('app.tipo_servico.index', ['tipo_servicos' => $tipo_servicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        $regras = [
            'descricao' => 'required'
        ];

        $feedback = [
            'required' => 'O campo descrição deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        DB::beginTransaction();
        try {
            TipoServico::create($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }


        return redirect()->route('tipo_servico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function show(TipoServico $tipoServico) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoServico $tipoServico) {
        return view('app.tipo_servico.edit', ['tipo_servico' => $tipoServico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoServico $tipoServico) {
        $regras = [
            'descricao' => 'required'
        ];

        $feedback = [
            'required' => 'O campo descrição deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        DB::beginTransaction();
        try {
            $tipoServico->update($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->route('tipo_servico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoServico $tipoServico) {
        $tipoServico->delete();
        return redirect()->route('tipo_servico.index');
    }
}
