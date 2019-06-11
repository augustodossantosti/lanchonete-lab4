<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;


class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ingredientes = \App\Models\Ingrediente::all();

        // Repassando para a view
        return view('ingredientes.index', compact('ingredientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cria as regras de validação dos dados do formulário
        $rules = [
            'nome' => 'required|string',
        ];

        $messages = [
            'nome' => 'Informe o nome do ingrediente',
        ];

        $request->validate($rules, $messages);

        $ingrediente = new \App\Models\Ingrediente();
        $ingrediente->nome = $request->nome;
        $ingrediente->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('ingredientes.index')
            ->with('status', 'Registro atualizado com sucesso!');
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
        $ingrediente = \App\Models\Ingrediente::findOrFail($id);

        return view('ingredientes.edit',[ 'ingrediente' => $ingrediente ]);
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
        $rules = [
            'nome' => 'required|string',
        ];

        $messages = [
            'nome' => 'Informe o nome do ingrediente',
        ];

        $request->validate($rules, $messages);

        $ingrediente = \App\Models\Ingrediente::findOrFail($id);
        $ingrediente->nome = $request->nome;
        $ingrediente->save();

        return redirect()
            ->route('ingredientes.index')
            ->with('message', 'Registro atualizado com sucesso!')
            ->with('type', 'success');
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
        $ingrediente = \App\Models\Ingrediente::findOrFail($id);

        try {
            // Exclui o registro da tabela
            $ingrediente->delete();
            $message = 'Registro excluído com sucesso';
            $type = 'success';
        } catch (\Throwable $th) {
            // Se der algum erro na exclusão ...
            $message = 'O registro não pode ser excluído.';
            // Se o erro foi por violação da restrição da chave estrangeira ...
            if (strpos($th->errorInfo[2], 'Cannot delete or update a parent row') !== false) {
                $message .= 'Este registro está sendo utilizado em outros registros.';
            }
            $type = 'danger';
        }
        // Retorna para view index com uma flash message
        return redirect()->back()
            ->with('message', $message)
            ->with('type', $type);
    }
}
