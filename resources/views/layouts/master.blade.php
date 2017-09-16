<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @yield('description')

        <link href="{{ URL::to('css/bm.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        
            @include('includes.header')
        <div class = "container main-content">
            @include('includes.message')
            @yield('content')
        </div>
        <div class="container-fluid">
        <hr>
            <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; African Web Designer 
                <?php
                ini_set('date.timezone', 'Africa/Nairobi');
                $startYear = 2016;
                $thisYear = date('Y');
                if ($startYear == $thisYear) {
                echo $startYear;
                }
                else {
                echo "{$startYear} - {$thisYear}";
                }
                ?>  
                    <br>
                   
                    
                </div>
            </div>
        </footer>
        </div>
    </body>
    <script src = "{{ URL::to('js/j.js') }}"></script>
    <script src = "{{ URL::to('js/bn.js') }}"></script>
    <script src = "{{ URL::to('js/app.js') }}"></script>
</html>
