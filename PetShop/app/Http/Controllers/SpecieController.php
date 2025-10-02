<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    public function index()
    {
        $species = Specie::all(); // busca todas as espécies
        return view("species.index", compact("species")); // envia para a view
    }

    public function create()
    {
        return view("species.create");
    }

    public function store(Request $request)
    {
        Specie::create($request->all());

        return redirect()->route("species.index")->with('success', 'Espécie criada com sucesso!');
    }

    public function edit(Specie $specie)
    {
        return view("species.edit", compact("specie"));
    }

    public function update(Request $request, Specie $specie)
    {
        $specie->update($request->all());
        return redirect()->route("species.index")->with('success', 'Espécie atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $specie = Specie::findOrFail($id);
        $specie->delete();

        return redirect()->route("species.index")->with('success', 'Espécie excluída com sucesso!');
    }
}
