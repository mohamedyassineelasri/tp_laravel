<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<body>
    <h1>Liste des Produits</h1>
    <a href="{{ route('produits.create') }}" class="btn btn-success">Créer un Produit</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Libellé</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->libelle }}</td>
                    <td>{{ $produit->marque }}</td>
                    <td>{{ $produit->prix }}$</td>
                    <td>{{ $produit->stock }}</td>
                    <td>{{ $produit->image }}</td>
                    <td>
                        <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-info">Détails</a>
                        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('produits.destroy', $produit->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

