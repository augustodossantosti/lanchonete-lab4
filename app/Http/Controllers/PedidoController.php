<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = \App\Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'valor_total' => 'required|numeric',
        ];

        $messages = [
            'valor_total' => 'Informe o valor do pedido'
        ];

        $request->validate($rules, $messages);

        $pedido = new \App\Pedido();
        $pedido->cpf = $request->cpf;
        $pedido->valor_total = $request->valor_total;
        $pedido->data = date("Y-m-d H:i:s");
        $pedido->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('pedidos.index')
            ->with('status', 'Registro atualizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = \App\Pedido::findOrFail($id);

        return view('pedidos.edit',[ 'pedido' => $pedido ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'valor_total' => 'required|numeric',
        ];

        $messages = [
            'valor_total' => 'Informe o valor do pedido'
        ];

        $request->validate($rules, $messages);

        $pedido = \App\Pedido::findOrFail($id);
        $pedido->cpf = $request->cpf;
        $pedido->valor_total = $request->valor_total;
        $pedido->save();

        // Retorna para view index com uma flash message
        return redirect()
            ->route('pedidos.index')
            ->with('status', 'Registro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = \App\Pedido::findOrFail($id);

        try {
            // Exclui o registro da tabela
            $pedido->delete();
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
