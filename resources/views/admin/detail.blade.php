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
                                        <th>Nom de produit</th>
                                        <th>Poids en ordre de marche (kg) </th>
                                        <th>Capacité du godet (m³)</th>
                                        <th>Puissance nominale (kW)</th>
                                        <th>Charge nominale (kg)</th>
                                        <th>Charge du godet (m³)</th>
                                        <th>Lame semi-U (m3)</th>
                                        <th>Largeur de voie (mm)</th>
                                        <th>Capacité de levage nominale (t)</th>
                                        <th>Flèche allongée (m)</th>
                                        <th>Puissance du moteur (kW/tr/min)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <th>{{ $detail->Product->nom_pro }}</th>
                                            <th>{{ $detail->{'Poids en ordre de marche (kg)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Capacité du godet (m³)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Puissance nominale (kW)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Charge nominale (kg)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Charge du godet (m³)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Lame semi-U (m3)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Largeur de voie (mm)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Capacité de levage nominale (t)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Flèche allongée (m)'} ?? '-' }}</th>
                                            <th>{{ $detail->{'Puissance du moteur (kW/tr/min)'} ?? '-' }}</th>
                                            <td>
                                                <a href=""> <i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $details->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
