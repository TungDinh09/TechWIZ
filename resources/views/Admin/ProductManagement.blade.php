@extends('Admin.Layout')
@section('content')
    <section class="section dashboard">
        <div class="col-12">

            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class=" ">
                        <div class="fixed-filter border-filter border-top-none p-4 bg-filter scroll-filter ">
                            <form id="filterForm " action="{{ route('admin.filter.product') }}" method="post">
                                <!-- ... (các checkbox và nút Apply) ... -->
                                @csrf





                                <div class="">
                                    <label class="form-check-label">
                                        SEARCH
                                    </label>
                                    <div class="input-group mb-3">

                                        <input type="text" name="search" class="form-control">
                                    </div>
                                </div>
                                <hr class="divider w-100">
                                {{-- -------------------------------------------form---------------------- --}}




                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" value="A_Z"
                                        id="A_Z">
                                    <label class="form-check-label" for="A_Z">
                                        A to Z
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sort" value="Z_A"
                                        id="Z_A">
                                    <label class="form-check-label" for="Z_A">
                                        Z to A
                                    </label>
                                </div>


                                <hr class="divider w-100">

                                <div class="">
                                    <label class="form-check-label" for="Z_A">
                                        MIN-PRICE
                                    </label>
                                    <div class="input-group mb-3">

                                        <span class="input-group-text">$</span>
                                        <span class="input-group-text">0.00</span>
                                        <input type="number" name="min_Price" class="form-control"
                                            aria-label="Dollar amount (with dot and two decimal places)">
                                    </div>
                                    <label class="form-check-label" for="Z_A">
                                        MAX-PRICE
                                    </label>
                                    <div class="input-group">

                                        <input type="number" name="max_Price" class="form-control"
                                            aria-label="Dollar amount (with dot and two decimal places)">
                                        <span class="input-group-text">$</span>
                                        <span class="input-group-text">0.00</span>
                                    </div>


                                </div>
                                <button id="applyFilter" class="btn bg-dark text-white mt-3">Apply</button>
                            </form>

                        </div>



                    </div>
                    <div class="card-body pb-0">
                        <h5 class="card-title">Products List</h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalQuantity = 0;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td scope="row">{{ $product->Product_ID }}</td>
                                        <td>{{ $product->Name }}</td>
                                        <td>${{ $product->Price }}</td>
                                        <td class="fw-bold">{{ $product->quantity }}</td>

                                        @php
                                            $totalQuantity += $product->quantity;
                                        @endphp
                                        <td>{{ $product->Discount }}</td>
                                        <td>{{ $product->Description }}</td>
                                        <td><img src="{{ asset('storage/' . $product->image->ImageLink) }}" alt="">
                                        </td>
                                        <td>{{ $product->Species }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                    <li><a class="dropdown-item text-success"
                                                            href="/admin/update/product/{{ $product->Product_ID }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="/admin/delete/product" method="post" class="mb-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" class="d-inline" name="id"
                                                                value="{{ $product->Product_ID }}">
                                                            <input type="submit"
                                                                class="btn btn-link text-decoration-none small text-danger"
                                                                value="Delete">
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <p><span class="text-success card-title">Total quantity : <span
                                        class="text-warning card-title">
                                        {{ $totalQuantity }}</span></span>

                            </p>
                        </table>

                    </div>

                </div>
            </div><!-- End Top Selling -->
        </div>
    </section>
@endsection
