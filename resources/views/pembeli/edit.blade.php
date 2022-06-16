@extends('layout.conquer')

@section('content')
  <!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
			Form Ubah Obat
  </h3>
  <!-- END PAGE HEADER-->
<!-- <div class="container "> -->
 
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Ubah data kategori
        </div>
        <div class="tools">
            <a href="" class="collapse"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{url('kategori/'.$data->id)}}">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="nama" placeholder="Isikan nama kategori" value="{{$data->nama}}">
                </div>
                
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="3">{{$data->deskripsi}}</textarea>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
