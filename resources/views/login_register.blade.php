<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/CSS/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/CSS/Auth.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

</head>

<body class="">


    <div class="login-box mx-auto  ">
        <div class="lb-header">
            <a href="#" class="active " id="login-box-link">Login</a>
            <a href="#" class=""id="signup-box-link">Sign Up</a>
        </div>
        {{-- <div class="social-login">
      <a href="#">
        <i class="fa fa-facebook fa-lg"></i>
        Login in with facebook
      </a>
      <a href="#">
        <i class="fa fa-google-plus fa-lg"></i>
        log in with Google
      </a>
    </div> --}}
        {{-- -------Login--------------------------------------------------------------------------------------------------------------------------------- --}}
        <form class="email-login" action="{{ route('login') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="u-form-group">
                <input type="email" name="email" placeholder="Email id" id="email" :value="old('email')"
                    required autofocus autocomplete="username" for="email" :value="__('Email')" />
            </div>
            <div class="u-form-group">
                <input type="password" name="password" placeholder="Password" for="password" :value="__('Password')"
                    id="password" name="password" required autocomplete="current-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="remember">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="u-form-group">
                <button> {{ __('Log in') }}</button>
            </div>
            <div class="u-form-group">
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
        </form>
        {{-- -Register form-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    --}}
        <form class="email-signup" action="{{ route('register') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="u-form-group">
                <input type="name" for="name" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" placeholder="User Name" name="name" class="name-input" />
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="u-form-group">
                <input for="phone" type="text" name="phone" :value="old('phone')" required autofocus
                    autocomplete="phone" placeholder="Phone" name="phone" class="name-input" />
                <span class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="u-form-group">
                <input type="email" :value="old('email')" required autocomplete="username" for="email"
                    id="email" name="email" placeholder="Email" />
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="u-form-group">
                <input type="password" name="password" placeholder="Password" type="password" name="password"
                    id="password" required autocomplete="new-password" />
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="u-form-group">
                <input for="password_confirmation" :value="__('Confirm Password')" type="password"
                    placeholder="Confirm Password" id="password_confirmation" class="block mt-1 w-full"
                    type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="u-form-group">
                <button>{{ __('Register') }}</button>
            </div>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(".email-signup").hide();
        $("#signup-box-link").click(function() {
            $(".email-login").fadeOut(100);
            $(".email-signup").delay(100).fadeIn(100);
            $("#login-box-link").removeClass("active");
            $("#signup-box-link").addClass("active");
        });
        $("#login-box-link").click(function() {
            $(".email-login").delay(100).fadeIn(100);;
            $(".email-signup").fadeOut(100);
            $("#login-box-link").addClass("active");
            $("#signup-box-link").removeClass("active");
            window.location.href = "{{ route('register') }}";
        });
    </script>
</body>

</html>
