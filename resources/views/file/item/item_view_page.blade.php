@extends('layouts.dashboard')
@section('menu')
<div>
<div style="width: 920px; margin-top:30px; background:#dfe6e9" class="center">
<header><i class="fa fa-home" aria-hidden="true"></i> / Item Maintenance / Update Form</header>
<div>
<form action="{{route('item_update_data', $item->id )}}" method="POST" enctype="multipart/form-data" autocomplete="off">
{{csrf_field()}}
{{-- <div style="width:28%;  float:right; overflow:hidden;">
	@if (isset($data->image))
	<img src="{{asset('image/' . $data->image)}}" alt="company image" class="image_frame" id="image">
	@else
	<img src="{{asset('img/no_image.png')}}" alt="no company image" class="image_frame" id="image">
	@endif
</div> --}}
<div>
    <span>
    <label>Model:</label>
    <input  type="text" name="titmcod" id="code" readonly class="form-control" value="{{$item->titmcod}}" maxLength="15" onkeyup="autoMove(this,'status')" tabindex="1">
</span>
    <span >
        <label style="margin-left: 2.3% !important">Item Status:</label>
        <select name="titmsts" id="status" class="form-control col5" tabindex="2" disabled> 
            <option value="A" @if($item->titmsts == "A") ? selected : null @endif> ACTIVE</option>
            <option value="N" @if($item->titmsts == "N") ? selected : null @endif> NOT ACTIVE</option>
        </select>
    </span>
    <div id="code_error"></div>
</div>
<div>
<label> Description:</label>
    <input  type="text" name="titmdsc" readonly id="description" class="form-control" value="{{$item->titmdsc}}" maxlength="40" onkeyup="length(this,'Warranty')" size="60" tabindex="3">
</div>
<div id="description_error"></div>
{{-- <div>
    <label> Warranty:</label>
    <input  type="text" name="twrndsc" readonly id="Warranty" value="{{$item->twrndsc}}" class="form-control" tabindex="4" size="60" maxLength="40">
</div> --}}

{{-- <div >
    <label >Company:</label>
    <input type="text" name="tcmpcod" readonly id="" value="{{$data->tcmpdsc}}" tabindex="5" class="form-control company_code" onkeypress='validate(event)' size="60">
    
</div> --}}
<div>
    <label> Category:</label>
        <input type="text" name="tctgcod" readonly tabindex="6" value="{{$item->tctgdsc}}" id=""  class="form-control category_code" size="60">
</div>
<div>
    <span>
        <label> Purchase Rate:</label>
        <input  type="text" name="tpurrat" readonly tabindex="11" value="{{$item->tpurrat}}" id="tpurrat" class="form-control right format" placeholder="0.00" onkeypress='validate(event)' >        
    </span>
    <span>
        <label> Sale Rate:</label>
        <input  type="text" name="tsalrat" readonly id="tsalrat" value="{{$item->tsalrat}}"  class="form-control right format" tabindex="13" placeholder="0.00" onkeypress='validate(event)' >    
    </span>
</div> 

