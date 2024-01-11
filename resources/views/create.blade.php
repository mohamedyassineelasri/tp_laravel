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
    @if($errors->any())
            <div class="alert alert-danger">
                <h5>Errors : </h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Créer un Produit</h1>

        <form action="{{ route('produits.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="libelle">Libellé:</label>
                <input type="text" name="libelle" class="form-control" >
            </div>

            <div class="form-group">
                <label for="marque">Marque:</label>
                <input type="text" name="marque" class="form-control" >
            </div>

            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="text" name="prix" step="0.01" class="form-control" >
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" name="stock" class="form-control" >
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>

</body>
</html>
