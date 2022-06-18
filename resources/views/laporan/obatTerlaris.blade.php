@extends('layout.conquer')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>List Obat terlaris</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Obat</th>
                        <th>Nama Obat</th>
                        <th>Jumlah terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obat_terlaris as $ot)
                        <tr>
                            <td>{{$ot->id}}</td>
                            <td>{{$ot->generic_name}}</td>
                            <td>{{$arr_terlaris[$ot->id]}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</section>
@endsection