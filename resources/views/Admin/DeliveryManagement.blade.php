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

                    <div class="card-body pb-0">
                        <h5 class="card-title">Products List</h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Delivery name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliveries as $delivery)
                                <tr>
                                    <th scope="row">{{ $delivery->DeliveryID }}</th>
                                    <td>{{ $delivery->Name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                              Action
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                              <li><a class="dropdown-item text-success" href="/admin/update/delivery/{{  $delivery->DeliveryID }}">Edit</a></li>
                                              <li>
                                                <form action="/admin/delete/delivery" method="post" class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" class="d-inline" name="id" value="{{ $delivery->DeliveryID }}">
                                                    <input type="submit" class="btn btn-link text-decoration-none small text-danger" value="Delete">
                                                </form>
                                              </li>
                                            </ul>
                                          </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>
            </div><!-- End Top Selling -->
        </div>
    </section>
@endsection
