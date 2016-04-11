_layout.blade.php<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    {{-- load jquery --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" ></script>
    {{-- tell the browser this site is optimized for mobile  --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    {{-- import bootstrap 3.3.6 CSS --}}
    {{-- import the w3.css stylesheet. see: http://www.w3schools.com/w3css/ for more info --}}
    <link rel="stylesheet" href="/css/w3.css">
    {{-- Own .css file --}}
    <link rel="stylesheet" href="/css/style.css">
    {{-- if blade includes a "head" section, then it will be placed here --}}
    <script src="/js/jquery-1.12.1.js"></script>
    {{-- Import bootstrap 1.12.1 JS Jquery --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- Import bootstrap 3.3.6 JS --}}
@yield('head')

<title>@yield('title') - BigRivers</title>

</head>
<body>
<div class="bannar">
    <a href="/"><img src="/pictures_layout/logo.jpg" alt="Logo2016" class="logo"></a>
    <a href="https://www.facebook.com/events/1473066383005869/" target="_blank"><img src="/pictures_layout/facebook-logo2.jpg" alt="F-Logo2016" class="SM-logo-F"/></a>
    <a href="https://www.youtube.com/channel/UCJpdp-Ikda2SCWElN0cA8Og" target="_blank"><img src="/pictures_layout/youtube-logo.jpg" alt="Y-Logo2016" class="SM-logo-Y"/></a>
    <a href="https://www.instagram.com/bigrivers16/" target="_blank"><img src="/pictures_layout/instagram-logo2.jpg" alt="I-Logo2016" class="SM-logo-I"/></a>
    <a href="https://twitter.com/BigRivers16?lang=nl" target="_blank"><img src="/pictures_layout/twitter-logo2.jpg" alt="T-Logo2016" class="SM-logo-T"/></a>
</div>

<div class="modals">
    <div id="notificationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$massage or 'Error: variable empty'}}
                </div>
            </div>
        </div>
    </div>

    @yield('modals')
</div>

<div class="w3-container">

    <ul class="w3-navbar w3-border w3-black">
        <li><a href="/">Home</a></li>
        <li><a href="/eventkit/artists">Eventkit</a></li>
        <li><a href="/login">Login</a></li>
        <li><a href="/admin">Admin</a></li>
        <li><a href="/contact">Contact</a></li>
        @yield('nav-add-items')
        <div class="w3-right">
            @yield('nav-add-items-right')
            {{$user or "Unknown"}}
        </div>
    </ul>
</div>

<div class="container" id="wrapper">

    <div class="nav">
        @yield('nav')
    </div>

    <div class="content">
        @yield('content')
    </div>
</div>

<div class="footer">
    <p>Copyright {{$copyright_year}} - Big Rivers Festival</p>
</div>

@yield('javascript')

</body>
</html>