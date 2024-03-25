@extends('Admin.Layout')
@section('content')
<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <form class="email-signup" action="/admin/insert/user" method="POST">
            @csrf
            <div class="u-form-group">
                <input type="name" for="name" type="text" name="name" value="" required
                    autofocus autocomplete="name" placeholder="User Name" name="name" class="name-input" />
                <span class="text-danger">
                    {{--  @error('name')
                        {{ $message }}
                    @enderror  --}}
                </span>
            </div>

            <div class="u-form-group">
                <input for="phone" type="text" name="phone" value="" required autofocus
                    autocomplete="phone" placeholder="Phone" name="phone" class="name-input" />
                <span class="text-danger">
                    {{--  @error('phone')
                        {{ $message }}
                    @enderror  --}}
                </span>
            </div>

            <div class="u-form-group">
                <input type="email" value="" required autocomplete="username" for="email"
                    id="email" name="email" placeholder="Email" />
                <span class="text-danger">
                    {{--  @error('email')
                        {{ $message }}
                    @enderror  --}}
                </span>
            </div>

            <div class="u-form-group">
                <input type="password" name="password" placeholder="Password" type="password" name="password"
                    id="password" required autocomplete="new-password" />
                <span class="text-danger">
                    {{--  @error('password')
                        {{ $message }}
                    @enderror  --}}
                </span>
            </div>

            <div class="u-form-group">
                <input for="password_confirmation" :value="__('Confirm Password')" type="password"
                    placeholder="Confirm Password" id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="u-form-group">
                <button>{{ __('ADD') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
