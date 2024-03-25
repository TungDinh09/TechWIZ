@extends('Admin.Layout')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <form class="email-signup" action="/admin/insert/payment" method="POST">
            @csrf
            <div class="u-form-group">
                <input type="name" for="name" type="text" name="name" value="" required
                    autofocus autocomplete="name" placeholder="Payment Name" name="name" class="name-input" />
                <span class="text-danger">
                    {{--  @error('name')
                        {{ $message }}
                    @enderror  --}}
                </span>
            </div>
            <div class="u-form-group">
                <button>{{ __('ADD') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
