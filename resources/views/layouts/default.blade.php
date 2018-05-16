<!doctype html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body class="">
        <div class="jumbotron text-center" style="max-width:100%;" >
            <div style="width: 100px; position: absolute; left: 25%; top:2%">
                <img vspace="20" width="100" class="jumbotronwidth" alt=" " src="{{asset('images/logo.png')}}">

            </div>
            <div>
            <h1 style="color: #38003c;">Premier League Predictor</h1>
            </div>


        </div>
        <div id="main" class="row" style="margin:0px;">
            @yield('content')
        </div>
        @include('includes.footer')
    </body>
</html>