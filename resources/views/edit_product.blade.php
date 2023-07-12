@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>
                Edit Products
                </h1>
            </div>

                <div class="card-body">
                <form action="{{ url('edit_product/'.$response[0]->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                           <label for="" class="form-label">Gambar Produk :</label> <br>
                           <img src="{{ asset($response[0]->gambar_produk) }}" alt="" style="height:200px">
                           <br />
                           <br />
                           <input type="text" name="gambar_produk" class="form-control"
                              value="{{ $response[0]->gambar_produk }}" readonly>
                           <br />
                           <label for="" class="form-label">Ganti Gambar Produk :</label> <br>
                           <input type="file" name="gambar_produk_new" id="" class="form-control"
                              aria-describedby="helpId" />
                           {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        {{-- --}}

                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" class="form-control"
                            name="nama_produk" id="" value="{{$response[0]->nama_produk}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Stock Produk</label>
                            <input type="number" class="form-control"
                            name="stock" id="" value="{{$response[0]->stock}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Deskripsi Produk</label>
                            <input type="text" class="form-control"
                            name="deskripsi_produk" id="" value="{{$response[0]->deskripsi_produk}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Harga Produk</label>
                            <input type="number" class="form-control"
                            name="harga_produk" id="" value="{{$response[0]->harga_produk}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kategori_produk">Kategori</label>
                            <select class="form-control" id="kategori_produk" name="kategori_produk" value="">
                                @foreach ($categories as $c)
                                    <option value="{{ $c->kategori_id }}">{{ $c->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>



@endsection
