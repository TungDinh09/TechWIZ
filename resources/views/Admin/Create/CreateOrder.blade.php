@extends('Admin.Layout')
@section('content')
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <form class="email-signup" action="/admin/insert/order" method="POST">
                @csrf
                <div class="u-form-group">
                    <input type="name" type="text" value="" required autofocus autocomplete="name"
                        placeholder="Order Name" name="Username" class="name-input" />
                    <span class="text-danger">
                        {{--  @error('name')
                        {{ $message }}
                    @enderror  --}}
                    </span>
                </div>
                <div class="u-form-group">
                    <input type="text" type="text" value="" required autofocus placeholder="Phone Number"
                        name="phone" class="name-input" />
                    <span class="text-danger">
                        {{--  @error('name')
                        {{ $message }}
                    @enderror  --}}
                    </span>
                </div>
                <div class="u-form-group">
                    <input type="text" value="" required autofocus placeholder="Order Location"
                        name="OrderLocation" class="name-input" />
                    <span class="text-danger">
                        {{--  @error('name')
                        {{ $message }}
                    @enderror  --}}
                    </span>
                </div>
                <div class="u-form-group text-center">
                    <select class="form-select name-input m-auto" aria-label="Default select example">

                        @foreach ($deliveries as $delivery)
                            <option value="{{ $delivery->DeliveryID }}">{{ $delivery->Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="u-form-group text-center">
                    <select class="form-select name-input m-auto" aria-label="Default select example">
                        @foreach ($payments as $payment)
                            <option value="{{ $payment->PaymentID }}">{{ $payment->PaymentName }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="u-form-group">
                    <button>{{ __('ADD') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
