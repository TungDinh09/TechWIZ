@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
