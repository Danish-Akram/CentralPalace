@extends('layouts.dashboard')
@section('menu')
<div style="width: 800px;margin-top:30px; background:#dfe6e9" class="center">
<header><i class="fa fa-home" aria-hidden="true"></i> / Hall Maintenance / Insert Form</header>
<div style="">
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
{{csrf_field()}}
<div>
<span>
<label for="code"> Code :</label>
<input  type="text" id="code" name="code" class="form-control" size= "7" value="{{ str_pad($hall, 3, '0', STR_PAD_LEFT) }}" readonly>
</span>
<span style="margin-left:92px">
  <label for="status">Status : </label>
  <select name="status" id="status" style="height:20px;" class="form-control" tabindex="1" autofocus>
  <option value="A">ACTIVE</option>
  <option value="N">NOT ACTIVE</option>
  </select>
</span>
</div>
<div class="" >
<label for="description"  > Description : </label>
<input  type="text" id="description" name="description" class="form-control" size="60" maxlength="40" tabindex="2" >
</div>
<div id="description_error"></div>
<hr class="style1 row">
<div class="row" style="margin: 0 170px; padding:2px">
<button type="submit" class="button" id="submit" tabindex="3">Submit</button>
<button type="reset" class="button" tabindex="4">Clear</button>
<button type="button" class="button" tabindex="5" onclick="window.location='{{route('hall')}}'">Return</button>
</div>
</form>
</div>
</div>
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
                url:"/hall",
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
