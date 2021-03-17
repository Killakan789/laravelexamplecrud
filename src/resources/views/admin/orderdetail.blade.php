<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li style="padding-left: 20px;"><a href="{{ url('/products') }}">Products</a></li>
                    <li style="padding-left: 20px;"><a href="{{ url('/orders') }}">Orders</a></li>
                    <li style="padding-left: 20px;"><a href="{{ url('/counteragents') }}">Counteragents</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="row text-center">
            <div class="col-lg-12">
                <form action="/orders/update/{{$post->id}}">
                    <div class="form-group">
                        <input type="text" class="form-control" id="orderPON" name="orderPON" value="{{ $post->PON }}"  placeholder="Enter PON">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="orderSupplier" name="orderSupplier" value="{{ $post->supplier }}"  placeholder="Enter supplier">
                    </div>
                    <div class="form-group">
                        <select name="orderProduct" id="orderProduct" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="orderQuantity" name="orderQuantity" value="{{ $post->quantity }}"  placeholder="Enter Quantity">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="orderDestination" name="orderDestination" value="{{ $post->destination }}"  placeholder="Enter Destination">
                    </div>
                    <div class="form-group">
                        <select name="orderStatus" id="orderStatus" class="form-control">
                            <option value="Paid">Paid</option>
                            <option value="Unpaid">Unpaid</option>
                            <option value="Partly paid">Partly paid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="orderStatus2" id="orderStatus2" class="form-control">
                            <option value="shipped">shipped</option>
                            <option value="in production">in production</option>
                            <option value="ready at factory">ready at factory</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>



