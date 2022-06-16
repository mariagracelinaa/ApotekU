@extends('layout.conquer')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>List Pembeli dengan Transaksi Terbanyak</h1>
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
                        <th>ID Pembeli</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Total Transaksi Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $laporan)
                    <tr>
                        <td>{{$laporan->id}}</td>
                        <td>{{$laporan->nama}}</td>
                        <td>{{$laporan->alamat}}</td>
                        <td>{{$laporan->telepon}}</td>
                        <td>{{number_format($laporan->total)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</section>
@endsection