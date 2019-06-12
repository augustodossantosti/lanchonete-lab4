<?php

namespace App\Http\Controllers;

use App\Lanche;
use Illuminate\Http\Request;

class LancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lanches = \App\Lanche::all();
        return view('lanches.index', compact('lanches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('lanches.create');
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
            'valor' => 'required|numeric',
        ];

        $messages = [
            'nome' => 'Informe o nome do lanche',
            'valor' => 'Informe o valor do lanche'
        ];

        $request->validate($rules, $messages);

        $lanche = new \App\Lanche();
        $lanche->nome = $request->nome;
        $lanche->valor = $request->valor;
        $lanche->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('lanches.index')
            ->with('status', 'Registro atualizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lanche  $lanche
     * @return \Illuminate\Http\Response
     */
    public function show(Lanche $lanche)
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
        $lanche = \App\Lanche::findOrFail($id);

        return view('lanches.edit',[ 'lanche' => $lanche ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lanche  $lanche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Cria as regras de validação dos dados do formulário
        $rules = [
            'nome' => 'required|string',
            'valor' => 'required|numeric',
        ];

        $messages = [
            'nome' => 'Informe o nome do lanche',
            'valor' => 'Informe o valor do lanche'
        ];

        $request->validate($rules, $messages);

        $lanche = \App\Lanche::findOrFail($id);
        $lanche->nome = $request->nome;
        $lanche->valor = $request->valor;
        $lanche->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('lanches.index')
            ->with('status', 'Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lanche = \App\Lanche::findOrFail($id);

        try {
            // Exclui o registro da tabela
            $lanche->delete();
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
