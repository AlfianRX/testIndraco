@extends('layouts.app')

@section('content')
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

@endsection
