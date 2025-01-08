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
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="5"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image" enctype="multipart/form-data">
                            </div>
                            <div class="form-group">
                                <label for="categorie">Catégorie</label>
                                <select name="categorie_id" id="categorie_id" class="form-control">
                                    <option selected>Choisir la catégorie</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom_cat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sous_categorie">Sous Catégorie</label>
                            <select name="scategorie_id" id="sous_categorie_id" class="form-control">
                                <option selected>Choisir le sous-catégorie</option>
                                @foreach ($scategories as $scategorie)
                                    <option value="{{ $scategorie->id }}">{{ $scategorie->name }}</option>
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