{{-- <div>
	<label> Capacity:</label>
        <input type="text" name="tcapcod" readonly tabindex="7" id="" value="{{$data->tcapdsc}}" class="form-control capacity_code" size="60">
</div> --}}
{{-- <div class="row">
    <label>Type:</label>
    <span>
        <select name="ttypcod" id="status" class="form-control col6" tabindex="8" disabled>
            <option value=""> Select</option>
        </select>
    </span>
    <span style="width:28%;  float:right; overflow:hidden;">
        <label  class="file" style="margin-left: 0px !important">
            <input type="file" name="image"  class="form-control" style=" width:200px" onchange="loadfile(event)" tabindex="24" disabled>
            <input type="hidden" name="old_image"  class="form-control" value="{{$data->image}}">
            <span class="file-custom" id="file_name">Choose File...</span>
            </label>
    </span>
</div>
</div>
<hr class="style2 ">
<div>
    <span>
        <label> Reorder Level:</label>
        <input  type="text" name="titmlev" readonly value="{{$data->titmlev}}" class="form-control right format" tabindex="9" id="reorder" onkeypress='validate(event)' placeholder="0.00">    
    </span>
    <span>
    <label > UOM:</label>
    <select  type="text" disabled name="titmuom" readonly value="{{$data->titmuom}}" class="form-control col5" id="uom" tabindex="10" maxlength="3" >
        <option value="NOS" selected>NOS</option>
        <option value="LTR">LTR</option>
        <option value="KGS">KGS</option>
        <option value="FAT">FAT</option>
        <option value="MTR">MTR</option>
        <option value="SQF">SQF</option>
    </select>
    </span>
</div>
<hr class="style2">
<div>
    <span>
        <label> Purchase Rate:</label>
        <input  type="text" name="tpurrat" readonly tabindex="11" value="{{$data->tpurrat}}" id="tpurrat" class="form-control right format" placeholder="0.00" onkeypress='validate(event)' >        
    </span>
<span>
	<label> Saleman Rate:</label>
	<input  type="text" name="tmanrat" readonly id="tmanrat" value="{{$data->tmanrat}}" class="form-control right format" tabindex="12" placeholder="0.00" onkeypress='validate(event)' >
</span>
</div>
<div>
    <span>
        <label> Sale Rate:</label>
        <input  type="text" name="tsalrat" readonly id="tsalrat" value="{{$data->tsalrat}}"  class="form-control right format" tabindex="13" placeholder="0.00" onkeypress='validate(event)' >    
    </span>
    <span>
        <label style="color:red">MRP:</label>
        <input type="text" name="trtlrat" id="trtlrat" readonly value="{{$data->trtlrat}}" class="form-control right format" tabindex="14" placeholder="0.00" onkeypress='validate(event)' >
    </span>
</div>
<div>
    <label> Fix Rate:</label>
	<input  type="text" name="tfixrat" id="tfixrat" readonly value="{{$data->tfixrat}}" class="form-control right format" tabindex="15" placeholder="0.00" onkeypress='validate(event)' >
</div>
<div>
    <span>
        <label> Halaf Rate:</label>
        <input  type="text" name="thlfrat" id="thlfrat" readonly value="{{$data->thlfrat}}" class="form-control right format" tabindex="16" placeholder="0.00"onkeypress='validate(event)' >    
    </span>
     <span>
        <label> Actual Rate:</label>
        <input  type="text" name="tactrat" id="tactrat" readonly value="{{$data->tactrat}}" class="form-control right format" tabindex="17" placeholder="0.00"onkeypress='validate(event)' >
	</span>
</div>
<div>
    <span>
        <label> INS%:</label>
        <input  type="text" name="tinsprc" id="tinsprc" readonly value="{{$data->tinsprc}}" class="form-control right format" tabindex="18" placeholder="0.00" onkeypress='validate(event)' >    
    </span>
    <span>
        <label> INS Rate:</label>
        <input type="text" name="tinsrat" id="tinsrat" readonly value="{{$data->tinsrat}}" class="form-control right format" tabindex="19" placeholder="0.00" onkeypress='validate(event)' >
    </span>
</div>
<hr class="style2 ">
<div>
    <span>
        <label> Web Code:</label>
        <input  type="text" name="twebcod" id="twebcod" readonly value="{{$data->twebcod}}" class="form-control right format" tabindex="20" placeholder="0.00"onkeypress='validate(event)' >    
    </span>
    <span>
        <label> Web Status:</label>
        <select name="" id="status" class="form-control col5" tabindex="21" disabled>
            <option value="Y" @if($data->titmsts == "Y") ? selected : null @endif> YES</option>
            <option value="N" @if($data->titmsts == "N") ? selected : null @endif> NO</option>
    </select>
    </span>
</div>
<div>
    <span>
        <label> Web Rate:</label>
        <input  type="text" name="twebrat" id="twebrat" readonly value="{{$data->twebrat}}" onkeypress='validate(event)' tabindex="22" class="form-control right format" placeholder="0.00">    
    </span>
    <span>
        <label> Web Discount:</label>
        <input  type="text" name="twebrat" id="twebrat" readonly value="{{$data->twebrat}}" class="form-control right format" tabindex="23" placeholder="0.00" onkeypress='validate(event)' >
    </span>
</div> --}}


<hr class="style1 ">
<div  style="margin-left: 200px; padding:5px 0">
<button type="button" class="button" tabindex="27" onclick="window.location='{{route('item')}}'">Return</button>
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
                <input type="text" placeholder="Search..." id="myInput2" onkeyup="myFunction2()" class="form-control " style="display: block; margin-left: 380px">
                <table class="table categoryTable" id="myTable2">
                    <thead class="">
                        <tr id="">
                            <th scope="col" width="100px">Code</th>
                            <th scope="col" width="370px">Description</th>
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

       // code to read selected table row cell data (values).
   $(".companyTable").on('click','#companySelect',function(){
        // get the current row
        var currentRow=$(this).closest("tr");

        var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
        var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
        $('.company_code').val(col2);
        companyModal.style.display = "none";
        $(".company_code").focus();
   });

   $(".categoryTable").on('click','#categorySelect',function(){
        // get the current row
        var currentRow=$(this).closest("tr");

        var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
        var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
        $('.category_code').val(col2);
        categoryModal.style.display = "none";
        $(".category_code").focus();
   });


   $(".capacityTable").on('click','#capacitySelect',function(){
        // get the current row
        var currentRow=$(this).closest("tr");

        var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
        var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
        $('.capacity_code').val(col2);
        capacityModal.style.display = "none";
        $(".capacity_code").focus();
   });


    $('form').submit(function () {
        if ($('#description').val() == '' && $('#code').val() == '') {
            $('#description_error')
                .text("Please fill out this field.")
                .addClass("alert").css('margin-left','30px');
            $('#description').css('border', 'thin solid red');
            $('#code_error')
                .text("Please fill out this field.")
                .addClass("alert").css('margin-left','30px');
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
                .addClass("alert").css('margin-left','30px');
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
                .addClass("alert").css('margin-left','30px');
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

    // Company Modal
    var company_modal_close = document.getElementsByClassName("company_modal_close")[0];
    var companyBtn = document.getElementById("companyBtn");
    var companyModal = document.getElementById("companyModal");

    companyBtn.onclick = function() {
    companyModal.style.display = "block";
}
window.onclick = function(event) {
    if (event.target == companyModal) {
        companyModal.style.display = "none";
    }
}

company_modal_close.onclick = function() {
    companyModal.style.display = "none";
}
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

category_modal_close.onclick = function() {
    categoryModal.style.display = "none";
}

 // Capacity Modal
 var capacity_modal_close = document.getElementsByClassName("capacity_modal_close")[0];
    var capacityBtn = document.getElementById("capacityBtn");
    var capacityModal = document.getElementById("capacityModal");
    capacityBtn.onclick = function() {
    capacityModal.style.display = "block";
}
window.onclick = function(event) {
    if (event.target == capacityModal) {
        capacityModal.style.display = "none";
    }
}

capacity_modal_close.onclick = function() {
    capacityModal.style.display = "none";
}

});
</script>
@endsection
