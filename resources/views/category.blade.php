@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h1>Categories</h1>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <div class="p-2"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Add Category</button></div>
                            <div class="p-2"><a type="button" class="btn btn-primary" href="{{ url('home') }}">Product</a></div>

                        </div>
                    </div>


                </div>

                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col" class="text-center">Category Name</th>
                            <th colSpan='2' scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $c)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center">{{$c->nama_kategori}}</td>
                                <td class="text-center"><a href="{{ url('category_id/'.$c->kategori_id) }}" class="btn btn-success mx-2">Edit
                              </a>
                              <a href="{{ url('delete_category/'.$c->kategori_id) }}"
                                 onclick="return confirm('Data akan dihapus! apakah ok?')" class="btn btn-danger"> Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductLabel">Tambah Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('add_category') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control"
                            name="nama_kategori" id="" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

@endsection
