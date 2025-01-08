@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Les commandes</h4>
                    </div>
                    @session('delete')
                        <div class="alert alert-danger"> {{ session('delete') }}</div>
                    @endsession
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table display table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom </th>
                                        <th>Téléphone</th>
                                        <th>E-mail</th>
                                        <th>nationalité</th>
                                        <th>Message</th>
                                        <th>Catégorie de produit </th>
                                        <th>Modèle de produit </th>
                                        <th>la date d'envoi</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th>{{ $order->name }}</th>
                                            <th>{{ $order->phone }}</th>
                                            <th>{{ $order->email }}</th>
                                            <th>{{ $order->country }}</th>
                                            <th>{{ $order->message }}</th>
                                            <th>{{ $order->prod_cat }}</th>
                                            <th>{{ $order->prod_mod }}</th>
                                            <th>{{ $order->created_at }}</th>
                                            <td>
                                                <a href="{{ route('admin.order.delete', $order->id) }}"> <i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
