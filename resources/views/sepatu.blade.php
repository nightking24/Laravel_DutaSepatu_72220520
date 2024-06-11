@extends('layouts/main')
@section('title',"Sepatu")
@section('artikel')
<div class="card">
    <div class="card-header">
        <a href="/sepatu/add-form" class="btn btn-primary"><i class="bi bi-plus-square"></i>Sepatu</a>
    </div>
    <div class="card-body">
        @if (session('alert'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th><center>No</center></th>
                <th><center>Merek</center></th>
                <th><center>Jenis</center></th>
                <th><center>Bahan</center></th>
                <th><center>Harga</center></th>
                <th><center>Ukuran</center></th>
                <th><center>Gambar</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($spt as $idx => $m)
            <tr>
                <td>{{ $idx+1 }}</td>
                <td>{{ $m->merek }}</td>
                <td>{{ $m->jenis }}</td>
                <td>{{ $m->bahan }}</td>
                <td>{{ $m->harga }}</td>
                <td>{{ $m->ukuran }}</td>
                <td>
                    <img src="{{ asset('/storage/'.$m->gambar) }}"
                    alt="{{ $m->gambar }}" height="80" width="130">
                </td>
                <td><center>
                    <a href="/sepatu/edit-form/{{  $m->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                    <a href="/delete/{{ $m->id }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                </td></center>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection