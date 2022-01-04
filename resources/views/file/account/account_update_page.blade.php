@extends('layouts.dashboard')
@section('menu')
  <section class="home-section">
    <div class="home-content">
      @include('navbar')
<div style="width: 700px;background:#dfe6e9; margin-top:30px" class="center">
    <header><i class="fa fa-home" aria-hidden="true"></i> / Account Maintenance / Update Form</header>

<div>
<form action="{{route('account_update_data', $account->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
{{csrf_field()}}    

<div class="row" style="">
   <span>
<label  > Code : </label>
<input  type="text" name="code" id="" readonly value="{{$account->code}}" class="form-control" maxlength="10" onkeyup="autoMove(this,'status')" autofocus pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" title="00-00-0000">
</span>
<span>
    <label style="margin-left: 42px">STATUS : </label>
<select name="status" id="status" style="height:25px;" class="form-control" onkeyup="autoMove(this,'description')">

    <option value="A" @if($account->status == "A") ? selected : null @endif> ACTIVE</option>
	<option value="N" @if($account->status == "N") ? selected : null @endif> NOT ACTIVE</option>
</select>
</span>
</div>
<div id="code_error"></div>
<div class="row">
<label  > Description : </label>
<input  type="text" name="description"value="{{$account->description}}" id="description"  class="form-control " size="60" value="" maxlength = "40" onkeyup="autoMove(this,'urdu_description')">
</div>
<div id="description_error"></div>
{{-- <div class="row">
    <label class="urdu" > وضاخت : </label>
    <input  type="text" name="urdu_description" value="{{$data->urdu_description}}" id="urdu_description" class="form-control urdu" size="32" value="" maxlength = "255" onkeyup="autoMove(this,'email')">
    </div> --}}
<div class="row">
<label  > Email : </label>
<input  type="email" name="email" class="form-control" id="email"  value="{{$account->email}}" size="60" maxlength = "40" onkeyup="autoMove(this,'mobile')" style="text-transform: lowercase !important">
</div>
<div class="row">
    <label  > Mobile : </label>
    <input  type="text" name="mobile" value="{{$account->mobile}}" class="form-control" id="mobile"  value=""  maxlength = "11" onkeyup="autoMove(this,'debit_amount')" onkeypress='validate(event)'>
    </div>
<div>
    <span>
        <label for=""> Debit Amount :</label>
        <input type="text" name="debit_amount" value=" {{$account->debit_amount}}" placeholder="0.00" maxlength="12" id="debit_amount" class="form-control right format" onkeyup="autoMove(this,'credit_amount')" onkeypress='validate(event)'>
    </span>
    <span>
        <label for=""> Credit Amount :</label>
        <input type="text" name="credit_amount" value=" {{$account->credit_amount}}" placeholder="0.00" id="credit_amount" maxlength = "12" class="form-control right format" onkeyup="autoMove(this,'ntn')" onkeypress='validate(event)'>
    </span>
</div>
{{-- <hr class="style2 ">

<div class="row">
<label  > NTN : </label>
<input  type="text" name="ntn" value=" {{$data->ntn}}" class="form-control " id="ntn" maxlength = "20"value="" onkeyup="autoMove(this,'strn')" onkeypress='validate(event)'>
</div>
<div>
<label  > STRN : </label>
<input  type="text" name="strn" value=" {{$data->strn}}" class="form-control " maxlength = "20" id="strn"   onkeyup="autoMove(this,'nic')" onkeypress='validate(event)'>
</div>
<div>
<label  > NIC : </label>
<input  type="text" name="nic" id="nic" value=" {{$data->nic}}" class="form-control" maxlength = "15" onkeypress='validate(event)' onkeyup="autoMove(this,'submit')">
</div> --}}
<hr class="style1">

<div class="row" style="margin: 0 150px; padding:3px">

<button type="submit" id="submit" class="button">Submit</button>
<button type="button" id="return" class="button" onclick="window.location='{{route('account')}}'">Return</button>
</div>
</form>
</div>
</div>
    </div>
  </section>
<script>

// If a JSON string is already parsed in a JavaScript object, the JSON.parse() cannot work on it anymore.
// This is because this method expects you to pass a simple string, and anything else will crash the code.
// This code will throw the Uncaught Syntax error.
// Solution
// Use the JSON.stringify() method to remove the error. This will convert the data into a string before parsing it.

// javascript json decodejavascript by Grepper         on Jul 23 2019 Donate Comment
// 73
// 1
// var jsonPerson = '{"first_name":"billy", "age":23}';
// 2
// var personObject = JSON.parse(jsonPerson); //parse json string into JS object
// json parse returns objectjavascript by Homely Hamster on May 27 2020 Comment
// 4
// 1
//     var str = '[{"UserName":"xxx","Rolename":"yyy"}]'; // your response in a string
// 2
//     var parsed = JSON.parse(str); // an *array* that contains the user
// 3
//     var user = parsed[0];         // a simple user
// 4
//     console.log(user.UserName);   // you'll get xxx
// 5
//     console.log(user.Rolename);   // you'll get yyy



