@extends('layouts.dashboard')
@section('menu')
@php
$dt = new DateTime();
$tz = new DateTimeZone('Asia/Karachi');
$dt->setTimeZone($tz);
@endphp
      <div style="width: 1000px;margin-top:30px; background:#dfe6e9" class="center">
        <header><i class="fa fa-home" aria-hidden="true"></i> / Customer Booking Maintenance / View Form</header>
        <div>
        <form action="{{route('customerBooking_update_data',$glkey->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
        {{csrf_field()}}
        <div style="float: right; margin-right:30px">
          <img src="" alt="" id="image" >
          </div>
          <div class="row">
              <span>
                <label style="width: 8% !important" for="bookigId">Booking ID :</label>
                <input type="text" name="bookingId" size="10" readonly class="form-control" id="" readonly value="{{ $glkey->ttrnnum}}">
              </span>
           
                <span style="margin-left:358px">
                    <label style="width: 99px !important; margin-left:11px" for="">Booking Date :</label>
                    <input type="text" name="bookingDate" size="10"  class="form-control" id="" readonly style="width: 130px !important"  value="{{ $glkey->ttrndat}}">
                </span> 
                <span>
                    <label style="width:50px !important; margin-left:10px !important" for="time">Time :</label>
                    <input type="text" name="bookingtime" size="5" style="width:80px" readonly class="form-control" id="time" value="{{ $glkey->ttrntim}}" >
                </span>  
          </div>
          <div>
                <label style="width: 8% !important" for="code"> Code :</label>
                <input  type="text" id="cusBftn" name="cusCode" value="{{ $glkey->trefcod}}" class="form-control cusCode" size= "10" readonly style="background-color: #d1ccc0">    
                <input  type="text" id="cusName" name="cusName" value="{{ $glkey->tcstnam}}" class="form-control cusName" size="60" maxlength="40" readonly>      
          </div>
          <div>
                <label style="width: 8% !important" for="description"  > Remarks : </label>
                <input  type="text" id="cusRemarks" readonly name="cusRemarks" value="{{ $glkey->ttrnrem}}" class="form-control" size="60" maxlength="40">      
        </div>
          <div >
                <label style="width: 8% !important"> Address 1 :</label>
                <input  type="text" name="address1"  class="form-control address1"  maxLength="40" size="60" value="{{ $glkey->tcstadd1}}"  readonly>    
        </div>       
        <div>
                <label style="width: 8% !important"> Address 2 :</label>
                <input  type="text" name="address2" class="form-control address2"  maxLength="40" size="60" value="{{ $glkey->tcstadd2}}" readonly>    
        </div>
        <div class="row">
                <label  style="width: 8% !important"> Email : </label>
                <input  type="email" name="email" class="form-control email" id="email" readonly value="{{ $glkey->tcstema}}" size="60" maxlength = "40"  >    
        </div>
        <div>
            <span>
                <label  style="width: 8% !important"> Mobile : </label>
                <input  type="text" name="mobile" class="form-control mobile" id="mobile" readonly value="{{ $glkey->tphnnum}} " maxlength = "11" onkeypress='validate(event)'>    
            </span>
            <span>
                <label style="width: 75px !important" > NIC : </label>
                <input  type="text" name="nic" id="nic" class="form-control nic" readonly maxlength = "15" onkeypress='validate(event)' value=" {{ $glkey->tcstnic}} " >    
            </span>
            <span  >
                <span style="border-left: 2px solid #4096C4"></span>
                <label style="width: 8% !important" for="">Event Date :</label>
                <input type="date" name="eventDate" size="10"  class="form-control" disabled id="" style="width: 130px !important"  value="{{ $glkey->tevtdat}}">
            </span>
        </div>
        <div>
            <span>
                <label style="width: 80px !important" > Hall : </label>
                <input  type="text" name="hallname" size="60" id="hallBtnd" value="{{ $hallDes->description}}" class="form-control hallName" readonly style="background-color: #d1ccc0">   
                <input  type="text" name="hallCode" size="60" id="" class="form-control hallCode" hidden>        
     
            </span>
            <span >
                <span style="border-left: 2px solid #4096C4"></span>
                <label style="width: 11% !important; margin-left:0px !important" for="code"> No of Guest :</label>
                <input  type="text" id="numGuest" name="numGuest" size="10" readonly class="form-control right format guest" value="{{ $glkey->tgstnum}}"  onkeypress='validate(event)'>      
              </span>
              <span>
                <label style="display: inline !important; width: 40px !important; margin-left:21px !important"> Per Head :</label>
                <input  type="text" name="perHead" size="10" readonly class="form-control right format perHead" value="{{ $glkey->tperhed}}" onkeypress='validate(event)'>
            </span>
        </div>
        <div>
            <span>
                <label  style="width: 8% !important"> Function : </label>
                <input  type="text" name="funName" class="form-control funName" id="funBtnd" style="background-color: #d1ccc0" value="{{ $funDes->description}}" maxlength = "11" onkeypress='validate(event)'>
                <input  type="text" name="funCode" class="form-control funCode" hidden maxlength = "11" onkeypress='validate(event)'>    
    
            </span>
            <span>
                <label  style="width: 75px !important"> Employee : </label>
                <input  type="text" name="employeeName" class="form-control employeeName" id="empBtnd" style="background-color: #d1ccc0"  value="{{ $empDes->name}}"  maxlength = "11" onkeypress='validate(event)'>    
                <input  type="text" name="employeeCode" hidden class="form-control employeeCode" id="empBtn" style="background-color: #d1ccc0" maxlength = "11" onkeypress='validate(event)'>    
            </span>
            <span  style="">
                <span style="border-left: 2px solid #4096C4"></span>
                <label for="" style="width: 8% !important;" for="timeFrom">Time From :</label>
                <input type="text" name="timefrom" size="10" readonly class="form-control" id="timeFrom" value="{{ $glkey->ttimfrm}}">
            </span> 
            <span>
                <label style="display: inline !important; margin-left:26px" for="timeTo">Time To :</label>
                <input type="text" name="timeto" size="10" readonly class="form-control" id="timeTo" value="{{ $glkey->ttimtoo}}">
            </span> 
        </div>

        <hr class="style1">
        <span style="height: 190px; width:680px;display:inline-block; margin:none !important; overflow-y:scroll">
            <table class="table" id="#table2">
                <thead class="">
                <tr>
                    <th scope="col" width="100px">Sr #</th>
                    <th scope="col" width="100px" id="myBtnd">No</th>
                    <th scope="col" width="390px">Description</th>
                    {{-- <th scope="col" width="70px" >Qnty</th>
                    <th scope="col" width="70px">Rate</th>
                    <th scope="col" width="70px">Amount</th> --}}
                    <th scope="col" width="90px">Category</th>
                    <th scope="col"></th>

                </tr>
                </thead>
                <tbody id="mybody">
                    @foreach ($bookitm as $table)
                    <tr>
                        <td> {{ $table->tsernum }}</td>
                        <td>{{ $table->titmcod }}</td>
                        <td>{{ $table->titmdsc }}</td>
                        <td>{{ $table->tctgdsc }}</td>
                        <!-- <td><i class='fa fa-trash' aria-hidden='true'></i></td> -->
                    </tr>
                @endforeach
                </tbody>
            </table>
  
        </span>
          <span style="float: right; width:320px;">
                        <span class="row">
                            <label style="width:40% !important;" >Hall Charges :</label>
                            <input  type="text" name="hallChg" readonly class="form-control right format hallChg"  value="{{ $glkey->thalchg}}" onkeypress='validate(event)'>
                        </span>
                        <span class="row">
                            <label style="width:40% !important;"> AC Charges:</label>
                            <input  type="text" name="acChg" readonly class="form-control right format acChg" value="{{ $glkey->tacchg}}" onkeypress='validate(event)'>
                        </span>
                        <span class="row">
                            <label style=" width:40% !important;"> Decore Charges :</label>
                            <input  type="text" name="decorChg" readonly class="form-control right format decorChg"   value="{{ $glkey->tdecchg}}" onkeypress='validate(event)'>
                        </span>
                        <span class="row">
                            <label style="width:40% !important;"> DJ Charges :</label>
                            <input  type="text" name="djChg" readonly class="form-control right format djChg"   value="{{ $glkey->tdjchg}}" onkeypress='validate(event)'>
                        </span>
                        <span class="row">
                            <label style="width:40% !important;"> Heating Charges :</label>
                            <input  type="text" name="haetingChg" readonly class="form-control right format heatingChg"  value="{{ $glkey->thetchg}}" onkeypress='validate(event)'>
                        </span>
                        <hr class="style2">
                        <span class="row">
                            <label style="width:40% !important;"> Total Amount :</label>
                            <input  type="text"name="totalAmt" readonly class="form-control right format totalAmt"   value="{{ $glkey->ttrntot}}" onkeypress='validate(event)'>
                        </span>
                        <span class="row">
                            <label style="width:40% !important;">Advance :</label>
                            <input  type="text" name="advance" readonly  class="form-control right format advAmt"   value="{{ $glkey->tadvamt}}" onkeypress='validate(event)'>
                        </span>
                        <span class="row">
                            <label style="width:40% !important;"> Balance :</label>
                            <input  type="text" name="balance" readonly class="form-control right format balance"   value="{{ $glkey->tbalamt}}" onkeypress='validate(event)'>
                        </span>
            </span>
        </div>


