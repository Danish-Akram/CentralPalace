<!DOCTYPE html>
<html>
 <head>
<style>
   label{
      display: inline-block;
  text-align:right;
font-size:16px ;
   }
   input{
      font-size:14px;
   }


</style>
</head>
<body>
   <div>
      <span style="width:270px">
         <img src="img/centralPalace.jpeg" height="150px" width="270px" >
         </span>
      <span style="float:right;  width:400px">
         <h2 style="margin-left:150px;width:50% !important;margin-bottom:0px !important; ;margin-top:0px !important;">Central Palace</h2>
         <label for="" style="margin-left:105px;">Firdous Market, Gulberg III, Lahore.</label>
         <label for="" style="margin-left:120px;">0300-4869499, 0322-4011119</label>
        

                  <!-- <label for="" style="margin-top:5px;width: 20.4%!important">Address :</label>
                  <input type="text" style="margin-top:5px;  border-bottom:2 px solid black;
               border-right: 0px; border-left: 0px; border-top: 0px" size="25" id="others" name="others" value="">
                  <label for="" style="margin-top:10px;">Contact No :</label>
                  <input type="text" style="margin-top:10px;  border-bottom:2 px solid black;
               border-right: 0px; border-left: 0px; border-top: 0px" size="25" id="others" name="others" value=""> -->
      </span>
   </div>
   <div>
   <span style="float:right;margin-top:10px;margin-right:90px">
   <label for="" ><strong>Booking :</strong></label>
         <label type="text" value=""><i><u>{{$customer->ttrnnum}}</u></i></label><br>
         <label for="" style="margin-left:px;"><strong>Date :</strong></label>
         <label type="text" value=""><i><u>{{date('d-m-Y', strtotime($customer->ttrndat))}}</u></i></label><br>
         <label for="" style="margin-left:0px;"><strong>Time :</strong></label>
         <label type="text" value=""><i><u>{{$customer->ttrntim}}</u></i></label>
      </span>
      <span>
      <fieldset style="width:61%;">
         <legend>Customer Info:</legend>
         <label for="fname"  style="width: 16%!important;">Name :</label>
         <input type="text" style="border-bottom:2 px solid black;border-right: 0px;
         border-left: 0px; border-top: 0px" size="35" id="others" name="others" value="{{$customer->tcstnam}}"><br>
         <label for="fname" style="width: 16%!important;">Address :</label>
         <input type="text" style="border-bottom:2 px solid black;
         border-right: 0px; border-left: 0px; border-top: 0px" size="35" id="others" name="others" value="{{$customer->tcstadd1}}"><br>
         <label for="fname" style="width: 16%!important;">Mobile :</label>
         <input type="text" style="border-bottom:2 px solid black;
         border-right: 0px; border-left: 0px; border-top: 0px" size="20" id="others" name="others" value="{{$customer->tphnnum}}"><br>
         <label for="fname" style="width: 16%!important;">Email :</label>
         <input type="text" style="border-bottom:2 px solid black;
         border-right: 0px; border-left: 0px; border-top: 0px" size="20" id="others" name="others" value="{{$customer->tcstema}}"><br>
      </fieldset>
      </span>
   
      
   </div>
   <div>
   <fieldset style="width:76%">
   <legend>Venue :</legend>

   <label for="others" style="width: 17%!important;">Hall :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;" id="others" name="others" value="{{$hallDes->description}}" size="40">
<br>

<label for="others" style="width: 17%!important;">Event :</label>
<input type="text" style="  border-bottom:2 px solid black;
 border-right: 0px; border-left: 0px; border-top: 0px;" id="others" name="others" value="{{$funDes->description}}" size="20">
    <label for="others" style="width: 17%!important;"> Event Date :</label>
   <input type="text" style="  border-bottom:2 px solid black;
    border-right: 0px; border-left: 0px; border-top: 0px; " id="others" name="others" value="{{date('d-m-Y', strtotime($customer->tevtdat))}}" size="5">

<br>
<label for="others" style="width: 17%!important;"> No Of Guest :</label>
<input type="text" style="  border-bottom:2 px solid black;
 border-right: 0px; border-left: 0px; border-top: 0px; " id="others" name="others" value="{{$customer->tgstnum}}" size="20">
 <br>
 <label for="others" style="width: 17%!important;"> Employee :</label>
  <input type="text" style="  border-bottom:2 px solid black;
   border-right: 0px; border-left: 0px; border-top: 0px; " id="others" name="others" value="{{$customer->tcstnam}}" size="40">

</fieldset>
</div>
<div class="row">
   <span style="width:280px; display:inline;">

<fieldset style="width:280px; float:left;">

<label for="others" style="width: 45%!important;">Per Head :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tperhed}}" size="8">
<label for="others" style="">Rs</label>
<br>

<label for="others" style="width: 45%!important;">Hall Charges :</label>
<input type="text" style="  border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->thalchg}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;">AC Charges :</label>
<input type="text" style="  border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tacchg}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;"> Decore Charges :</label>
<input type="text" style="  border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tdecchg}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;"> DJ Charges :</label>
<input type="text" style="  border-bottom:2 px solid black;
 border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tdjchg}}" size="8">
    <label for="others" >Rs</label>
<br>
 
 
 <label for="others" style="width: 45%!important;"> Heating Charges :</label>
<input type="text" style="  border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->thetchg}}" size="8">
<label for="others" >Rs</label>
<br>
<hr>
<label for="others" style="width: 45%!important;"> Total Amount :</label>
<input type="text" style="  border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->ttrntot}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;"> Advance Amount :</label>
<input type="text" style="  border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tadvamt}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;"> Balance :</label>
<input type="text" style="  border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tbalamt}}" size="8">
<label for="others" >Rs</label>
<br>
      </fieldset>
</span>
<span >
<div style=" margin-left :330px;margin-top:12px;">




<!-- <table style="width:89%; text-align:center">
      <thead class="">
                </thead>
                <tbody>
                    @foreach ($bookitm as $table)
                        <tr>
                           <td>{{$loop->index+1}}</td>
                           <td>{{ $table->tctgdsc }}</td>
                           if($table->tctgdsc == $table->titmcod){
                              <td>{{ $table->titmdsc }}</td>
                           }
                            
                        </tr>
                    @endforeach
                </tbody>
            </table> -->
<!-- <label for="others" style="margin-top:12px ">01 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">02 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">03 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>

<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">04 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">05 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">06 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">07 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">08 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">09 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">10 :</label>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>-->
</span>
</div>
<div style="margin-top:160px; width:311px;">
<textarea value=""><strong> Remarks: </strong> <i>{{$customer->ttrnrem}}</i></textarea>
</div>
<div>
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:30px;" id="others" name="others" value="" size="8">
<input type="text" style=" border-bottom:2 px solid black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:30px;margin-left:60px;" id="others" name="others" value="" size="8">
</div>
<div>
   <label for="" style="margin-top:20px;margin-left:40px"> Guest</label>
   <label for="" style="margin-top:20px; margin-left:125px"> Employee</label>

</div>
</body>
</html>