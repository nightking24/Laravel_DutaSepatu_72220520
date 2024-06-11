@extends('layouts.main')
@section('title','Form Edit Sepatu')
@section('artikel')
    <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="/update/{{ $spt->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="form-group">
        <label>Merek</label>
        <input type="text" name="merek" class="form-control" value="{{ $spt->merek }}" required>
    </div>

    <div class="form-group">
        <label>Jenis</label>
        <input type="text" name="jenis" class="form-control" value="{{ $spt->jenis }}" required>
    </div>

    <div class="form-group">
        <label>Bahan</label>
        <input type="text" name="bahan" class="form-control" value="{{ $spt->bahan }}" required>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="text" name="harga" class="form-control" value="{{ $spt->harga }}" required>
    </div>

    <div class="form-group">
        <label>Ukuran</label>
        <input type="text" name="ukuran" class="form-control" value="{{ $spt->ukuran }}" required>
    </div>

    <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control-file" accept="image/*">
    </div>

   +
        <img src="{{ asset('/storage/'.$spt->gambar) }}" alt="{{ $spt->gambar }}" height="80" width="80">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </div>
    
</form>
</div>
</div>
    @endsection