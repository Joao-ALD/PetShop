<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Specie; // importar o model specie
use Illuminate\Http\Request;

class BreedController extends Controller
{
    public function index()
    {
        $breeds = Breed::all();
        return view("breeds.index", compact("breeds"));
    }

    public function create()
    {
        $species = Specie::all(); // carrega todas as espécies para o select no formulário
        return view("breeds.create", compact("species"));
    }

    public function store(Request $request)
    {
        breed::create($request->all());

        return redirect()->route("breeds.index")->with('success', 'Raça criada com sucesso!');
    }

    public function edit(breed $breed)
    {
        $species = specie::all(); // carrega as espécies também para o edit
        return view("breeds.edit", compact("breed", "species"));
    }

    public function update(Request $request, breed $breed)
    {
        $breed->update($request->all());
        return redirect()->route("breeds.index")->with('success', 'Raça atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $breed = breed::findOrFail($id);
        $breed->delete();

        return redirect()->route("breeds.index")->with('success', 'Raça excluída com sucesso!');
    }
}
