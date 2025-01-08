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
                    <form action="{{ route('admin.update_cat', $categorie->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom_cat" id="nom_cat" placeholder="Nom"
                                    value="{{ $categorie->nom_cat }}">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="text" class="form-control" name="img_cat" value="{{ $categorie->img_cat }}"
                                    id="img_cat">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
