<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}" />
    <title>Todos</title>
</head>

<body>

<div class="container">
    <div class="col-md-10 m-auto">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">

            <a href="{{ route('todo.index') }}" class="navbar-brand">My Todos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSuppotedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSuppotedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('todo.index') }}">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="row">
            <div class="col-md-10 mx-auto">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif
            </div>
        </div>
    </div>




    @yield('content')


</div>





</body>

</html>
