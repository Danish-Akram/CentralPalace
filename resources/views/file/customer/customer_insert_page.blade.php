@extends('layouts.dashboard')
@section('menu')

<div style="width: 700px;background:#dfe6e9; margin-top:30px" class="center">
<header><i class="fa fa-home" aria-hidden="true"></i> / Customer Maintenance / Insert Form</header>
<div>
<form action="{{route('customer_insert_data')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
{{csrf_field()}}


<div class="row" style="">
   <span>
<label  > Code : </label>
<input  type="text" name="code" id="code" tabindex="1" class="form-control" maxlength="10" readonly value=" {{ $code }}"  onkeyup="autoMove(this,'status')" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" title="00-00-0000">
</span>
<span style="margin-left: 42px">
    <label  >STATUS : </label>
<select name="status" id="status" style="height:20px;" tabindex="2" class="form-control " onkeyup="autoMove(this,'description')">

    <option value="A"> Active</option>
    <option value="N"> Not Active</option>
</select></span>
</div>
<div id="code_error"></div>
<div class="row">
<label  > Name : </label>
<input  type="text" name="name" tabindex="3" id="name" class="form-control " size="60" value="" maxlength = "40" onkeyup="autoMove(this,'urdu_description')">
</div>
<div id="description_error"></div>

    <div>
        <label> Address 1 :</label>
        <input  type="text" name="address1" tabindex="4" class="form-control"  maxLength="40" size="60"value="">
    </div>
    <div>
        <span>
            <label> Address 2 :</label>
            <input  type="text" name="address2" tabindex="5" class="form-control"  maxLength="40" size="60"value="">    
        </span>
    </div>
    <div>
        <label  > NIC : </label>
        <input  type="text" name="nic" id="nic" tabindex="6" class="form-control" maxlength = "15" size= "" onkeypress='validate(event)' onkeyup="autoMove(this,'mobile')">
        </div> 
    <div class="row">
        <label  > Mobile : </label>
        <input  type="text" name="mobile" tabindex="7" class="form-control" id="mobile"  value="" size= ""  maxlength = "11" onkeyup="autoMove(this,'email')" onkeypress='validate(event)'>
        </div>
        <div class="row">
            <label  > Email : </label>
            <input  type="email" name="email" class="form-control" tabindex="8" id="email"  value="" size="60" maxlength = "40" onkeyup="autoMove(this,'submit')" style="text-transform: lowercase !important">
            </div>

<hr class="style1">

<div class="row" style="margin: 0 150px; padding:3px">

<button type="submit" id="submit" tabindex="9" class="button">Submit</button>
<button type="reset" id="clear" tabindex="10" class="button">Clear</button>
<button type="button" id="return" tabindex="11"class="button" onclick="window.location='{{route('customer')}}'">Return</button>
</div>
</form>
</div>
</div>

<script>


