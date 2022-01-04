@extends('layouts.dashboard')
@section('menu')
  <section class="home-section">
    <div class="home-content">
      @include('navbar')
      <div style="width: 800px;margin-top:30px; background:#dfe6e9" class="center">
        <header><i class="fa fa-home" aria-hidden="true"></i> / Category Maintenance / Insert Form</header>
        <div>
        <form action="{{route('category_insert_data')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        {{csrf_field()}}
        <div style="float: right; margin-right:30px">
          <img src="" alt="" id="image" >
          </div>
          <div>
          <span>
          <label for="code"> Code :</label>
          <input  type="text" id="code" name="code" class="form-control" size= "7" value="{{ str_pad($category, 3, '0', STR_PAD_LEFT) }}" readonly>
          </span>
          <span style="margin-left:92px">
          <label for="status">Status : </label>
          <select name="status" id="status" style="height:20px;" class="form-control" tabindex="4">
          <option value="A">ACTIVE</option>
          <option value="N">NOT ACTIVE</option>
          </select>
          </span>
          </div>
          <div class="" >
          <label for="description"  > Description : </label>
          <input  type="text" id="description" name="description" class="form-control" size="60" maxlength="40" tabindex="1" autofocus>
          </div>
          <div id="description_error"></div>
          {{-- <div class="" >
          <label for="web_index" for="web_index">Web Index :</label>
          <input type="text" id="web_index" name="web_index" class="form-control" size="7" maxlength="6" tabindex="2" onkeypress="validate(event)">
          </div>
          
          <div class="" >
           <label for="web_status" >Web Status :</label>
          <select name="web_status" id="web_status" style="height:20px;" class="form-control col5" tabindex="3">
          <option value="Y"> YES</option>
          <option value="N"> NO</option>
          </select>
          </div> --}}
        
          {{-- <div class="row">
          <label for=""></label>
          <label  class="file" style="margin-left: 0px !important">
            <input type="file" name="image" id="" class="form-control" style=" width:200px" onchange="loadfile(event)" tabindex="5">
            <span class="file-custom" id="file_name">Choose File...</span>
          </label>
          </div> --}}
        
          <hr class="style1">
        
        <div class="row" style="margin: 0 170px; padding:2px">
        <button type="submit" id="submit" class="button">Submit</button>
        <button type="reset" class="button">Clear</button>
        <button type="button" class="button" onclick="window.location='{{route('category')}}'">Return</button>
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
                        url:"/category",
                        data:{
                            description: $("#description").val(),
                            _token: _token,
                        },
                        success:function(response){
                            if(response != ''){
                                $code = response.tctgcod;
                                $('#description_error').text("This Description is already exist on Code# ").append($code).addClass("alert");
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