<!DOCTYPE html>
<html>

<head>
    <title>Laravel Application</title>
    <!-- Styles -->
    <link href="{{ asset('css/tests.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/tests.js')}}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        svg {
            height: 15px
        }


        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #2A522D  ;
            position: fixed;
            top: 0;
            width: 100%;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        .active {
            background-color: #04AA6D;
        }
    </style>
</head>

<body>
    <ul>
        <li><a href="admin">Admin</a></li>
        <li><a href="category">Category</a></li>
        <li><a href="product">Product</a></li>
       
        <li style="float:right;background-color:red;"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
        <li style="float:right;"><a href="#"> {{ Auth::user()->email }}</a></li>
    </ul>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <div class="container">
        @yield('content')
    </div>

</body>

</html>