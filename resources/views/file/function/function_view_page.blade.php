@extends('layouts.dashboard')
@section('menu')
<section class="home-section">
    <div class="home-content">
        @include('navbar')
<div style="width: 800px;margin-top:30px; background:#dfe6e9" class="center">
<header><i class="fa fa-home" aria-hidden="true"></i> / Hall Maintenance / Insert Form</header>
<div style="">
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
{{csrf_field()}}
<div>
<span>
<label for="code"> Code :</label>
<input  type="text" id="code" name="code" class="form-control" size= "7" value="{{ $function->code }}" readonly>
</span>
<span style="margin-left:92px">
  <label for="status">Status : </label>
  <select name="status" id="status" style="height:20px;" class="form-control" tabindex="4" disabled>
    <option value="A" @if($function->status == "A") ? selected : null @endif> ACTIVE</option>
    <option value="N" @if($function->status == "N") ? selected : null @endif> NOT ACTIVE</option>
  </select>
</span>
</div>
<div class="" >
<label for="description"  > Description : </label>
<input  type="text" id="description" name="description" readonly value="{{ $function->description }}" class="form-control" size="60" maxlength="40" tabindex="1" >
</div>
<div id="description_error"></div>
<hr class="style1 row">
<div class="row" style="margin: 0 170px; padding:2px">

<button type="button" class="button" tabindex="8" onclick="window.location='{{route('function')}}'">Return</button>
</div>
</form>
</div>
</div>
    </div>
</section>
<script>
$(document).ready(function () { 
$('form').submit(function(){
    if($('#description').val() == '' || $.trim($('#description').val()) == ''){
    $('#description_error').text("Please fill out this field.").addClass("alert");
    $('#description').css('border', 'thin solid red'); 
    $("#description").click(function(){
                $("#description").removeAttr("style");
                $('#description').addClass('form-control');
                $('#description_error').text("");
            });
        return false;
    }
  });
  $('#description').blur(function(){
            var _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:"/function",
                data:{
                    description: $("#description").val(),
                    _token: _token,
                },
                success:function(response){
                    if(response != ''){
                        $code = response.tcmpcod;
                        $('#description_error').text("This Description is already exist on Code# ").append($code)
                        .addClass("alert");
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
});
</script>

@endsection
