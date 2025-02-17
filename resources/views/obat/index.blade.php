@extends('layout.conquer')
@section('content')
<h2>List Obat</h2> 
<div>
  @if(session('status'))
  <div class="alert alert-success">{{session('status')}}</div>
  @endif

  @if(session('error'))
  <div class="alert alert-danger">{{session('error')}}</div>
  @endif
</div>
<div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">DISCLAIMER</h4>
        </div>
        <div class="modal-body">
          Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
   </div>
</div>
  <table class="table table-hover">
    <thead>
    <a href="{{ route('obat.create') }}" class="btn btn-primary" >Tambah</a>
      <tr>
        <th>ID</th>
        <th>Nama Obat</th>
        <th>Medicines Form</th>
        <th>Harga</th>
        <th>Nama Kategori</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach($data as $d)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $d -> nama_obat}}</td>
            <td>{{ $d -> restriction_formula}}</td>
            <td>{{ $d -> harga}}</td>
            <td>{{ $d -> nama_kategori}}</td>
            <td> <a href = "{{ route('obat.edit',$d ->id)}}" 
                  class = 'btn btn-xs btn-info'>edit</a>

                  <form method="POST" action="{{url('obat/'.$d->id)}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-xs" value="delete" onclick="if(!confirm('are you sure to delete this record ?')) return false;">
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection


