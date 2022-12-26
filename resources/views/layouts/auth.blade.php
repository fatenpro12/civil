<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="direction:{{ app()->getLocale() == 'ar'?'rtl':'ltr' }}">
<head>
      <script>
        var APP = {};
        APP.DATE_FORMAT = {};
                @auth
                    window.Permissions = {!! json_encode(Auth::user()->allPermissions, true) !!};
                @else
                    window.Permissions = [];
                @endauth
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet"/>
    <!-- app js values -->
    <script src="{{ asset('js/auth.js') }}"></script>
    <link href="{{ asset('css/font-tajaw.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Tajawal' rel='stylesheet'>
    <title>Civil Application</title>

    @if(!empty($favicon))
        <link rel="shortcut icon" href="{{asset('uploads/' . $favicon)}}"/>
    @endif
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/bootstrap/css/bootstrap.min.css') }}">
    {{--@if(!isset($no_header))
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/css/main.css') }}">
    @endif--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style type="text/css">
       
        :root {
          --input-padding-x: 1.5rem;
          --input-padding-y: .82rem;
        }

        .card-signin {
          border: 0;
          border-radius: 1rem;
       /*   box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);*/
        }

        .card-signin .card-title {
          background-color:#06706d;
         /* margin-bottom: 2rem;*/
          font-weight: 300;
          font-size: 1.5rem;
        }
        .card-signin .card-body {
          padding: 0rem;
        }
     
       
        html, body {
          height: 100%;
  margin: 0;

  background-image:url("{{asset('img/welcome.jpg')}}");
/* Center and scale the image nicely */
/*background-position: center;*/
background-repeat: no-repeat;
background-size: cover;
            
         
        }

.error{
    color: red;
  }
    .style_rtl{
        text-align: right;
    }
    .style_lrt{
        text-align: left;
    }
  </style>
</head>
<body data-gr-c-s-loaded="true" cz-shortcut-listen="true" id="app">
        <div id="auth">
                <transition name="fade">
                    <router-view></router-view>
                </transition>
        </div>
   
    <script src="{{ env('APP_URL') . '/js/lang.js' }}"></script>
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('front/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('front/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('front/js/main.js') }}" type="text/javascript"></script>
    @yield('javascript')
</body>
</html>
