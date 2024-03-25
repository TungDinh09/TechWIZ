@extends('Admin.Layout')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <form class="email-signup" action="/admin/update/delivery/{{ $delivery->DeliveryID }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="u-form-group">
                <input type="name" for="name" type="text" name="name" value="{{ $delivery->Name }}" required
                    autofocus autocomplete="name" placeholder="Delivery Name" name="name" class="name-input" />
                <span class="text-danger">
                    {{--  @error('name')
                        {{ $message }}
                    @enderror  --}}
                </span>
            </div>
            <div class="u-form-group">
                <button>{{ __('UPDATE') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
