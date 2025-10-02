<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('owners', 'public');
            $data['photo'] = $path;
        }

        Owner::create($data);

        return redirect()->route('owners.index')->with('success', 'Tutor cadastrado com sucesso!');
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            // Apaga a foto antiga se existir
            if ($owner->photo) {
                Storage::disk('public')->delete($owner->photo);
            }
            $path = $request->file('photo')->store('owners', 'public');
            $data['photo'] = $path;
        }

        $owner->update($data);

        return redirect()->route('owners.index')->with('success', 'Tutor atualizado com sucesso!');
    }

    public function destroy(Owner $owner)
    {
        // Apaga a foto do storage se existir
        if ($owner->photo) {
            Storage::disk('public')->delete($owner->photo);
        }

        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Tutor deletado com sucesso!');
    }
}
