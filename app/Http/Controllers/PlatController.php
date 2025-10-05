<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    public function index()
    {
        $plats = Plat::with('user')
            ->withCount('favoris as likes_count')
            ->paginate(5);

        return view('index', compact('plats'));
    }

    public function create()
    {

        if (! auth()->user()->can('create dishes')) {
            abort(403, 'Seuls les administrateur peuvent créer des plats');
        }

        return view('plats.create');
    }

    public function store(Request $request)
    {
        if (! auth()->user()->can('create dishes')) {
            abort(403, 'Seuls les administrateur peuvent créer des plats');
        }

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'recette' => 'required|string',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['likes'] = 0;

        $plat = Plat::create($validated);

        return redirect()->route('plats.create')->with('success', 'Le plat a été ajouté');
    }

    public function show(Plat $plat)
    {
        $plat->load('user');
        $plat->loadCount('favoris as likes_count');

        return view('plats.show', compact('plat'));
    }

    public function edit(Plat $plat)
    {
        if (! auth()->user()->can('create dishes')) {
            abort(403, 'Seuls les administrateur peuvent créer des plats');
        }

        return view('plats.edit', compact('plat'));
    }

    public function update(Request $request, Plat $plat)
    {
        if (! auth()->user()->can('create dishes')) {
            abort(403, 'Seuls les administrateur peuvent créer des plats');
        }
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'recette' => 'required|string',
        ]);

        $plat->update($validated);

        return redirect()->route('plats.show', $plat)->with('success', 'Plat modifié!');
    }

    public function destroy(Plat $plat)
    {
        if (! auth()->user()->can('create dishes')) {
            abort(403, 'Seuls les administrateur peuvent créer des plats');
        }

        $plat->delete();

        return redirect()->route('plats.index')->with('success', 'Plat supprimé!');
    }

    public function toggleFavorite(Plat $plat)
    {
        $user = auth()->user();
        if ($user->favoris()->where('plat_id', $plat->id)->exists()) {
            $user->favoris()->detach($plat->id);
            $message = 'Retiré des favoris';
        } else {
            $user->favoris()->attach($plat->id);
            $message = 'Ajouté au favoris';
        }

        return back()->with('success', $message);
    }
}
