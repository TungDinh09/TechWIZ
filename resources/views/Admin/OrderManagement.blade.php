@extends('Admin.Layout')
@section('content')
    <div class="card-body pb-0">
        <h5 class="card-title">Orders List</h5>

        <table class="table table-striped" style="border-radius: 10px">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Date</th>
                    <th scope="col">UserName</th>
                    <th scope="col">UserPhone</th>
                    <th scope="col">Delivery</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col text-center">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->OrderID }}</th>
                        <td>${{ $order->Quantity }}</td>
                        <td>{{ $order->total }}</td>
                        <td class="fw-bold">{{ $order->OrderDate }}</td>
                        <td>tui</td>
                        <td>0123456789</td>
                        <td>{{ $order->DeliveryID }}</td>
                        <td>{{ $order->PaymentID }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->StatusBill }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                    <li><a class="dropdown-item text-success" href="#">Verify</a></li>
                                    <li><a class="dropdown-item text-warning" href="#">Denied</a></li>
                                    <li>
                                        <form action="/admin/delete/user" method="post" class="mb-0">
                                            <input type="hidden" class="d-inline" name="id"
                                                value="{{ $order->OrderID }}">
                                            <input type="submit"
                                                class="btn btn-link text-decoration-none small text-danger" value="Delete">
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
@endsection
