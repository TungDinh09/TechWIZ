@extends('Admin.Layout')
@section('content')
    <div class="card-body pb-0">
        <h5 class="card-title">Orders List</h5>

        <table class="table table-striped" style="border-radius: 10px">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Payment Name</th>
                    <th scope="col text-center">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payments)
                <tr>
                    <th scope="row">{{ $payments->PaymentID }}</th>
                    <td>${{ $payments->PaymentName }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" style="">
                            <li><a class="dropdown-item text-success" href="/admin/update/payment/{{ $payments->PaymentID }}">Edit</a></li>
                            <li>
                                <form action="/admin/delete/payment" method="post" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" class="d-inline" name="id" value="{{ $payments->PaymentID }}">
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
@endsection
