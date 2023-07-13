@extends('layouts.app')

@section('content')

@if(Auth::check())
    @if(Auth::user()->role == 'admin')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h1>Products</h1>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                            <div class="p-2"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Add Product</button></div>
                            <div class="p-2"><a type="button" class="btn btn-primary" href="{{ url('category') }}">Category</a></div>

                        </div>
                    </div>


                </div>

                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">No.</th>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Stock</th>
                            <th scope="col" class="text-center">Description</th>
                            <th scope="col" class="text-center">Category</th>
                            <th scope="col" class="text-center">Price</th>
                            <th colSpan='2' scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                            <tr>
                                <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center"><img src="{{ asset($p->gambar_produk) }}" alt="" style="width: 100px; height: auto;"></td>
                                <td class="text-center">{{$p->nama_produk}}</td>
                                <td class="text-center">{{$p->stock}}</td>
                                <td class="text-center">{{$p->deskripsi_produk}}</td>
                                <td class="text-center">{{$p->nama_kategori}}</td>
                                <td class="text-center">Rp. {{$p->harga_produk}}</td>
                                <td class="text-center"><a href="{{ url('product_id/'.$p->id) }}" class="btn btn-success mx-2">Edit
                              </a>
                              <a href="{{ url('delete_product/'.$p->id) }}"
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

       <!-- Modal add edit delete -->

            <!-- Modal -->
            <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductLabel">Tambah Produk Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('add_product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama">Nama Produk</label>
                            <input type="text" class="form-control @error('gambar_produk') is-invalid  @enderror"
                            name="nama_produk" id="" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama">Stock Produk</label>
                            <input type="number" class="form-control"
                            name="stock" id="" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama">Deskripsi Produk</label>
                            <input type="text" class="form-control"
                            name="deskripsi_produk" id="" value="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="nama">Harga Produk</label>
                            <input type="number" class="form-control"
                            name="harga_produk" id="" value="">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kategori_produk">Kategori</label>
                            <select class="form-control" id="kategori_produk" name="kategori_produk" value="">
                                @foreach ($categories as $c)
                                    <option value="{{ $c->kategori_id }}">{{ $c->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="gambar">Gambar Produk</label>
                            <input type="file" class="form-control" placeholder="File" id="gambar_produk" name="gambar_produk">
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


            <!-- Modal Edit -->


    @else
        <!-- Tampilan untuk pengguna -->
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>
                Produk Kami
                </h1>

                    <!-- Start kode untuk form pencarian -->
                    <form class="form" method="get" action="{{ route('search') }}">
                        <div class="form-group w-100 mb-3">
                            <label for="search" class="d-block mr-2">Pencarian Produk</label>
                            <input type="text" name="search" class="form-control w-75 d-inline mx-1" id="search" placeholder="Masukkan nama produk">
                            <button type="submit" class="btn btn-primary mb-1">Cari</button>
                        </div>
                    </form>
                    <!-- Start kode untuk form pencarian -->
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
            </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach($products as $p)
                        <div class="col">
                            <div class="card h-100">
                            <img src="{{ asset($p->gambar_produk) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $p->nama_produk}}</h5>
                                <p class="card-text">{{ $p->deskripsi_produk}}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Rp. {{ $p->harga_produk}}</small>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
    @endif
    @else

    <h1>Error</h1>

@endif
@endsection
