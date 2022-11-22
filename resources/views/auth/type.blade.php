
@extends('layouts.front')

@section('content')

 
<style>
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
    .style_rtl{
        text-align: right;
    }
    .style_lrt{
        text-align: left;
    }
       
    </style>
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
                           <div class="form-outline mb-1">
                                <input type="text" id="inputEmail" name="email_id_card" class="form-control form-control-lg" placeholder="{{ trans('data.email_or_id_card') }}"  required  >
                                    <span class="help-block  text-danger ">
                                        <small class="help-text email_description " >
                                          
                                        </small>
                                    </span>
                              
                            </div>
                            <div class="form-outline mb-1" style="padding-top: 25px">
                                <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="{{ trans('data.password') }}" value ="{{$pwd}}"  required >
                                    <span class="help-block text-danger">
                                        <small class="help-text password_description">
                                        
                                        </small>
                                    </span>
                             
                            </div>
                      

                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
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
<style>


  .error{
    color: red;
  }
  /* label,
  input,
  button {
    border: 0;
    margin-bottom: 3px;
    display: block;
    width: 100%;
  }
 .common_box_body {
    padding: 15px;
    border: 12px solid #28BAA2;
    border-color: #28BAA2;
    border-radius: 15px;
    margin-top: 10px;
    background: #d4edda;
} */
</style>
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
                                    $.ajax({
                                headers: {
                                'X-CSRF-TOKEN': CSRF_TOKEN
                                },
                                type:'POST',
                                url:"{{ route('login') }}",
                                data:{email_id_card: email,password:password},user_type:'',
                                success:function(result){
                                    window.location.href = '/';
                            
                            }});
                          
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
        else
           return false;
       
    }
         


       $('button.copy').click(function(){
            $('input#inputEmail').val($(this).data('email'));
            $('input#inputPassword').val($(this).data('pwd'));
            $('button#submit').trigger('click');
        });








    </script>
@endsection