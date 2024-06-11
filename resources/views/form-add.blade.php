@extends('layouts.main')
@section('title','Form Add Sepatu')
@section('artikel')
    <div class="card">
    <div class="card-header"></div>
    <div class="card-body">
        <form action="/save" method="post" enctype="multipart/form-data">
        @csrf
<div class="form-group">
    <label>Merek</label>
    <input type="text" name="merek" class="form-control" required>
    </div>
<div class="form-group">
    <label>Jenis</label>
    <input type="text" name="jenis" class="form-control" required>
    </div>
<div class="form-group">
    <label>Bahan</label>
    <input type="text" name="bahan" class="form-control" required>
    </div>
<div class="form-group">
    <label>Harga</label>
    <input type="text" name="harga" class="form-control" required>
    </div>
<div class="form-group">
    <label>Ukuran</label>
    <input type="text" name="ukuran" class="form-control" required>
    </div>
<div class="form-group">
    <label>Gambar</label>
    <input type="file" name="gambar" class="form-control-file" accept="image/*">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</div>
</form>
</div>
</div>
    @endsection