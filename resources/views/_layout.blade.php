<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    {{-- load jquery --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" ></script>
    {{-- tell the browser this site is optimized for mobile  --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- import bootstrap 3.3.6 --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    {{-- import the w3.css stylesheet. see: http://www.w3schools.com/w3css/ for more info --}}
    <link rel="stylesheet" href="/css/w3.css">
    {{-- Own .css file --}}
    <link rel="stylesheet" href="/css/style.css">
    {{-- if blade includes a "head" section, then it will be placed here --}}
@yield('head')

<title>@yield('title') - BigRivers</title>

</head>
<body>

<div class="w3-container">

    <ul class="w3-navbar w3-border w3-black">
        <li><a href="/">Home</a></li>
        <li><a href="/eventkit/artists">eventkit</a></li>
        <li><a href="/login">login</a></li>
        <li><a href="/admin">admin</a></li>
        @yield('nav-add-items')
        <div class="w3-right">
            @yield('nav-add-items-right')
        </div>
    </ul>
<body>

<div class="container">

    <div class="nav">
        @yield('nav')
    </div>

    <div class="content">
        @yield('content')
    </div>

</div>



</body>
</html>