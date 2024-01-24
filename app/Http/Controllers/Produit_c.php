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
            'prix' => 'required|numeric', //numeric =khase ykon 3adad
            'stock' => 'required|integer|between:1,4',//integer =khase ykon 3adad bla facila
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // create le produit
        Produit::create([
            'libelle' => $libelle,
            'marque' => $marque,
            'prix' => $prix,
            'stock' => $stock,
            'image' => $image,
        ]);
        $produits = Produit::all('id')->last();
        return redirect()->route('produits.show',$produits->id)
        ->with('create','Votre produit est bien créé.');
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
            'stock' => 'required|integer|between:1,4',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // modifier le produit
        $produit->update($request->all());
        $id = $request->segment(2);
        return redirect()->route('produits.show',$id)
        ->with('update','Votre produit est modifier.');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')
        ->with('delete','Votre produit est supprimer.');
    }
}