<hr class="style1">
        
<div class="row" style="margin: 0 170px; padding:2px">
<button type="button" class="button" onclick="window.location='{{route('customerBooking')}}'">Return</button>
</div>
</form>
</div>
</div>
</div>

<!-- The Modal for Item code and expense -->
<div id="advanceModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content-1">
      <div class="modal-header">
          <span class="advance_modal_close">&times;</span>
          <header>
              <i class="fa fa-home" aria-hidden="true"></i> / Item Sale Maintanance / Item Info
          </header>
      </div>
     
      <div class="modal-body">
          <div style="height: 250px;overflow-y: scroll; ">
              <input type="text" placeholder="Search..." id="myInput" onkeyup="myFunction()" class="form-control" >
              <table class="table advanceTable custable" id="myTable" style="">
                  <thead>
                      <tr>
                          <th scope="col" width="100px">Code</th>
                          <th scope="col" width="445px">Description</th>
                          <th scope="col" width="100px">Category</th>
                        

                      </tr>
                  </thead>
                  @foreach($item as $_data)
                  <tbody>
                      <tr class="" id="itemBtn" >
                          <td scope="row">{{$_data->titmcod}}</td>
                          <td>{{$_data->titmdsc}}</td>
                          <td>{{$_data->tctgdsc}}</td>
                      </tr>
                  </tbody>
                  @endforeach
              </table>
          </div>
          <div class="modal-footer">
              <br>
          </div>
      </div>
  </div>
