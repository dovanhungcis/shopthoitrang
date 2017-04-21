<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') - My Project</title>

    <!-- Fonts -->
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <link href="/css/blog.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="login-wrapper">
        <div class="text-center">
            <h2 class="fadeInUp animation-delay8">
                <strong><span class="text-success">Blog</span> <span>Admin</span></strong>
            </h2>
        </div>
        @yield('content')
	</div><!-- /login-wrapper -->

    <!-- Le javascript
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script type="text/javascript" src="/js/app.js"></script>
    @yield('script')
</body>
</html>
