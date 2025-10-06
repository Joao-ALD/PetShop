<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\Specie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        $breeds = Breed::all();
        $species = Specie::all();
        $owners = Owner::all();
        return view('pets.index', compact('pets', 'breeds', 'species', 'owners'));
    }
    public function create()
    {
        $pets = Pet::all();
        $breeds = Breed::all();
        $species = Specie::all();
        $owners = Owner::all();

        return view("pets.create", compact("pets", "breeds", "species", "owners"));
    }

    public function store(Request $request)
    {
        $request->validate(['photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads', 'public');
            $data['photo'] = $path;
        }

        pet::create($data);
        // Redirecionamento para a lista de pets com uma mensagem de sucesso
        return redirect()->route("pets.index")->with('success', "Pet cadastrado com sucesso");
    }

    public function edit(pet $pet)
    {
        $breeds = Breed::all();
        $species = Specie::all();
        $owners = Owner::all();

        return view("pets.edit", compact("pet", "breeds", "species", "owners"));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate(['photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            if ($request->hasFile('photo')) {
                // Deletar o registro da photo do pet se existir
                if ($pet->photo) {
                    Storage::disk('public')->delete($pet->photo);
                }
                $path = $request->file('photo')->store('uploads', 'public');
                $data['photo'] = $path;
            }
        }

        $pet->update($data);
        // Redirecionamento para a lista de pets com uma mensagem de sucesso
        return redirect()->route("pets.index")->with('success', "Pet atualizado com sucesso");
    }

    public function destroy(Pet $pet)
    {
        // deletar o registro da foto do pet se existir
        if ($pet->photo) {
            Storage::disk('public')->delete($pet->photo);
        }

        $pet->delete();
        return redirect()->route("pets.index")->with('success', "Pet deletado com sucesso");
    }
}