</div>

<!-- The Modal for customer -->
<div id="customerModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="itemSale_cust_modal_close">&times;</span>
            <header>
                <i class="fa fa-home" aria-hidden="true"></i> / Customer Info
            </header>
        </div>
        <div class="modal-body">
            <div style="height: 350px; overflow-y: scroll">
                <input type="text" placeholder="Search..." id="myInput2" onkeyup="myFunction2()" class="form-control">
                <table class="table expenseTable" id="myTable2">
                    <thead >
                        <tr>
                            <th width="100px">Code</th>
                            <th width="445px">Name</th>
                        

                        </tr>
                    </thead>
                    @foreach($customer as $_data)
                    <tbody>
                        <tr id="btnSelect1" >
                            <td>{{$_data->tcstcod}}</td>
                            <td>{{$_data->tcstnam}}</td>
                            <td hidden>{{$_data->tcstadd1}}</td>
                            <td hidden>{{$_data->tcstadd2}}</td>
                            <td hidden>{{$_data->tcstema}}</td>
                            <td hidden>{{$_data->tphnnum}}</td>
                            <td hidden>{{$_data->tcstnic}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <br>
            </div>
        </div>
    </div>
</div>


<!-- The Modal for Employee -->
<div id="employeeModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="itemSale_emp_modal_close">&times;</span>
            <header>
                <i class="fa fa-home" aria-hidden="true"></i> / Employee Info
            </header>
        </div>
        <div class="modal-body">
            <div style="height: 350px; overflow-y: scroll">

                <table class="table employeeTable" id= "myTable3">
                    <input type="text" placeholder="Search..." id="myInput3" onkeyup="myFunction3()" class="form-control ">
                    <thead class="">
                        <tr id="">
                            <th scope="col" width="100px">Code</th>
                            <th scope="col" width="445px">Description</th>
                        </tr>
                    </thead>
                    @foreach($employee as $_data)
                    <tbody>
                        <tr class="" id="btnSelect2" >
                            <td scope="row">{{$_data->code}}</td>
                            <td>{{$_data->name}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <br>
            </div>
        </div>
    </div>
</div>

<!-- The Modal for hall -->
<div id="hallModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="company_modal_close">&times;</span>
            <header>
                <i class="fa fa-home" aria-hidden="true"></i> / Hall Info
            </header>
        </div>
        <div class="modal-body">
            <div style="height: 350px; overflow-y: scroll">

                <table class="table hallTable" id= "myTable3">
                    <input type="text" placeholder="Search..." id="myInput3" onkeyup="myFunction3()" class="form-control ">
                    <thead class="">
                        <tr id="">
                            <th scope="col" width="100px">Code</th>
                            <th scope="col" width="445px">Description</th>
                        </tr>
                    </thead>
                    @foreach($hall as $_data)
                    <tbody>
                        <tr class="" id="btnSelect3" >
                            <td scope="row">{{$_data->code}}</td>
                            <td>{{$_data->description}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <br>
            </div>
        </div>
    </div>
</div>


<!-- The Modal for function -->
<div id="functionModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="category_modal_close">&times;</span>
            <header>
                <i class="fa fa-home" aria-hidden="true"></i> / Fuction Info
            </header>
        </div>
        <div class="modal-body">
            <div style="height: 350px; overflow-y: scroll">

                <table class="table functionTable" id= "myTable3">
                    <input type="text" placeholder="Search..." id="myInput3" onkeyup="myFunction3()" class="form-control ">
                    <thead class="">
                        <tr id="">
                            <th scope="col" width="100px">Code</th>
                            <th scope="col" width="445px">Description</th>
                        </tr>
                    </thead>
                    @foreach($function as $_data)
                    <tbody>
                        <tr class="" id="btnSelect4" >
                            <td scope="row">{{$_data->code}}</td>
                            <td>{{$_data->description}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="modal-footer">
                <br>
            </div>
        </div>
    </div>
<script>

    // function add_to_total(el){
    //             var parent = $(el).closest('tr');
    //             var cost =  parent.find('#_cost').text() == "" ? 1 : parent.find('#_cost').text();
    //             var qunatity =  parent.find('#quantity').text() == "" ? 1 : parent.find('#quantity').text();
    //             var total = cost * qunatity;
    //             parent.find('#amount').val(total);
    
    //             console.log(total);
    // }
    $(document).ready(function(){
        $('#mybody').on('click', '.fa-trash', function(){
            $(this).closest('tr').remove();
        });
        $('#mobile').focusout(function(){
            console.log('sfsa');
            console.log($("#mobile").val());
    
            var _token   = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:"POST",
                    url:"/mobile",
                    data:{
                        mobile: $("#mobile").val(),
                        _token: _token,
                    },
                    success:function(response){
                        if(response != ''){
                            console.log(response);
                            $('#mobileStatus').val('Already Exist');
                            $('#name').val(response.tcstnam);
                            $('#address1').val(response.tadd001);
                            $('#address2').val(response.tadd002);
                            $('.saleManCode').val(response.tempcod);
    
                        }else{
                            $('#mobileStatus').val('New User');
                            $('#name').val("");
                            $('#address1').val("");
                            $('#address2').val("");
                            $('.saleManCode').val("");
                        }
                    }
                });
              });
        $('#mobile').focus(function(){
            $('#moblie_error').text("");
        });
        $('.custable .format').each(function(){
            const formatter = new Intl.NumberFormat('en');
            var x = parseFloat($(this).text());
            
            if ($.isNumeric(x)) {
                if (Math.floor(x) != x) {
                    $(this).text(formatter.format(x));
                }
                else{
                    y = formatter.format(x);
                    y += ".00"
                    $(this).text(y);
                }
            }
        });
        function numberWithCommas(number) {
            const formatter = new Intl.NumberFormat('en');
            
            if ($.isNumeric(number)) {
                if (Math.floor(number) != number) {
                   return formatter.format(number);
                }
                else{
                    y = formatter.format(number);
                    y += ".00"
                   return y
                }
            }
        };

        $('.guest, .perHead, .hallChg, .acChg, .decorChg, .djChg, .heatingChg, .totalAmt, .advAmt, .balance')
        .on('click input',function(){
            var guest = parseFloat($('.guest').val().replace(/,/g, ''));
            guest = guest || 0;
            var perHead = parseFloat($('.perHead').val().replace(/,/g, ''));
            perHead = perHead || 0;
            var hall = guest * perHead;
            hall = hall || 0;
            var _hall = numberWithCommas(hall);
            $('.hallChg').val(_hall);
            var acChg = parseFloat($('.acChg').val().replace(/,/g, ''));
            acChg = acChg || 0;
            var decorChg = parseFloat($('.decorChg').val().replace(/,/g, ''));
            decorChg = decorChg || 0;
            var djChg = parseFloat($('.djChg').val().replace(/,/g, ''));    
            djChg = djChg || 0;
            var heatingChg = parseFloat($('.heatingChg').val().replace(/,/g, ''));
            heatingChg = heatingChg || 0;
            var totalAmt = parseFloat($('.totalAmt').val().replace(/,/g, ''));
            totalAmt = totalAmt || 0;
            totalAmt = hall + acChg + decorChg + djChg + heatingChg ;
            var _totalAmt = numberWithCommas(totalAmt);
            $('.totalAmt').val(_totalAmt);
            var advAmt = parseFloat($('.advAmt').val().replace(/,/g, ''));
            advAmt = advAmt || 0;
            var balance = parseFloat($('.balance').val().replace(/,/g, ''));
            balance = balance || 0;
            balance = totalAmt - advAmt;
            var _balance = numberWithCommas(balance);
            $('.balance').val(_balance);
        });
            let lineNo = 0;
    
       // code to read selected table row cell data (values).
       $(".advanceTable").on('click','#itemBtn',function(){
            // get the current row
             var currentRow=$(this).closest("tr");
            var model=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            var description=currentRow.find("td:eq(1)").text(); // get current row 2nd TD        
            var category=currentRow.find("td:eq(2)").text(); // get current row 2nd TD        

            // var cost=currentRow.find("td:eq(2)").text(); // get current row 2nd TD   
            // var rate=currentRow.find("td:eq(3)").text(); // get current row 2nd TD   
    
       
    
            $('#mybody').append(`
            <tr id="R${++lineNo}">
                <td class="row-index"><p>${lineNo}</p></td>
                <td style="padding-left:0px !important"><input class="item form-control" readonly name="titmcod[]" size="10" value="${model}"></td>
                <td>${description}</td>
                <td>${category}</td>             
                <td><i class='fa fa-trash' aria-hidden='true'></i></td>
                </tr>`);
                advanceModal.style.display = "none";
                $('.cost, .quantity, .amount, .rate').on("click input",function(){

                var parent=$(this).closest("tr");
                var _cost = (parent.find('.cost').text() ); 
                var cost = parseFloat(_cost.replace(/,/g, '')); 
                var _qunatity =(parent.find('.quantity').text()); 
                var qunatity = parseFloat(_qunatity.replace(/,/g, ''));
                var _rate = (parent.find('.rate').text() ); 
                var rate = parseFloat(_rate.replace(/,/g, ''));
                var amount =(parent.find('.amount').text()); 
                var amount = rate * qunatity;
                amount = amount || 0;
                var number = numberWithCommas(amount);
                parent.find('.amount').text(number);
                var totalCost=0;
                var total = cost * qunatity;
                total = total || 0;
                var _total = numberWithCommas(total);
                parent.find('.total').text(_total);
                $("tr").each(function() {
                var _total = ($(this).find(".total").text());
            var total = parseFloat(_total.replace(/,/g, ''));
                total = total || 0;
                totalCost += total;
            });
            var totalQuantity=0;
                $("tr").each(function() {
                var quantity = parseFloat($(this).find(".quantity").text());
                quantity = quantity || 0;
                totalQuantity += quantity;
            });
            var totalAmount=0;
                $("tr").each(function() {
                var _amount = ($(this).find(".amount").text());
                var amount = parseFloat(_amount.replace(/,/g, ''));
                amount = amount || 0;
                totalAmount += amount;
            });
            var _totalCost = numberWithCommas(totalCost);
                $("#totalCost").val(_totalCost);   
            var _totalAmount = numberWithCommas(totalAmount);
                    $("#totalQuantity").val(totalQuantity); 
                    $("#totalAmount").val(_totalAmount); 
        });
    
    
            var totalRate=0;
                $("tr").each(function() {
                var _qunatity =$(this).find('.quantity').text(); 
                var qunatity = parseFloat(_qunatity.replace(/,/g, ''));
                var _rate = $(this).find('.rate').text(); 
                var rate = parseFloat(_rate.replace(/,/g, ''));
                totalRate = rate * qunatity;          
            });
            var _totalRate = numberWithCommas(totalRate);
            $(".amount").text(_totalRate); 
            var totalCost=0;
                $("tr").each(function() {
                var _cost = ($(this).find(".cost").text());
                var cost = parseFloat(_cost.replace(/,/g, ''));
                var quantity = $(this).find(".quantity").text();
                cost = cost || 0;
                qunatity = quantity || 0;
                var total = cost * qunatity;
                totalCost += total;
            });
            var _totalCost = numberWithCommas(totalCost);
            $("#totalCost").val(_totalCost);   
    
            var totalQuantity=0;
                $("tr").each(function() {
                var quantity = parseFloat($(this).find(".quantity").text());
                quantity = quantity || 0;
                totalQuantity += quantity;
            });
            $("#totalQuantity").val(totalQuantity); 
            var totalAmount=0;
                $("tr").each(function() {
                var amount = parseFloat($(this).find(".amount").text());
                amount = amount || 0;
                totalAmount += amount;
            });
            // var amount=0;
            //     $("tr").each(function() {
            //     var quantity = parseFloat($(this).find(".quantity").text());
            //     var _rate = ($(this).find(".rate").text());
            //     var rate = parseFloat(_rate.replace(/,/g, ''));
            //     var _cost = ($(this).find(".cost").text());
            //     var cost = parseFloat(_cost.replace(/,/g, ''));
            //     quantity = quantity || 0;
            //     rate = rate || 0;
            //     amount = cost;
            // });
            // $('.amount').text(amount);
        });
    
        $('#mybody').on('click', '.fa-trash', function(){
    // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest('tr').nextAll();
      
            // Iterating across all the rows 
            // obtained to change the index
            child.each(function () {
    
              // Getting <tr> id.
              var id = $(this).attr('id');
      
              // Getting the <p> inside the .row-index class.
              var idx = $(this).children('.row-index').children('p');
      
              // Gets the row number from <tr> id.
              var dig = parseInt(id.substring(1));
      
              // Modifying row index.
              idx.html(`${dig - 1}`);
      
              // Modifying row id.
              $(this).attr('id', `R${dig - 1}`);
             
            });
      
            // Removing the current row.
            $(this).closest('tr').remove();
            var totalCost=0;
            var _cost = ($(this).closest('tr').find(".cost").text());
            var cost = parseFloat(_cost.replace(/,/g, ''));
    
                cost = cost || 0;
                var __totalCost = $('#totalCost').val();
                var totalCost = parseFloat(__totalCost.replace(/,/g, ''));
                totalCost -= cost;
                var _totalCost =  numberWithCommas(totalCost);
                if(totalCost < 0 ){
                    $("#totalCost").val(0); 
                }else{
                    $("#totalCost").val(_totalCost); 
                }
                // var totalRate = 0;
                // var rate = ($(this).closest('tr').find(".rate").text());
                // rate = rate || 0;
                // totalRate = $('#totalRate').val();
                // totalRate -= rate;
                // $("#totalRate").val(totalRate);
                var totalQuantity = 0;
                var quantity = ($(this).closest('tr').find(".quantity").text());
                totalQuantity = $('#totalQuantity').val();
                quantity = quantity || 0;
    
                totalQuantity -= quantity;
                if(totalQuantity < 0){
                    $("#totalQuantity").val(0);
                }else{
                    $("#totalQuantity").val(totalQuantity);
                }
                var totalAmount = 0;
                var _amount = ($(this).closest('tr').find(".amount").text());
                var amount = parseFloat(_amount.replace(/,/g, ''));
    
                var __totalAmount = $('#totalAmount').val();
                var totalAmount = parseFloat(__totalAmount.replace(/,/g, ''));
    
                amount = amount || 0;
                totalAmount -= amount;
                var _totalAmount =  numberWithCommas(totalAmount);
                if(totalAmount < 0){
                    $("#totalAmount").val(0);
    
                }else{
                    $("#totalAmount").val(_totalAmount);
                }
            // Decreasing total number of rows by 1.
            lineNo--;
            
       });
       $(".expenseTable").on('click','#btnSelect1',function(){
            // get the current row
            var currentRow=$(this).closest("tr");
    
            var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
            var col3=currentRow.find("td:eq(2)").text(); // get current row 1st TD value
            var col4=currentRow.find("td:eq(3)").text(); // get current row 2nd TDvar col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            var col5=currentRow.find("td:eq(4)").text(); // get current row 2nd TD
            var col6=currentRow.find("td:eq(5)").text(); // get current row 1st TD value
            var col7=currentRow.find("td:eq(6)").text(); // get current row 2nd TD
            $('.cusCode').val(col1);
            $('.cusName').val(col2);
            $('.address1').val(col3);
            $('.address2').val(col4);
            $('.email').val(col5);
            $('.mobile').val(col6);
            $('.nic').val(col7);


            customerModal.style.display = "none";
       });
    });
    $(".employeeTable").on('click','#btnSelect2',function(){
            // get the current row
            var currentRow=$(this).closest("tr");
    
            var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
            $('.employeeCode').val(col1);
            $('.employeeName').val(col2);
            employeeModal.style.display = "none";
       });
       $(".hallTable").on('click','#btnSelect3',function(){
            // get the current row
            var currentRow=$(this).closest("tr");
    
            var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
            $('.hallCode').val(col1);
            $('.hallName').val(col2);
            hallModal.style.display = "none";
       });
       $(".functionTable").on('click','#btnSelect4',function(){
            // get the current row
            var currentRow=$(this).closest("tr");
    
            var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
            $('.funCode').val(col1);
            $('.funName').val(col2);
            funModal.style.display = "none";
       });
       var hallBtn = document.getElementById("hallBtn");
    var hall_modal_close = document.getElementsByClassName("company_modal_close")[0];
    var hallModal = document.getElementById("hallModal");

    hallBtn.onclick = function() {
        hallModal.style.display = "block";
    }
    hall_modal_close.onclick = function() {
        hallModal.style.display = "none";
    }
    
    window.onclick = function(event) {
        if (event.target == hallModal) {
            hallModal.style.display = "none";
        }
    }

    var funBtn = document.getElementById("funBtn");
    var fun_modal_close = document.getElementsByClassName("category_modal_close")[0];
    var funModal = document.getElementById("functionModal");

    funBtn.onclick = function() {
        funModal.style.display = "block";
    }
    fun_modal_close.onclick = function() {
        funModal.style.display = "none";
    }
    
    window.onclick = function(event) {
        if (event.target == funModal) {
            funModal.style.display = "none";
        }
    }


       var itemSale_cust_modal_close = document.getElementsByClassName("itemSale_cust_modal_close")[0];
       var cusBtn = document.getElementById("cusBtn");
        var customerModal = document.getElementById("customerModal");
    
        cusBtn.onclick = function() {
            customerModal.style.display = "block";
    }
    
    itemSale_cust_modal_close.onclick = function() {
        customerModal.style.display = "none";
    }
    
    window.onclick = function(event) {
        if (event.target == customerModal) {
            customerModal.style.display = "none";
        }
    }
    
    
    var itemSale_emp_modal_close = document.getElementsByClassName("itemSale_emp_modal_close")[0];
       var empBtn = document.getElementById("empBtn");
        var employeeModal = document.getElementById("employeeModal");
    
        empBtn.onclick = function() {
            employeeModal.style.display = "block";
    }
    
    itemSale_emp_modal_close.onclick = function() {
        employeeModal.style.display = "none";
    }
    
    window.onclick = function(event) {
        if (event.target == employeeModal) {
            employeeModal.style.display = "none";
        }
    }


    
       </script>
  @endsection