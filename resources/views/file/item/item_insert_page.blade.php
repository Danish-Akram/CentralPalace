@extends('layouts.dashboard')
@section('menu')
<div>
<div style="width: 920px; margin-top:30px; background:#dfe6e9" class="center">
<header><i class="fa fa-home" aria-hidden="true"></i> / Item Maintenance / Insert Form</header>
<div>
<form action="{{route('item_insert_data')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
{{csrf_field()}}
<div style="width:28%;  float:right; overflow:hidden;">

<img src="" id="image" alt="" >
</div>
<div>
    <span>
    <label>Model:</label>
    <input  type="text" name="titmcod" id="code" autofocus class="form-control" maxLength="15" value="{{ $id }}" onkeyup="autoMove(this,'status')" 1">
</span>
    <span >
        <label style="margin-left: 2.3% !important">Item Status:</label>
        <select name="titmsts" id="status" class="form-control col5" 2">
            <option value="A"> Active</option>
            <option value="N"> Not Active</option>
        </select>
    </span>
    <div id="code_error"></div>
</div>
<div>
<label> Description:</label>
    <input  type="text" name="titmdsc" id="description" class="form-control" maxlength="40" onkeyup="length(this,'Warranty')" size="60" >
</div>
<div id="description_error"></div>


<div>
    <label> Category:</label>
        <input type="text" name="tctgdsc" id="categoryBtn"  class="form-control categoryName" size="60">
        <input type="text" name="tctgcod" hidden  id=""  class="form-control categoryCode" size="60">

</div>

<div>
    <span>
        <label> Purchase Rate:</label>
        <input  type="text" name="tpurrat" id="tpurrat" class="form-control right format" placeholder="0.00" onkeypress='validate(event)' >        
    </span>
    <span>
        <label> Sale Rate:</label>
        <input  type="text" name="tsalrat" id="tsalrat" class="form-control right format" placeholder="0.00" onkeypress='validate(event)' >    
    </span>
</div>


<hr class="style1 ">
<div  style="margin-left: 200px; padding:5px 0">
<button type="submit" class="button" id="submit" 25">Submit</button>
<button type="reset" class="button" 26">Clear</button>
<button type="button" class="button" 27" onclick="window.location='{{route('item')}}'">Return</button>
</div>

</div>
</form>




 {{-- The Modal for Category  --}}
 <div id="categoryModal" class="modal">
    {{--  Modal content  --}}
    <div class="modal-content">
        <div class="modal-header">
            <span class="category_modal_close">&times;</span>
            <header>
                <i class="fa fa-home" aria-hidden="true"></i> / Item Maintenance / Category
            </header>
        </div>
        <div class="modal-body">
            <div style="height: 380px; overflow-y: auto">
                <input type="text" placeholder="Search..." id="myInput2" onkeyup="myFunction2()" class="form-control " style="display: block; margin-left: 426px">
                <table class="table categoryTable" id="myTable2">
                    <thead class="">
                        <tr id="">
                            <th scope="col" width="145px">Code</th>
                            <th scope="col" width="445px">Description</th>
                        </tr>
                    </thead>
                @foreach($categories as $_categories)
                    <tbody>
                        <tr class="" id="categorySelect" >
                            <td scope="row">{{$_categories->tctgcod}}</td>
                            <td>{{$_categories->tctgdsc}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function () {



   $(".categoryTable").on('click','#categorySelect',function(){
        // get the current row
        var currentRow=$(this).closest("tr");

        var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
        var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
        $('.categoryCode').val(col1);
        $(".categoryName").val(col2);
        categoryModal.style.display = "none";

   });

 // Category Modal
 var category_modal_close = document.getElementsByClassName("category_modal_close")[0];
    var categoryBtn = document.getElementById("categoryBtn");
    var categoryModal = document.getElementById("categoryModal");
    categoryBtn.onclick = function() {
    categoryModal.style.display = "block";
}
window.onclick = function(event) {
    if (event.target == categoryModal) {
        categoryModal.style.display = "none";
    }
}


    $('form').submit(function () {
        if ($('#description').val() == '' && $('#code').val() == '') {
            $('#description_error')
                .text("Please fill out this field.")
                .addClass("alert").css('margin-left','22px');
            $('#description').css('border', 'thin solid red');
            $('#code_error')
                .text("Please fill out this field.")
                .addClass("alert").css('margin-left','22px');
            $('#code').css('border', 'thin solid red');
            $("#description").click(function () {
                $("#description").removeAttr("style");
                $('#description').addClass('form-control');
                $('#description_error').text("");
            });
            $("#code").click(function () {
                $("#code").removeAttr("style");
                $('#code').addClass('form-control');
                $('#code_error').text("");
            });
            return false;
        } else if ($('#code').val() == '' || $.trim($('#code').val()) == '') {
            $('#code_error')
                .text("Please fill out this field.")
                .addClass("alert").css('margin-left','22px');
            $('#code').css('border', 'thin solid red');
            $("#code").click(function () {
                $("#code").removeAttr("style");
                $('#code').addClass('form-control');
                $('#code_error').text("");
            });
            return false;
        } else if ($('#description').val() == '' || $.trim($('#description').val()) == '') {
            $('#description_error')
                .text("Please fill out this field.")
                .addClass("alert").css('margin-left','22px');
            $('#description').css('border', 'thin solid red');
            $("#description").click(function () {
                $("#description").removeAttr("style");
                $('#description').addClass('form-control');
                $('#description_error').text("");
            });
            return false;
        }
    });

    $('#reorder, #tpurrat, #tmanrat, #tsalrat, #trtlrat, #tfixrat, #thlfrat, #tactrat, #tinsprc, #tinsrat, #twebcod, #twebrat').
    focusout(function(){
        if($('#reorder').val() < 0){
            $('#reorder').val(0);
            alert('Negative value not allowed');
        }
        else if($('#tpurrat').val() < 0){
            $('#tpurrat').val(0);
            alert('Negative value not allowed');
        } else if($('#tmanrat').val() < 0){
            $('#tmanrat').val(0);
            alert('Negative value not allowed');
        } else if($('#tsalrat').val() < 0){
            $('#tsalrat').val(0);
            alert('Negative value not allowed');
        } else if($('#trtlrat').val() < 0){
            $('#trtlrat').val(0);
            alert('Negative value not allowed');
        } else if($('#tfixrat').val() < 0){
            $('#tfixrat').val(0);
            alert('Negative value not allowed');
        } if($('#thlfrat').val() < 0){
            $('#thlfrat').val(0);
            alert('Negative value not allowed');
        } else if($('#tactrat').val() < 0){
            $('#tactrat').val(0);
            alert('Negative value not allowed');
        } else if($('#tinsrat').val() < 0){
            $('#tinsrat').val(0);
            alert('Negative value not allowed');
        } else if($('#twebcod').val() < 0){
            $('#twebcod').val(0);
            alert('Negative value not allowed');
        } else if($('#twebrat').val() < 0){
            $('#twebrat').val(0);
            alert('Negative value not allowed');
        } 
        else if($('#tinsprc').val() < 0){
            $('#tinsprc').val(0);
            alert('Negative value not allowed');
        } 
    });


$('#description').blur(function(){
            var _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:"POST",
                url:"/item",
                data:{
                    description: $("#description").val(),
                    _token: _token,
                },
                success:function(response){
                    if(response != ''){
                        $code = response.titmcod;
                        $('#description_error').text("This Description is already exist on Code# ").append($code)
                        .addClass("alert").css('margin-left','22px');
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
