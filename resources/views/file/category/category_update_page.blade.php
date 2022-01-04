@extends('layouts.dashboard')
@section('menu')
  <section class="home-section">
    <div class="home-content">
      @include('navbar')
      
<div style="width: 800px;margin-top:30px; background:#dfe6e9" class="center">
  <header><i class="fa fa-home" aria-hidden="true"></i> / Category Maintenance / Update Form</header>
  <div>
  <form action="{{route('category_update_data', $category->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
  {{csrf_field()}}
  {{-- <div style="float: right;margin-right:30px">
    <input type="hidden" name="old_image"  class="form-control" value="{{$category->tctgpic}}">
    @if (isset($category->tctgpic))
    <img src="{{asset('image/' . $category->tctgpic)}}" alt="company image" class="image_frame" id="image">
    @else
    <img src="{{asset('img/no_image.png')}}" alt="no company image" class="image_frame" id="image">
    @endif --}}
  </div>
    <div>
    <span>
    <label for="code"> Code :</label>
    <input  type="text" id="code" name="code" class="form-control" size= "7" value="{{$category->tctgcod}}" readonly>
    </span>
    <span style="margin-left:92px">
    <label for="status">Status : </label>
    <select name="status" id="status" style="height:20px;" class="form-control" tabindex="4">
      <option value="A" @if($category->tctgsts == "A") ? selected : null @endif> ACTIVE</option>
      <option value="N" @if($category->tctgsts == "N") ? selected : null @endif> NOT ACTIVE</option>
    </select>
    </span>
    </div>
    <div class="" >
    <label for="description"  > Description : </label>
    <input  type="text" id="description" name="description" value="{{$category->tctgdsc}}" class="form-control" size="60" maxlength="40" tabindex="1" autofocus>
    </div>
    <div id="description_error"></div>
    {{-- <div class="" >
    <label for="web_index" for="web_index">Web Index :</label>
    <input type="text" id="web_index" name="web_index" class="form-control" value="{{$data->web_index}}" size="7" maxlength="6" tabindex="2" onkeypress="validate(event)">
    </div>
    
    <div class="" >
     <label for="web_status" >Web Status :</label>
    <select name="web_status" id="web_status" style="height:20px;" class="form-control col5" tabindex="3">
    <option value="Y" @if($data->twebsts == "Y") ? selected : null @endif> YES</option>
    <option value="N" @if($data->twebsts == "N") ? selected : null @endif> NO</option>
    </select>
    </div>
  
    <div class="row">
    <label for=""></label>
    <label  class="file" style="margin-left: 0px !important">
      <input type="file" name="image"  class="form-control" style=" width:200px" onchange="loadfile(event)" tabindex="5">
      <span class="file-custom" id="file_name">Choose File...</span>
    </label>
    </div> --}}
  
  <hr class="style1">
  <div class="row" style="margin: 0 170px; padding:2px">
  <button type="submit" class="button" id="submit">Submit</button>
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






