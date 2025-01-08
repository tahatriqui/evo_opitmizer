@extends('dashboard')

@section('content')
    <style>
        /* Add custom CSS for the form container */
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        /* Center the form on the page */
        body {
            background-color: #f8f9fa;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <form action="route('admin.store_par') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nom">Article</label>
                                <input type="text" class="form-control" name="Article" id="Article"
                                    placeholder="Article">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nom"></label>
                                <input type="text" class="form-control" name="Unité" id="Unité"
                                    placeholder="Unité">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nom">Paramètre</label>
                                <input type="text" class="form-control" name="Paramètre" id="Paramètre"
                                    placeholder="Paramètre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_id">produit</label>
                            <select name="product_id" id="product_id" class="form-control">
                                <option selected>Choisir le produit</option>
                                @foreach ($produits as $produit)
                                    <option value="{{ $produit->id }}">{{ $produit->nom_pro }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
