@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Les produits</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table display table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom de categorie</th>
                                        <th>image de categorie</th>
                                        <th>les actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $categorie)
                                        <tr>
                                            <td>{{ $categorie->nom_cat }}</td>
                                            <td><img style="width:auto;height:70px"
                                                    src="{{ asset('images/' . $categorie->img_cat) }}" alt=""></td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('admin.scategory', $categorie->id) }}">Ajouter une sous
                                                    category</a>
                                                <a href="{{ route('admin.edit_cat', $categorie->id) }}"
                                                    class="me-2 btn btn-primary">Modifier</a>
                                                <form action="{{ route('admin.delete_cat', $categorie->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div>
                                {{ $categories->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
