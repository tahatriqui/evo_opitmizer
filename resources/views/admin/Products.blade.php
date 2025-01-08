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
                                        <th>image de produit</th>
                                        <th>category</th>
                                        <th>sous category</th>
                                        <th>date d'ajoute</th>
                                        <th>les actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->nom_pro }}</td>
                                            <td><img style="width:auto;height:70px"
                                                    src="{{ asset('images/' . $product->img_pro) }}" alt=""></td>
                                            <td>{{ $product->Category->nom_cat }}</td>
                                            <td>{{ $product->sCategory->name }}</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.edit_pro', $product->id) }}"
                                                    class="me-2 btn btn-primary">Modifier</a>
                                                <form action="{{ route('admin.delete_pro', $product->id) }}" method="POST"
                                                    style="display:inline-block;">
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
                                {{ $products->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
