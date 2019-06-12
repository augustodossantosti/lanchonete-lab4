<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = \App\Models\Cliente::all();

        // Repassando para a view
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
        return view('clientes.create');
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
            'cpf' => 'required|string',
            'nome' => 'required|string',
            'endereco' => 'required|string',
            'cep' => 'required|string',
            'telefone' => 'required|string',
            'cidade' => 'required|string'            
        ];

        $messages = [
            'cpf' => 'Informe o cpf do cliente',
            'nome' => 'Informe o nome do cliente',
            'endereco' => 'Informe o endereco do cliente',
            'cep' => 'Informe o cep do cliente',
            'telefone' => 'Informe o telefone do cliente',
            'cidade' => 'Informe a cidade do cliente',
        ];

        $request->validate($rules, $messages);

        $cliente = new \App\Models\Cliente();
        $cliente->cpf = $request->cpf;
        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->cep = $request->cep;
        $cliente->cidade = $request->cidade;
        $cliente->telefone = $request->telefone;
        $cliente->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('clientes.index')
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
        $cliente = \App\Models\Cliente::findOrFail($id);

        return view('clientes.edit',[ 'cliente' => $cliente ]);

        //return view('clientes.edit')->withCliente($cliente);
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
            'cpf' => 'required|string',
            'nome' => 'required|string',
            'endereco' => 'required|string',
            'cep' => 'required|string',
            'cidade' => 'required|string',
            'telefone' => 'required|integer',
            
        ];

        $messages = [
            'cpf' => 'Informe o cpf do cliente',
            'nome' => 'Informe o nome do cliente',
            'endereco' => 'Informe o endereço do cliente',
            'cep' => 'Informe o cep do cliente',
            'cidade' => 'Informe a cidade do cliente',
            'telefone' => 'Informe o telefone do cliente',
        ];

        $request->validate($rules, $messages);

        $cliente = \App\Models\Cliente::findOrFail($id);
        // $cliente->cpf = $request->cpf;
        // $cliente->nome = $request->nome;
        // $cliente->endereco = $request->endereco;
        // $cliente->cep = $request->cep;
        // $cliente->cidade = $request->cidade;
        // $cliente->telefone = $request->telefone;
        // $cliente->save();
        $input = $request->all();

        $cliente->fill($input)->save();

        return redirect()
            ->route('clientes.index')
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
        $cliente = \App\Models\Cliente::findOrFail($id);

        try {
            // Exclui o registro da tabela
            $cliente->delete();
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