$(document).ready(function(){
    // var x,y, data, data_control, data_sub_control, data_detail_account;
    // fetch_acoount_code();

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
        //     // $('#submit').click(function(){
        //     // });
        // }else{
        //     return true;
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

            // $('#submit').click(function(){
            // });
        // }else{
        //     return true;
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
            $(document).ready(function(){
        $('#nic').keyup(function(e){
            var code = $('#nic').val();
            if(code.length == 5 || code.length == 13){
                $('#nic').val($('#nic').val()+'-');
            }
        });
    });
//         $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
//});
        // $.ajax({
        //     url: "/fetch_acoount_code",
        //     type: "POST",
        //     data:{
        //         control:control,
        //         sub_control:sub_control,
        //         _token:_token
        //         },
        //     success: function (response) {
        //         if(response == 'control code not exist'){

        //         }
        //         else if(response == 'control code already exist'){
        //             $('#account_code').focus();
        //                 $('#account_error').text("control code already exist");
        //                 $('#account_error').addClass("abc");
        //                 $('#submit').click(function () {
        //                     return false;
        //                 });
        //         }
        //         //  data = response.code;
        //         //  console.log(data);
        //         //  var code = stringify[0];
        //         //  console.log(code.code);
        //         // var parsed = JSON.parse(str);
        //     }
        // });



        // for (let index = 0; index < data.length; index++) {
        //     var account = data[index];
        //     var acc = account.code;
        //     spliter = acc.split('-')
        //     data_control = spliter[0];
        //     data_sub_control = spliter[1];
        //     data_detail_account= spliter[2];
        //     if(control != 00) {
        //         if(data_control == control) {
        //             if( data_sub_control == 00 && data_detail_account == 0000) {
        //                 if(data_sub_control == sub_control) {
        //                     if (data_detail_account == detail_account) {
        //                         console.log("code already exist");
        //                         break;
        //                     }else{

        //                     }
        //                 }else{

        //                 }
        //             }else{
        //                 // console.log("control code not exist!");
        //                 // $('#account_code').focus();
        //                 // $('#account_error').text("control code does not exist!");
        //                 // $('#account_error').addClass("abc");
        //                 // $('#submit').click(function () {
        //                 //     return false;
        //                 // });
        //                 // break;
        //             }
        //         }else{
        //             $('#account_error').text("new control code!");
        //             $('#account_error').addClass("abc");
        //             $('#account_code').focus(function () {
        //                 $('#account_error').text("");
        //                 $('#account_error').removeClass("abc");
        //             });
        //         }
        //     }else{
        //         console.log("invalid code");
        //         $('#account_code').focus();
        //         $('#account_error').text("invalid code");
        //         $('#account_error').addClass("abc");
        //         $('#submit').click(function () {
        //             return false;
        //             });
        //     }
        // }

                //else{
                //     console.log("");
                // $('#account_code').focus();
                // $('#account_error').text("control code does not exist!");
                //             $('#account_error').addClass("abc");
                //              $('#submit').click(function () {
                //                  return false;
                //              });
                //              break;
                // }

                //     if (data_sub_control == sub_control) {
                //         if (data_detail_account == detail_account ) {
                //             // alert("detail account already exist");
                //             $('#account_error').text("detail account already exist");
                //             $('#account_error').addClass("abc");
                //              $('#submit').click(function () {
                //                  return false;
                //              });
                //             // console.log("detail account already exist");
                //         }else{
                //             // $('#account_error').text("detail account new");
                //             // $('#account_error').removeClass("abc");

                //             // new_code = control + '-' + sub_control + '-' + detail_account;
                //             // $('#account_code').val(new_code);
                //             // console.log(new_code);
                //             // console.log("detail account does not exist!");
                //         }
                //     }else{
                //         // new_code = control + '-' + sub_control + '-' + detail_account;
                //         // $('#account_code').val(new_code);
                //         //console.log(new_code);
                //         // $('#account_arror').html("control code does not exist");
                //         //     $('#account_code').css('border','solid 1px red');
                //         //      $('#submit').click(function () {
                //         //          return false;
                //         //      });
                //         //console.log("sub-control code does not exist!");
                //     }
                //     // new_code = control + '-' + sub_control + '-' + detail_account;
                //     // $('#account_code').val(new_code);
                //     // console.log(new_code);

                // console.log(acc);
                // console.log(control);
                // console.log(sub_control);
                // console.log(detail_account);

            //   console.log(control);
            //      console.log(sub_control);
            //      console.log(detail_account);
        //    var obj = code.split('-');
        //    document.getElementById("ntn").innerHTML = obj.code;
            //     for (let index = 0; index < length; index++) {
            //     a = y[index];
            //     console.log(a);
            // }



            // for (let index = 0; index < y.length; index++) {
            //     if (index == 0) {
            //         var a = y[index];
            //         console.log(a);
            //     }
            //     else if( index == 1){
            //         var b = y[index];
            //         console.log(b);
            //     }
            //     else{
            //         var c = y[index];
            //         console.log(c);
            //     }
            // }
            //console.log(x);
</script>
@endsection