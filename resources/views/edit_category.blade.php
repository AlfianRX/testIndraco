@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>
                Edit Kategori
                </h1>
            </div>

                <div class="card-body">
                <form action="{{ url('edit_category/'.$response[0]->kategori_id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control"
                            name="nama_kategori" id="" value="{{$response[0]->nama_kategori}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