$(document).ready(function(){

    $('#account_code').keydown(function(e){
        if (e.keyCode == 32) {
            $('#code_error').text("Space not allowed!").addClass("alert").css('margin-left', '-25px');
            e.preventDefault();
        }else{
            $('#code_error').text("");
        }
    });

    $('#account_code').focusin(function () {
        $('#code_error').text("");

    });

    $('#description').focusin(function () {
        $('#description_error').text("");

    });

    $('form').submit(function(){
        if ($('#account_code').val() == "" && $('#description').val() == "") {
            $('#code_error').text("Please fill out this field.").addClass("alert").css('margin-left', '-25px');
            $('#description_error').text("Please fill out this field.").addClass("alert").css('margin-left', '-25px');
            $('#account_code').css('border', 'thin solid red'); 
            $('#description').css('border', 'thin solid red'); 
                        $("#account_code").click(function(){
                        $("#account_code").removeAttr("style");
                        $('#account_code').addClass('form-control');
                    });
                    $("#description").click(function(){
                        $("#description").removeAttr("style");
                        $('#description').addClass('form-control');
                    });
                    $('#status').removeClass('form-control');
            return false;
        }
        else if ($('#account_code').val() == "") {
            $('#code_error').text("Please fill out this field.").addClass("alert").css('margin-left', '-25px');
            $('#account_code').css('border', 'thin solid red'); 
                        $("#account_code").click(function(){
                        $("#account_code").removeAttr("style");
                        $('#account_code').addClass('form-control');
                    });
                    $('#status').removeClass('form-control');
            return false;
       
        }
        else if ($('#description').val() == "") {
            $('#description_error').text("Please fill out this field.").addClass("alert").css('margin-left', '-25px');
            $('#description').css('border', 'thin solid red'); 
                        $("#description").click(function(){
                        $("#description").removeAttr("style");
                        $('#description').addClass('form-control');
                    });
                    $('#status').removeClass('form-control');

            return false;


        }
    });


    $('#account_code').focusout(function(){



        var _token = $('input[name="_token"]').val();
        var code1= $('#account_code').val();
        var code = code1.split('-')

        var _control = code[0];
        var _sub_control = code[1];
        var _detail_account = code[2];

        var control = _control + "-00-0000";
        var sub_control = _control +"-" + _sub_control + "-0000";



        if(_control == 00) { 
            $('#code_error').text("Invalid Control Code.").addClass("alert").css('margin-left', '-25px');
            $('#account_code').css('border', 'thin solid red'); 
            $('#status').removeClass('form-control');
            $("#account_code").click(function(){
                $("#account_code").removeAttr("style");
                $('#account_code').addClass('form-control');
            });
            $('form').bind('submit',function(){return false});
        }else{
            $('#status').addClass('form-control');  
                if ($('#description').val() == "" ) {
                    $('form').bind('submit',function(){return false});
                    $("#description").focusout(function(){
                        $("#description").removeAttr("style");
                        $('#description').addClass('form-control');
                        if ($('#description').val() != "" && _sub_control != 00 && _detail_account != 0000) {
                            console.log("2");
                            $('form').unbind('submit');
                        }
                        $('#status').removeClass('form-control');
                        });
                    }else{
                        $('form').unbind('submit');
                    }
            }


        if (_sub_control == 00 && _detail_account != 0000) {
        $('#code_error').text("Invalid Sub Control Code.").addClass("alert").css('margin-left', '-25px');
        $('#account_code').css('border', 'thin solid red'); 
        $("#account_code").click(function(){
            $("#account_code").removeAttr("style");
            $('#account_code').addClass('form-control');
        });
        $('#status').removeClass('form-control');
        $('form').bind('submit',function(){return false});
        }else{
            
        }


        if (_detail_account == 0000){

            $('form :input').prop("disabled", true);
            $('#account_code, #clear, #return').prop("disabled", false);
            $('#clear').click(function(){
                $('form :input').prop("disabled", false);
                $('#account_code').focus();
            });
        }else{
            $('form :input').prop("disabled", false);
            $("#submit").click(function() {
	        $('#submit').prop('disabled', false);
	});
        }

    });

    $('#debit_amount').focusout(function(){
        if ($('#debit_amount').val() != '') {
            $('#credit_amount').val('0.00'); 
        }
    });
    $('#credit_amount').focusout(function(){
        if ($('#credit_amount').val() != '') {
            $('#debit_amount').val('0.00');
        }
    });


});


$(document).ready(function(){
        $('#account_code').keyup(function(e){
            var code = $('#account_code').val();
            if(code.length == 2 || code.length == 5){
                $('#account_code').val($('#account_code').val()+'-');
            }
        });
    });

    
    $(document).ready(function () {
        
        $('#account_code').focusout(function () {
            var code = $('#account_code').val();
            var _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:'/account',
                type:'POST',
                data:{
                    account_code:code,
                    _token: _token
                },
                success:function(response){
                    if(response == 'exist'){
                        $('#status').removeClass('form-control');
                        $('#code_error').text("Code already exist").addClass("alert").css('margin-left', '-25px');
                        $('#account_code').css('border', 'thin solid red'); 
                        $("#account_code").click(function(){
                        $("#account_code").removeAttr("style");
                        $('#account_code').addClass('form-control');
                    });
                    }
                }

            });
        });  
    });

    $(document).ready(function(){
        $('#nic').keyup(function(e){
            var code = $('#nic').val();
            if(code.length == 5 || code.length == 13){
                $('#nic').val($('#nic').val()+'-');
            }
        });
    });
    $('#description').blur(function(){
            var _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:"/account",
                data:{
                    description: $("#description").val(),
                    _token: _token,
                },
                success:function(response){
                    if(response != ''){
                        $code = response.code;
                        $('#description_error').text("This Description is already exist on Code# ").append($code)
                        .addClass("alert").css('margin-left', '-25px')
                        $('#description').css('border', 'thin solid red');
                        $("#description").click(function(){
                        $("#description").removeAttr("style");
                        $('#description').addClass('form-control');
                        $('#description_error').text("");
                    });
                    $('#submit').prop("disabled", true);  
                    }
                    else{
                        $('#submit').prop("disabled", false);
                    }
                }
            });
            });

</script>
@endsection

