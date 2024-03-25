@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="bg-whitelight br-6px my-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center lobster-font">Product Name</th>
                            <th scope="col " class="text-center lobster-font">Image</th>
                            <th scope="col" class="text-center lobster-font">description</th>
                            <th scope="col" class="text-center lobster-font">Price</th>
                            <th scope="col" class="text-center lobster-font"> Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td scope="col" class="text-center card-text">{{ $product->Name }}</td>
                                <td scope="col" class="text-center "><img
                                        src="{{ asset('storage/' . $product->image->ImageLink) }}" alt=""
                                        height="60px" width="60px"></td>
                                <td scope="col" class="text-center lobster-font">{{ $product->Desciption }}</td>
                                <td scope="col" class="text-center price text-success">{{ $product->Price }}$</td>
                                <td scope="col" class="text-center"><span class="mx-1">
                                        <a href="whislist/delete/{{ $product->productID }}"
                                            class="button-62">Delete</a></span>
                                    <span class="mx-1"><a href="/add-to-cart/{{ $product->Product_ID }}"
                                            class="button-63">Add to cart</a></span>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
