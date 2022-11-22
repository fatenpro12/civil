@extends('layouts.front')

@section('content')
<style>
    .style_rtl{
        text-align: right;
    }
    .style_lrt{
        text-align: left;
    }
       
    </style>
<div class="container mt-5">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="text-center mt-5">
            <img src="{{asset('img/logo.png')}}"  alt="logo" width="100" />
        </div>
        <div class="card card-signin my-5">
            <div class="card-body" >
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h5 class="card-title text-center p-4" style="color:white;">
                   
                    {{__('data.reset_password')}}
                </h5>
                <div class="p-3">
                    <form class="form-signin" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-label-group" >
                            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="{{__('data.email_address')}}" value="{{ old('email') }}" required autofocus>
                            <!-- <label for="inputEmail">
                                
                                {{__('data.email_address')}}
                            </label> -->
                            <br>
                            @if ($errors->has('email'))
                                <span class="help-block text-danger">
                                    <small class="help-text">
                                        {{ $errors->first('email') }}
                                    </small>
                                </span>
                            @endif
                        </div>
                        <button style="background-color:#06706d;color:white;" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                           
                            {{__('data.send_password_reset_link')}}
                        </button>
                        <a class="btn btn-link d-block text-center" style="color:#06706d;" href="{{ route('login') }}">
                        {{__('data.back_to_login')}}
                        </a>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
    <script type="text/javascript">
    function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}

$(document).ready(function(){
    if(document.documentElement.lang=="ar"){
        $('#inputEmail').addClass('style_rtl');
        $(".container").css("text-align", "right");
        $('input[type=text]').addClass('style_rtl');
        $('input[type=number]').addClass('style_rtl');
        $('input[type=email]').addClass('style_rtl');
        $('input[type=password]').addClass('style_rtl');
    }
    else{
        $(".container").css("text-align", "left");
        $('input[type=text]').addClass('style_ltr');
        $('input[type=email]').addClass('style_ltr');
        $('input[type=number]').addClass('style_ltr');
        $('input[type=password]').addClass('style_rtl');
    }

  
});




    </script>
@endsection