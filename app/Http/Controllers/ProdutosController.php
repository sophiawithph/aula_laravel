<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdutosController extends Controller
{
    public function index(Request $request) {
       if ($request->isMethod('POST')){
        $busca=$request->busca;

        $ord= $request->ord == 'asc' ? 'asc': 'desc';

        $prods = Produto::where('name', 'LIKE', "%{$busca}%")
             ->orderBy('name', $ord)
             ->get();
    }else{
        $prods = Produto::paginate();
        // $prods = Produto::all();
    }

        # Busca tudo com apagados
        # $prods = Produto::withTrashed()->get();

        # Busca apenas apagados
        # $prods = Produto::onlyTrashed()->get();

        return view('produtos.index', [
            'prods' => $prods,
        ]);
    }

    public function add() {
        return view('produtos.add');
    }

    public function addSave(Request $form) {
        $dados = $form->validate([
            'name' => 'required|unique:produtos|min:3',
            'price' => 'required|numeric|gte:0',
            'quantity' => 'required|integer|gte:0',
        ]);

        Produto::create($dados);

        return redirect()->route('produtos')->with('sucesso', 'Produto inserido com sucesso');
    }

    public function edit(Produto $produto) {
        // Usamos a mesma view do "add"
        return view('produtos.add', [
            'prod' => $produto,
        ]);
    }

    public function editSave(Request $form, Produto $produto) {
        $dados = $form->validate([
            'name' => [
                'required',
                Rule::unique('produtos')->ignore($produto->id),
                'min:3',
            ],
            'price' => 'required|numeric|gte:0',
            'quantity' => 'required|integer|gte:0',
        ]);

        $produto->fill($dados)->save();

        return redirect()->route('produtos')->with('sucesso', 'Produto alterado com sucesso');
    }

    public function view(Produto $produto) {
        return view('produtos.view', [
            'prod' => $produto,
        ]);
    }

    public function delete(Produto $produto) {
        return view('produtos.delete', [
            'prod' => $produto,
        ]);
    }

    public function deleteForReal(Produto $produto) {
        $produto->delete();

        return redirect()->route('produtos')->with('sucesso', 'Produto apagado com sucesso!');
    }
}
