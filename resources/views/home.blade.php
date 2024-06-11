@extends('layouts/main')
@section('title',"Home")
@section('artikel')
<h1>HOME</h1>
<div class="container-fluid">
    <div class="row">
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mt-4">
                <input type="text" name="title" class="form-control" id="search-input">
                <div class="input-group-append">
                    <button onclick="hasilPencarian()" type="submit" id="search-button" class="btn btn-info">CARI</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="row" id="results"></div>
        </div>
    </div>
</div>

<script>
  function hasilPencarian() {
let query = $('#search-input').val(); // Extract the value of the input field
$.ajax({
    url: 'http://127.0.0.1:8000/api/sepatu/v1/search',
    method: 'GET',
    data: { q: query }, // Use the extracted value for the query
    success: function(res) {
        $('#results').empty(); // Clear previous results
        if (res.success === true && query !== "") {
            res.data.forEach(function(item) {
                let card = `
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="http://127.0.0.1:8000/storage/${item.gambar}" class="card-img-top" height="200">
                            <div class="card-body">
                                <h5 class="card-title">${item.merek}</h5>
                                <h5 class="card-title">${item.jenis}</h5>
                                <h5 class="card-title">${item.bahan}</h5>
                                <h5 class="card-title">${item.harga}</h5>
                                <h5 class="card-title">${item.ukuran}</h5>
                            </div>
                        </div>
                    </div>
                `;
                $('#results').append(card);
            });
        } else {
            $('#results').html('<div class="col-md-12"><p class="text-center">Tidak Ditemukan</p></div>');
        }
    }
});
}
</script>
@endsection