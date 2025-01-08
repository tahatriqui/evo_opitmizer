@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><b>{{ $category->nom_cat }}</b></h4>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary" href={{ route('admin.scategory.ajoute_scat', $category->id) }}>ajouter une sous category</a>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table display table-striped table-hover">

                                <thead>
                                    <tr>
                                        <th>Nom des sous categorie</th>
                                        <th>les actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($scategories as $scategorie)
                                        <tr>
                                            <td>{{ $scategorie->name }}</td>
                                            <td>
                                                <a href={{ route('admin.scategory.delete', $scategorie->id) }} type="submit"
                                                    class="btn btn-danger">Supprimer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
