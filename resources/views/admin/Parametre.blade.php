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
                                        <th>Nom de produit</th>
                                        <th>Article</th>
                                        <th>Unité</th>
                                        <th>Paramètre</th>
                                        <th>les actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parametres as $parametre)
                                        <tr>
                                            <td>{{ $parametre->Product->nom_pro }}</td>
                                            <td>{{ $parametre->Article }}</td>
                                            <td>{{ $parametre->Unité }}</td>
                                            <td>{{ $parametre->Paramètre }}</td>
                                            <td>

                                                <form action="{{ route('admin.delete_par', $parametre->id) }}"
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
                                {{ $parametres->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
