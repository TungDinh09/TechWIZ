<header class="">
    <div class="container-fluid bg-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-nav py-2">
                <div class="container-fluid">
                    <a class="navbar-brand text-pink" href="#">
                        <img src="{{ url('img/213.png') }} " alt="" height="100px" width="100px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon bg-nav"></span>
                    </button>
                    <div class="collapse navbar-collapse  " id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item navbarlink">
                                <a class="nav-link navbarlink nav-link-font" href="{{ route('dashboard') }}">Home</a>
                            </li>
                            <li class="nav-item navbarlink">
                                <a class="nav-link navbarlink nav-link-font" href="{{ route('contactus') }}">Contact
                                    Us</a>
                            </li>
                            <!-- code cart -->
                            <li class="nav-item navbarlink">
                                <a class="nav-link navbarlink nav-link-font" href="/show">Your
                                    cart
                                    {{--  @if (session('cart'))

                                            {{ count(session('cart')) }}
                                    @else
                                        <span
                                            class="badge bg-light ms-2
                                         text-dark">
                                            0</span>
                                    @endif  --}}
                                    <span
                                        class="badge bg-light ms-2 text-dark">{{ count(Session::get('Cart', [])) }}</span>
                                </a>
                            </li>
                            <li class="nav-item navbarlink">
                                <a class="nav-link navbarlink nav-link-font" href="{{ route('product') }}">Shop</a>
                            </li>

                            <li class="nav-item navbarlink">
                                @if (Auth::check())
                                    <a class="nav-link navbarlink nav-link-font wishlist-link" id="wishlist-link"
                                        data-userid="{{ Auth::user()->id }}" href="#">Wishlist</a>
                                @else
                                    <a class="nav-link navbarlink nav-link-font" data-userid="{{ null }}"
                                        id="wishlist-link">
                                        Wishlist</a>
                                @endif
                            </li>
                        </ul>
                        <form class="d-flex mt-2 my-lg-2 my-md-2 mt-sm-3" role="search" method="POST"
                            action="/search">
                            @csrf
                            <input class="form-control me-2" type="search" name="ProductName" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="btn-group mx-3">
                        @auth
                            <button type="button" class="btn btn-outline-light">{{ Auth::user()->name }}</button>
                            <button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="button">
                                <li><a class="navbarlink text-decoration-none dropdown-item text-center"
                                        href="{{ route('profile.update') }}">Account Settings </a></li>
                                <li class="text-center dropdown-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="nav-link text-danger" :href="route('logout')"
                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light">Register
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>

    </div>

</header>

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script type="text/javascript">
        $('#wishlist-link').on('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            // var user = $(this).data('userid');
            // Check if the user is authenticated
            var user = $(this).data('userid');
            if (user) {
                $.ajax({
                    url: '{{ route('wishlist') }}',
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        // Check the response to decide whether to redirect or show a message
                        if (response.success) {
                            window.location.href = '{{ route('wishlist') }}';
                        } else {
                            alert('An error occurred. Please try again later.');
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again later.');
                    }
                });
            } else {
                alert('You must sign in to view your Wish List');
            }
        });
    </script>
@endsection
