@extends('layouts.front')

@section('content')

<div class="container" >

    <div class="row">
        <div class="form-signin" id="form"   >
            {{ csrf_field() }}

            @php
                $pwd = '';
                $email = '';
            @endphp
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto shadow-lg  mb-5 bg-white rounded mt-3" >
                <div class="card card-signin">
                    <div class="card-body">
                        <div class="card-title p-4">
                            <h5 style="color:white;">
                                {{ trans('data.Log_in_to_the_engineering_offices_system') }}
                            </h5>
                        </div>
                        <div style="padding:20px;">

                        <div id="email_pass" >
                        <div class="form-outline mb-1">
                                <input type="text" id="inputEmail" name="email_id_card" class="form-control form-control-lg" onchange="getEmail(this)"  required placeholder="{{ trans('data.email_or_id_card') }}">
                                    <span class="help-block  text-danger ">
                                        <small class="help-text email_description " >
                                          
                                        </small>
                                    </span>
                              
                            </div>
                            <div class="form-outline mb-1" style="padding-top: 25px">
                                <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="{{ trans('data.password') }}" value ="{{$pwd}}"  onchange="getPass(this)"  required >
                                    <span class="help-block text-danger">
                                        <small class="help-text password_description">
                                        
                                        </small>
                                    </span>
                             
                            </div>
                        </div>
                        <div id="user_type_log" style="display:none">
                            <div class="form-outline mb-1" style="padding-top: 5px">
                            <select name="user_type" id="user_type"  class="form-control form-control-lg"   onchange="getComboA(this)" >
                            
                                    <!-- @foreach(array_keys(config('constants.user_types'))  as $type)
                                        <option value="{{$type}}" >{{config('constants.user_types')[$type]}} </option>
                                    @endforeach -->
                                </select>
                         
                                    <span class="help-block text-danger type_description">
                                        <small class="help-text">
                                           
                                        </small>
                                    </span>
                    
          
                            </div>
                            </div>
                            <!-- <div class="form-outline mb-1">
                            <select name="type_name" id="type_name"   class="form-control form-control-lg" style="display: none;margin-top:4%;" >
                                </select>
                                @if ($errors->has('user_type'))
                                    <span class="help-block text-danger">
                                        <small class="help-text">
                                            {{ $errors->first('user_type') }}
                                        </small>
                                    </span>
                                @endif
                            </div> -->
                            
                            <div class="custom-control custom-checkbox mb-3" id="remember_me">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">
                                    {{__('data.remember_me')}}
                                </label>
                            </div>
                            <br>
                            <button class="btn btn-lg btn-block text-uppercase" onclick="validateMyForm(event);"  style="background-color:#06706d;color:white;" id="submit" >
                             
                             {{__('data.login')}}
                            </button>
                            <button class="btn btn-lg btn-block text-uppercase" onclick="validateType(event);"  style="background-color:#06706d;color:white; display:none" id="button_type" >
                             
                             {{__('data.ok')}}
                            </button>
                            <a class="btn btn-link d-block text-center" id="password_request"  style="color:#06706d;" href="{{ route('password.request') }}">
                                
                               
                                {{__('data.forget_password')}}
                            </a>
                            @if(config('constants.enable_client_signup'))
                                <a class="btn btn-link d-block text-center py-0"  id="register" style="color:#06706d;"  href="{{ route('register')}}">
                                    <!-- //route('client.register-form')  -->
                                {{__('data.register')}}
                                </a>
                            @endif
                        </div>
                        <div class="card-title text-center"style="margin-bottom: 0px;">
                            <span style="font-size:12px; color:white;">
                                {{ trans('data.all_rights_are_save') }} <b>2020</b>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert @if(session('status.success')) alert-success @else alert-danger @endif alert-dismissible fade show mt-5" role="alert">
                  {{ session('status.msg') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            </div>
        </div>
    @endif
    @if(config('app.env') == 'demo')
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <p class="text-center text-danger">Demo Logins</p>
                <table class="table table-sm">
                    <tr>
                        <th>User Role</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>#</th>
                    </tr>
                    <tr>
                        <th>Admin</th>
                        <td>admin@example.com</td>
                        <td>123456</td>
                        <td>
                            <button class="btn btn-sm btn-success copy" data-email="admin@example.com" data-pwd="123456">Login</button>
                        </td>
                    </tr>
                    <tr>
                        <th>Employee</th>
                        <td>employee@example.com</td>
                        <td>123456</td>
                        <td>
                            <button class="btn btn-sm btn-success copy" data-email="employee@example.com" data-pwd="123456">Login</button>
                        </td>
                    </tr>
                    <tr>
                        <th>Customer / Client</th>
                        <td>customer@example.com</td>
                        <td>123456</td>
                        <td>
                            <button class="btn btn-sm btn-success copy" data-email="customer@example.com" data-pwd="123456">Login</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endif

</div>


@endsection
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>
@section('javascript')
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
    <script type="text/javascript">
const isEmpty = str => !str.trim().length;

//if()

$('input[type=text]').addClass('textbox');
var flag=false
$(document).ready(function(){

 
    if(document.documentElement.lang=="ar"){
        $(".container").css("text-align", "right");
        $("#user_type").css("text-align", "right");
        $('input[type=text]').addClass('style_rtl');
        $('input[type=email]').addClass('style_rtl');
        $('input[type=number]').addClass('style_rtl');
        $('input[type=password]').addClass('style_rtl');
    }
    else{
        $(".container").css("text-align", "left");
        $("#user_type").css("text-align", "left");
        $('input[type=text]').addClass('style_ltr');
        $('input[type=email]').addClass('style_ltr');
        $('input[type=number]').addClass('style_ltr');
        $('input[type=password]').addClass('style_rtl');
     
    }

        $("#inputEmail").on("change",function() {
   
   });

 });
 function getComboA(selectObject) {
        var value = selectObject.value;  
        $(".type_description").text('');
    }
    function getEmail(selectObject) {
        var value = selectObject.value;  
        $(".email_description").text('');
    }

    function getPass(selectObject) {
        var value = selectObject.value;  
        $(".password_description").text('');
    }
 function validateType(){
           var email = $("#inputEmail").val();
           var password = $("#inputPassword").val();
           var user_type = $("#user_type").val();
        if(user_type!= null){
            $(".password_description").text('');
            $(".email_description").text('');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                       $.ajax({
                                headers: {
                                'X-CSRF-TOKEN': CSRF_TOKEN
                                },
                                type:'POST',
                                url:"{{ route('login') }}",
                                data:{email_id_card: email,password:password,user_type:user_type},
                                success:function(result){
                                    window.location.href= "/";
                            }});
                  //  return false
               
                }
        else{
            $(".type_description").text(document.documentElement.lang=="ar" ?  "يجب ان تختار نوع المستخدم " : "you must choose type");
           
        }
 }

  function validateMyForm (event) {
        var email = $("#inputEmail").val();
        var password = $("#inputPassword").val();
        $('#user_type').children().remove();
        if(!isEmpty(email) ){
            $(".password_description").text('');
            $(".email_description").text('');
            $('#user_type').children().remove();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
                $.ajax({
                        headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                        },
                        type:'POST',
                        url:"{{ route('getType.post') }}",
                        data:{email: email,password:password},
                        success:function(result){
                        if (result.success){
                            if(result.roles.length > 1){
                                $("#user_type_log").show(); 
                                $("#email_pass").hide(); 
                                $("#button_type").show();
                                $("#submit").hide();
                                $('#password_request').removeClass("d-block");
                                $('#register').removeClass("d-block");
                                $('#password_request').css('display', 'none');
                                $('#register').css('display', 'none');
                                $("#remember_me").hide();
                                   $("h1").removeClass("page-header");
                                var options = "";
                                $('#user_type').children().remove();
                                $("#user_type").prop('required',true);
                                var options1 = `<option value="" disabled selected> ${document.documentElement.lang=="ar" ?  "اختر نوع المستخدم" : "choose type"}</option>`;
                                $("#user_type").append(options1);
                                    for (var i = 0; i < result.roles.length; i++) {
                                    options += `<option value=${result.roles[i].type}>${result.roles[i].name}</option>`;//<--string 
                                    }
                                    $("#user_type").append(options);
                            }
                            else{
                              $.ajax({
                                headers: {
                                'X-CSRF-TOKEN': CSRF_TOKEN
                                },
                                type:'POST',
                                url:"{{ route('login') }}",
                                data:{email_id_card: email,password:password},
                                success:function(result){
                                 window.location.href= "/";
                            }});
                            }
                        } 
                        else{
                          if(result.pass){
                            $(".email_description").text(result.description);
                            $(".password_description").text('');
                          }
                          else{
                            $(".password_description").text(result.description);
                            $(".email_description").text('');
                          }
                            
                           
                            // return false
                        }
                     
                    }});
                  //  return false
               
                }
        else{
            $(".email_description").text(document.documentElement.lang=="ar" ?  "حقل الايميل او رقم البطاقة اجباري" : "Email or Id Card is Required");
            return false;
        }
          
       
    }
         


       $('button.copy').click(function(){
            $('input#inputEmail').val($(this).data('email'));
            $('input#inputPassword').val($(this).data('pwd'));
            $('button#submit').trigger('click');
        });




    </script>
@endsection