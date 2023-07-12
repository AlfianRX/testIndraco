@extends('layouts.app')

@section('content')

@if(Auth::check())
    @if(Auth::user()->role == 'admin')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                <h1>
                Our Products
                </h1>
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
                            <th scope="col" class="text-center">Price</th>
                            <th colSpan='2' scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="{{ asset('images/kopi2.png') }}" alt="" style="width: 100px; height: auto;"></td>
                                <td>Kopi Kapal</td>
                                <td>125</td>
                                <td>Deskripsi tentang kopi</td>
                                <td>500.000</td>
                                <td><Button
                                type="button"
                                    style="width:auto;"
                                    class="btn btn-success"
                                    >
                                    Edit
                                    </Button></td>
                                <td><Button
                                type="button"
                                    style="width:auto;"
                                    class="btn btn-danger"
                                    >
                                    Delete
                                    </Button></td>
                            </tr>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
    @else
        <!-- Tampilan untuk pengguna -->
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h1>
                Our Products
                </h1>
            </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100">
                            <img src="{{asset('images/kopi1.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                            </div>
                        </div>
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
