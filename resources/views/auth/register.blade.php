@extends('layouts.front')
<style>
 /*   .style_rtl{
        text-align: right;
    }
    .style_lrt{
        text-align: left;
    }
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
}
input{
    width:100%!important;
}
input[type=number] {
  -moz-appearance: textfield;
}
.required:after {
    content:" *";
    color: red;
  }
  :-webkit-autofill,
:-webkit-autofill:hover,
:-webkit-autofill:focus,
:-webkit-autofill:active {

    transition: all 5000s ease-in-out 0s;
    transition-property: background-color, color;

    -webkit-box-shadow: 0 0 0 1000px #fff inset;

    -webkit-text-fill-color: #000;
  
    font-weight: 300!important;
}*/

    </style>
@section('content')

{{--<div class="container">
  <div class="row">
   
    <form class="form-signin" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
         

                @php
                    $pwd = '';
                    $email = '';
                @endphp
            <div class="col-md-12">
                <div class="card card-signin my-5">
                    <div class="card-body">
                    
                    <div class="card-title p-4">
                            <h5 style="color:white;">
                              <!-- //  {{ trans('data.') }} -->
                               

                                  {{ trans('data.register_to_the_engineering_offices_system') }}
                            </h5>
                        </div>
                  <div style="padding:20px;">
                    <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name" style="padding-bottom: 5px;" class="required">
                                    {{__('messages.name')}}
                                </label>
                                <input type="text" id="name" name="name"  class="form-control" placeholder="{{__('messages.name')}}" value="{{ old('name') }}"  required >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="id_card_number" style="padding-bottom: 5px;" class="required">
                                    {{__('data.id_card_number')}}
                                </label>
                                <input type="number" id="id_card_number" name="id_card_number" class="form-control" placeholder="{{__('data.id_card_number')}}" value="{{ old('id_card_number') }}"   required >
                                @if ($errors->has('id_card_number'))
                                    <span class="help-block  text-danger">
                                        <small class="help-text span-email" span-email>
                                            {{ $errors->first('id_card_number') }}
                                        </small>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="company" style="padding-bottom: 5px;" class="required">
                                    {{__('messages.email')}}
                                </label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="{{__('messages.email')}}" autocomplete="email"  required  value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block  text-danger">
                                        <small class="help-text span-email" span-email>
                                            {{ $errors->first('email') }}
                                        </small>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="confirm_password" style="padding-bottom: 5px;">
                                    {{__('messages.confirm_password')}}
                                </label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control"   onchange="check_pass()" placeholder="{{__('messages.confirm_password')}}"   >
                                <span id='message'></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password" style="padding-bottom: 5px;" class="required">
                                    {{__('messages.password')}}
                                </label>
                                <input type="password" id="password" autocomplete="new-password" name="password" class="form-control" placeholder="{{__('messages.password')}}" onchange="check_pass()"  required >
                                @if ($errors->has('password'))
                                    <span class="help-block  text-danger">
                                        <small class="help-text span-email" span-email>
                                            {{ $errors->first('password') }}
                                        </small>
                                    </span>
                                @endif
                            </div>
                        
                       
                   


                            <div class="form-group col-md-4">
                                <label for="name" style="padding-bottom: 5px;">
                                    {{__('messages.mobile')}}
                                </label>
                                <input type="number" id="mobile" name="mobile" class="form-control" placeholder="{{__('messages.mobile')}}"   >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="alternate_num" style="padding-bottom: 5px;">
                                    {{__('messages.alternate_num')}}
                                </label>
                                <input type="number" id="alternate_num" name="alternate_num" class="form-control" placeholder="{{__('messages.alternate_num')}}"   >
                            </div>

                            <div class="form-group col-md-4">
                                <label for="skype" style="padding-bottom: 5px;">
                                    {{__('messages.skype')}}
                                </label>
                                <input type="text" id="skype" name="skype" class="form-control" placeholder="{{__('messages.skype')}}"   >
                            </div>



                            <div class="form-group col-md-4">
                                <label for="linkedin" style="padding-bottom: 5px;">
                                    {{__('messages.linkedin')}}
                                </label>
                                <input type="text" id="linkedin" name="linkedin" class="form-control" placeholder="{{__('messages.linkedin')}}"   >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="facebook" style="padding-bottom: 5px;">
                                    {{__('messages.facebook')}}
                                </label>
                                <input type="text" id="facebook" name="facebook" class="form-control" placeholder="{{__('messages.facebook')}}"   >
                            </div>

                            <div class="form-group col-md-4">
                                <label for="twitter" style="padding-bottom: 5px;">
                                    {{__('messages.twitter')}}
                                </label>
                                <input type="text" id="twitter" name="twitter" class="form-control" placeholder="{{__('messages.twitter')}}"   >
                            </div>




                            <div class="form-group col-md-4">
                                <label for="linkedin" style="padding-bottom: 5px;">
                                    {{__('messages.home_address')}}
                                </label>
                                <input type="text" id="home_address" name="home_address" class="form-control" placeholder="{{__('messages.home_address')}}"   >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="current_address" style="padding-bottom: 5px;">
                                    {{__('messages.current_address')}}
                                </label>
                                <input type="text" id="current_address" name="current_address" class="form-control" placeholder="{{__('messages.current_address')}}"   >
                            </div>

                            <div class="form-group col-md-4">
                                <label for="location_data" style="padding-bottom: 5px;" class="required">
                                    {{__('data.province_municipality')}}
                                </label>
                                <select class="form-control" id="location_data" name="location_data" required>
                                    <option value="" selected>{{__('data.province_municipality')}} </option>
                                    <option value='province1'> {{__('data.province1')}} </option>
                                    <option value='province2'> {{__('data.province2')}} </option>
                                    <option value='province3'> {{__('data.province3')}} </option>
                                    <option value='province4'> {{__('data.province4')}} </option>
                                    <option value='province5'> {{__('data.province5')}} </option>
                                    <option value='province6'> {{__('data.province6')}} </option>
                                    <option value='province7'> {{__('data.province7')}} </option>
                                    <option value='province8'> {{__('data.province8')}} </option>
                                    <option value='province9'> {{__('data.province9')}} </option>
                                    <option value='province10'> {{__('data.province10')}} </option>
                                    <option value='province11'> {{__('data.province11')}} </option>
                                    <option value='province12'> {{__('data.province12')}} </option>
                                    <option value='province13'> {{__('data.province13')}} </option>
                                    <option value='province14'> {{__('data.province14')}} </option>
                                    <option value='province15'> {{__('data.province15')}} </option>
                                    <option value='province16'> {{__('data.province16')}} </option>
                                    <option value='province17'> {{__('data.province17')}} </option>
                                    </select>
                                    @if ($errors->has('location_data'))
                                    <span class="help-block  text-danger">
                                        <small class="help-text span-email" span-email>
                                            {{ $errors->first('location_data') }}
                                        </small>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group col-md-4">
                                <label for="date_of_birth" style="padding-bottom: 5px;">
                                    {{__('messages.date_of_birth')}}
                                </label>
                                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" placeholder="{{__('messages.date_of_birth')}}"   >
                            </div>
                         
                        

                            <div class="form-group col-md-4">
                                <label for="gender" style="padding-bottom: 5px;">
                                    {{__('messages.gender')}}
                                </label>
                                <select class="form-control" id="gender" name="gender" >
                                    <option selected>{{__('data.select_gender')}} </option>
                                    <option value='male'> {{__('messages.male')}} </option>
                                    <option value='female'> {{__('messages.female')}} </option>
                                    </select>
                            </div>
                    </div>

                </div>
            </div>
        <input type="hidden" name="signature" id="signature" ref="signature" />

            <div class="col-md-12">
                <div class="card card-signin my-5">
                    <v-layout justify-center>
                        <v-card-actions class="flex-wrap">
                            <v-btn class="btn btn-lg btn-block text-uppercase  mx-auto" style="background-color:#06706d;color:white;max-width:30%" id="submit" type="submit">
                            {{__('data.register')}}
                            </v-btn>
                      
                            <v-btn class="btn btn-lg btn-block text-uppercase  mx-auto" @click="$refs.signaturePad.create()" style="background-color:#888888;color:white;max-width:30%">
                            {{__('data.addSignature')}}
                            </v-btn>
                    
        
                        </v-card-actions>
                    </v-layout>
                    <a class="btn btn-link d-block text-center " style="color:#06706d;" href="{{ route('login') }}">
                        {{__('data.back_to_login')}}
                       </a>
                    </div>
                </div>

            </div>
         
        </form>
        <signaturepad ref="signaturePad" @save="$refs.signature.value=$event"/>
    </div>
    
   
</div>--}}
<template>
    <v-app id="inspire-font" >
    <userformadd style="margin:5rem"/>
    </v-app>
</template>


@endsection

@section('javascript')
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
    <script type="text/javascript">
 /*   function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}

$(document).ready(function(){
    if(document.documentElement.lang=="ar"){
        $(".container").css("text-align", "right");
        $('input[type=text]').addClass('style_rtl');
        $('input[type=number]').addClass('style_rtl');
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

    if ($("#password").val() ==$("#confirm_password").val() )  {
        $("#submit").disabled = false;
    } else {
        $("#submit").disabled = true;
    }
    $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});

});*/


    </script>
@endsection