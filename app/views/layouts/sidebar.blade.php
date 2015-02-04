<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="container" id="wrapper">

    <header class="row">
        @include('includes.header')
    </header>

    <div id="main" class="row">

        <!-- sidebar content -->
        <div id="sidebar" class="col-md-3">
            @include('includes.sidebar')
        </div>

        <!-- main content -->
        <div id="content" class="col-md-9">
            @yield('content')
        </div>

    </div>

</div>
</body>
</html>