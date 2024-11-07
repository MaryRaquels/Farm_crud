<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\StoreUpdateRequest;


class FornecedorController extends Controller
{
    public readonly Fornecedor $fornecedor;

    public function __construct()
    {
        $this->fornecedor = new Fornecedor();
    }

    public function index()
    {
        $fornecedores = $this->fornecedor->all();
        return view('fornecedores', ['fornecedores' => $fornecedores]);   
    }

    public function create()
    {
        return view('fornecedor_create');    
    }

    public function store(StoreUpdateRequest $request)
    {
        $created = $this->fornecedor->create([
            'nome' => $request->input('nome'),
            'quantidade' => $request->input('quantidade'),
            'valor' => $request->input('valor'),
            'validade' => $request->input('validade'),
        ]);
        if($created){
            return redirect()->back()->with('message', 'Adicionado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');
    }

    public function show(string $id)
    {
        return view('fornecedores', ['fornecedor' => $fornecedor]);
    }

    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor_edit', ['fornecedor' => $fornecedor]);
    }

    public function update(StoreUpdateRequest $request, string $id)
    {
        $updated = $this->fornecedor->where('id', $id)->update($request->except(['_token', '_method']));
        if($updated){
            return redirect()->back()->with('message', 'Atualizado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');

    }   

    public function destroy(string $id)
    {
        $this->fornecedor->where('id', $id)->delete();

        return redirect()->route('fornecedores');
    }
}