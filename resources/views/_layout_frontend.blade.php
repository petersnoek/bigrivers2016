<!doctype html>
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
    <link rel="stylesheet" href="/css/style_frontend.css">
    {{-- if blade includes a "head" section, then it will be placed here --}}
    <script src="/js/jquery-1.12.1.js"></script>
    {{-- Import bootstrap 1.12.1 JS Jquery --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- Import bootstrap 3.3.6 JS --}}
@yield('head')

<title>@yield('title') - BigRivers</title>

</head>
<body>

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

<div class="container" id="wrapper">
        @yield('content')

    <div class="last-page">
        <div class="footer">
            <p>Copyright {{$copyright_year}} - Big Rivers Festival</p>
        </div>
    </div>

</div>

@yield('javascript')

</body>
</html>