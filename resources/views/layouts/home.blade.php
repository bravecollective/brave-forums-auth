<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Brave Collective Forums Auth</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/zxcvbn/1.0/zxcvbn-async.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

    <style type="text/css">
        .jumbotron {
	        margin-top: 30px;
        }
        @yield('header-css')
    </style>
</head>
<body>

    <!-- Wrap all page content here -->
    <div id="wrap">
        @include('parts.navigation')

        <div class="container">
            @yield('content')
        </div> <!-- /container -->
    </div>

    @include('parts.footer')

    <script src="js/script.js"></script>

    @yield('footer-js')
</body>
</html>
