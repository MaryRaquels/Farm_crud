<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public readonly Produto $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function index()
    {
        $produto = $this->produto->all();
        return view('produtos', ['produtos' => $produtos]);   
    }

    public function create()
    {
        return view('livro_create');    
    }

    public function store(StoreUpdateRequest $request)
    {
        $created = $this->livro->create([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'paginas' => $request->input('paginas'),
        ]);
        if($created){
            return redirect()->back()->with('message', 'Adicionado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');
    }

    public function show(string $id)
    {
        //return view('livros', ['livro' => $livro]);
    }

    public function edit(Livro $livro)
    {
        return view('livro_edit', ['livro' => $livro]);
    }

    public function update(StoreUpdateRequest $request, string $id)
    {
        $updated = $this->livro->where('id', $id)->update($request->except(['_token', '_method']));
        if($updated){
            return redirect()->back()->with('message', 'Atualizado com sucesso!');
        }

        return redirect()->back()->with('message', 'Ops!Algo deu errado');

    }   

    public function destroy(string $id)
    {
        $this->livro->where('id', $id)->delete();

        return redirect()->route('livros.index');
    }
}
