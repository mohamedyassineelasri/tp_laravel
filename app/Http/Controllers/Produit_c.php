<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class Produit_c extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('index', compact('produits'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $libelle = $request->libelle;
        $marque = $request->marque;
        $prix = $request->prix;
        $stock = $request->stock;
        $image = $request->image;
        // Validation
        $request->validate([
            'libelle' => 'required|string',
            'marque' => 'required|string',
            'prix' => 'required|numeric|between:1,9999', //numeric =khase ykon 3adad
            'stock' => 'required|integer|between:1,9999',//integer =khase ykon 3adad bla facila
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // create le produit
        Produit::create([
            'libelle' => $libelle,
            'marque' => $marque,
            'prix' => $prix,
            'stock' => $stock,
            'image' => $image,
        ]);

        return redirect()->route('produits.index');
    }

    public function show(Produit $produit)
    {
        return view('show', compact('produit'));
    }

    public function edit(Produit $produit)
    {
        return view('edit', compact('produit'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'libelle' => 'required|string',
            'marque' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer|between:1,9999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // modifier le produit
        $produit->update($request->all());

        return redirect()->route('produits.index');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index');
    }
}
