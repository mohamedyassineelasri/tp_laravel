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

        @if(session()->has('create'))
            <div class="container alert alert-info mt-5">
                {{session('create')}}
            </div>
        @endif

        @if(session()->has('update'))
        <div class="container alert alert-success mt-5">
            {{session('update')}}
        </div>
    @endif


    <div class="col-sm-4 m-5 container">
        <div class="card  w-75  m-5"  >
            <img  style="height: 350px" src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="...">
            <div class="card-body">
                <ul>
                    <li><h5 class="card-title">ID =>{{$produit->id}}</h5></li>
                    <li><h5 class="card-title">Libelle =>{{$produit->libelle}}</h5></li>
                    <li><h5 class="card-title">Marque =>{{$produit->marque}}</h5></li>
                    <li><h5 class="card-title">Prix =>{{$produit->prix}}</h5></li>
                    <li><h5 class="card-title">Stock =>{{$produit->stock}}</h5></li>
                    <li><h5 class="card-title">Image =>{{$produit->image}}</h5></li>
                    <li><h5 class="card-title">Created_at =>{{$produit->created_at}}</h5></li>
                    <li><h5 class="card-title">Updated_at =>{{$produit->updated_at}}</h5></li>
                </ul>
                <a href="{{route('produits.index')}}" class="btn btn-secondary">Quitter</a>
                <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('produits.destroy', $produit->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" >Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
