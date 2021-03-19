<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;


class UsuarioController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //        
        $usuarios = User::all();

        return view('app.usuario.index', ['usuarios' => $usuarios]);
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
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'permissao' =>  'required'
        ];

        $feedback = [
            'required' => 'Todos os campos devem ser preenchido'
        ];

        $request->validate($regras, $feedback);

        DB::beginTransaction();
        try {
            User::create($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }


        return redirect()->route('usuario.index');
    }
     /**
     * Display the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario) {
        //
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario) {
        return view('app.usuario.edit', ['usuario' => $usuario]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario) {
        $regras = [
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'permissao' =>  'required'
        ];

        $feedback = [
            'required' => 'Todos os campos devem ser preenchido'
        ];

        $request->validate($regras, $feedback);

        DB::beginTransaction();
        try {
            $usuario->update($request->all());
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->route('usuario.index');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario) {
        $usuario->delete();
        return redirect()->route('usuario.index');
    }
}
