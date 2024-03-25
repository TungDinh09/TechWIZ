@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container p-4 my-4">
            <form action="/submit" enctype="multipart/form-data" method="post">
                @csrf

                <div class="shopping-cart py-5">

                    <div class="column-labels">
                        <label class="product-image text-center">Image</label>
                        <label class="product-details text-center">Product</label>
                        <label class="product-price text-center">Price</label>
                        <label class="product-quantity text-center">Quantity</label>

                        <label class="product-line-price text-center">Total</label>
                    </div>
                    <?php $grand_total = 0;
                    $total = 0; ?>
                    @foreach (session('Cart') as $id => $details)
                        <div class="product">
                            <div class="product-image text-center p-3">
                                <img src="{{ asset('storage/' . $details['image']) }}" class=" img-thumbnail">
                            </div>
                            <div class="product-details">
                                <div class="product-title card-text text-success bold text-center ">{{ $details['name'] }}
                                </div>
                                <p class="product-description text-center ">{{ $details['description'] }}</p>
                            </div>
                            <div class="product-price price card-text text-center p-3 text-success">{{ $details['price'] }}
                            </div>
                            <div class="product-quantity text-center px-3 py-4">
                                <div class="fs-4">{{ $details['quantity'] }}</div>
                                <input type="number" name="quantity[{{ $id }}]"
                                    value="{{ $details['quantity'] }}" class="d-none" min="1">
                            </div>

                            <div class="product-line-price price card-text text-center p-3 text-success ">
                                {{ $total = $details['price'] * $details['quantity'] }}<?php $grand_total += $total; ?></div>
                        </div>
                    @endforeach

                    {{-- --------------------------------------------------------------------------------------------------------------------- --}}

                    {{-- --------------------------------------------------------------------------------------------------------------------- --}}
                    <div class="totals">

                        {{-- <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value  text-success card-text" id="cart-subtotal">3696.99</div>
                            </div>
                            <div class="totals-item">
                                <label>Tax (5%)</label>
                                <div class="totals-value  text-success card-text" id="cart-tax">3.60</div>
                            </div> --}}
                        {{-- <div class="totals-item">
                            <label>Shipping</label>
                            <div class="totals-value  text-success card-text" id="cart-shipping">15.00</div>
                        </div> --}}
                        <div class="totals-item totals-item-total text-start    ">
                            <label class="fs-4 ">Grand Total</label>
                            <div class="totals-value  text-success card-text" id="cart-total ">{{ $grand_total }}</div>
                        </div>
                    </div>



                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1" name="UserName">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email User "
                            aria-label="Recipient's username" aria-describedby="basic-addon2" name="Email">
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                    <div class="input-group w-50 mb-3">
                        <span class="input-group-text">Phone Number</span>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)"
                            name="phone">
                        {{-- <span class="input-group-text">.00</span> --}}
                    </div>
                    <label for="basic-url" class="form-label">PAYMENT TYPE</label>
                    {{-- <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div> --}}



                    <div class="input-group mb-3">
                        <span class="input-group-text">Payment</span>
                        <select class="form-select w-25" id="inputGroupSelect01" name="PaymentID">

                            @foreach ($payments as $payment)
                                <option value="{{ $payment->PaymentID }}">{{ $payment->PaymentName }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-text">Delivery</span>
                        <select class="form-select w-25" id="inputGroupSelect01" name="DeliveryID">

                            @foreach ($deliveries as $delivery)
                                <option value="{{ $delivery->DeliveryID }}">{{ $delivery->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="basic-url" class="form-label">ORDER LOCATION</label>
                    <div class="input-group">
                        <span class="input-group-text">Order Location</span>
                        <textarea class="form-control" aria-label="With textarea" name="OrderLocation"></textarea>
                    </div>
                    <input type="text" value="{{ $grand_total }}" name="grand_total" class="d-none">

                    <button class="checkout button-63">Submit</button>
                </div>

                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                <script src="function.js"></script>
            </form>
            <br>
        </div>
    </div>
    <br>
@endsection
