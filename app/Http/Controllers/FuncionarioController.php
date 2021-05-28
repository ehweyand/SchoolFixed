<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Setor;
use App\Funcionario;

class FuncionarioController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $funcionarios = Funcionario::all();
        $setores = Setor::all();
        return view('app.funcionario.index', ['funcionarios' => $funcionarios, 'setores' => $setores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // $setores = Setor::all();
        // return view('app.funcionario.create', ['setores' => $setores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $regras = [
            'nome' => 'required|max:100',
            'setor_id' => 'exists:setores,id',
            'cpf' => 'required|min:14|max:14',
            'rg' => 'required|min:10|max:10',
            'data_nascimento' => 'required'
        ];

        $feedback = [
            'nome.required' => 'O campo nome deve ser preenchido',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'setor_id.exists' => 'O setor não existe',
            'cpf.required' => 'O campo CPF deve ser preenchido',
            'cpf.min' => 'O campo CPF deve ter no minimo 14 caracteres',
            'cpf.max' => 'O campo CPF deve ter no máximo 14 caracteres',
            'rg.required' => 'O campo RG deve ser preenchido',
            'rg.min' => 'O campo RG deve ter no minimo 10 caracteres',
            'rg.max' => 'O campo RG deve ter no máximo 10 caracteres',
            'data_nascimento.required' => 'O campo data de nascimento deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        //Transactions Control

        DB::beginTransaction();
        try {
            //Funcionario::create($request->all());
            $myDate = $request->get('data_nascimento');
            $date = Carbon::createFromFormat('d/m/Y', $myDate)->format('Y-m-d');

            Funcionario::create([
                'nome' => $request->get('nome'),
                'setor_id' => $request->get('setor_id'),
                'cpf' => $request->get('cpf'),
                'rg' => $request->get('rg'),
                'data_nascimento' => $date
            ]);


            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            
        }

        return redirect()->route('funcionario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario) {
        $setores = Setor::all();
        return view('app.funcionario.edit', ['funcionario' => $funcionario, 'setores' => $setores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario) {
        $regras = [
            'nome' => 'required|max:100',
            'setor_id' => 'exists:setores,id',
            'cpf' => 'required|min:14|max:14',
            'rg' => 'required|min:10|max:10',
            'data_nascimento' => 'required'
        ];

        $feedback = [
            'nome.required' => 'O campo nome deve ser preenchido',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'setor_id.exists' => 'O setor não existe',
            'cpf.required' => 'O campo CPF deve ser preenchido',
            'cpf.min' => 'O campo CPF deve ter no minimo 14 caracteres',
            'cpf.max' => 'O campo CPF deve ter no máximo 14 caracteres',
            'rg.required' => 'O campo RG deve ser preenchido',
            'rg.min' => 'O campo RG deve ter no minimo 10 caracteres',
            'rg.max' => 'O campo RG deve ter no máximo 10 caracteres',
            'data_nascimento.required' => 'O campo data de nascimento deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        //Transactions Control
        DB::beginTransaction();
        try {
            $funcionario->update($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->route('funcionario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario) {
        $funcionario->delete();
        return redirect()->route('funcionario.index');
    }
}
