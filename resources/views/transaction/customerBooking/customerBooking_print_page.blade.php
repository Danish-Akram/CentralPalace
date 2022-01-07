<!DOCTYPE html>
<html>
 <head>
<style>
   label{
      display: inline-block;
  text-align:right;
font-size:16px !important;
   }
</style>
</head>
<body>
   <div>
      <span style="width:270px">
         <img src="img/centralPalace.jpeg" height="150px" width="270px" >
         </span>
      <span style="float:right;  width:400px">
         <h2 style="margin-left:150px;width:50% !important">Central Palace</h2>
                  <label for="" style="margin-top:5px;width: 20.4%!important">Address :</label>
                  <input type="text" style="margin-top:5px;  border-bottom:2 px dotted black;
               border-right: 0px; border-left: 0px; border-top: 0px" size="25" id="others" name="others" value="">
                  <label for="" style="margin-top:10px;">Contact No :</label>
                  <input type="text" style="margin-top:10px;  border-bottom:2 px dotted black;
               border-right: 0px; border-left: 0px; border-top: 0px" size="25" id="others" name="others" value="">
      </span>
   </div>
   <div>
      <fieldset style="width:80%">
         <legend>Customer Info:</legend>
         <label for="fname"  style="width: 16%!important;">Name :</label>
         <input type="text" style="border-bottom:2 px dotted black;border-right: 0px;
         border-left: 0px; border-top: 0px" size="40" id="others" name="others" value="{{$customer->tcstnam}}"><br>
         <label for="fname" style="width: 16%!important;">Address :</label>
         <input type="text" style="border-bottom:2 px dotted black;
         border-right: 0px; border-left: 0px; border-top: 0px" size="40" id="others" name="others" value="{{$customer->tcstadd1}}"><br>
         <label for="fname" style="width: 16%!important;">Mobile :</label>
         <input type="text" style="border-bottom:2 px dotted black;
         border-right: 0px; border-left: 0px; border-top: 0px" size="20" id="others" name="others" value="{{$customer->tphnnum}}"><br>
         <label for="fname" style="width: 16%!important;">Email :</label>
         <input type="text" style="border-bottom:2 px dotted black;
         border-right: 0px; border-left: 0px; border-top: 0px" size="20" id="others" name="others" value="{{$customer->tcstema}}"><br>
      </fieldset>
   </div>
   <div>
   <fieldset style="width:80%">
   <legend>Venue :</legend>

   <label for="others" style="width: 17%!important;">Hall :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;" id="others" name="others" value="{{$hallDes->description}}" size="40">
<br>

<label for="others" style="width: 17%!important;">Event :</label>
<input type="text" style="  border-bottom:2 px dotted black;
 border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tevt}}" size="20">
<br>

 <label for="others" style="width: 17%!important;">Function :</label>
 <input type="text" style="  border-bottom:2 px dotted black;
  border-right: 0px; border-left: 0px; border-top: 0px;" id="others" name="others" value="{{$funDes->description}}" size="20">
<br>
  
  <label for="others" style="width: 17%!important;"> Employee :</label>
  <input type="text" style="  border-bottom:2 px dotted black;
   border-right: 0px; border-left: 0px; border-top: 0px; " id="others" name="others" value="{{$customer->tcstnam}}" size="40">
<br>
   
   <label for="others" style="width: 17%!important;"> Event Date :</label>
   <input type="text" style="  border-bottom:2 px dotted black;
    border-right: 0px; border-left: 0px; border-top: 0px; " id="others" name="others" value="{{$customer->tevtdat}}" size="20">
<br>
    
    
    <label for="others" style="width: 17%!important;"> No Of Guest :</label>
<input type="text" style="  border-bottom:2 px dotted black;
 border-right: 0px; border-left: 0px; border-top: 0px; " id="others" name="others" value="{{$customer->tgstnum}}" size="20">
</fieldset>
</div>
<div class="row">
   <span style="width:280px; display:inline;">

<fieldset style="width:280px; float:left;">

<label for="others" style="width: 45%!important;">Per Head :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tperhed}}" size="8">
<label for="others" style="">Rs</label>
<br>

<label for="others" style="width: 45%!important;">Hall Charges :</label>
<input type="text" style="  border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->thalchg}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;">AC Charges :</label>
<input type="text" style="  border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tacchg}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;"> Decore Charges :</label>
<input type="text" style="  border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tdecchg}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;"> DJ Charges :</label>
<input type="text" style="  border-bottom:2 px dotted black;
 border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tdjchg}}" size="8">
    <label for="others" >Rs</label>
<br>
 
 
 <label for="others" style="width: 45%!important;"> Heating Charges :</label>
<input type="text" style="  border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->thetchg}}" size="8">
<label for="others" >Rs</label>
<br>
<hr>
<label for="others" style="width: 45%!important;"> Total Amount :</label>
<input type="text" style="  border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->ttrntot}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;"> Advance Amount :</label>
<input type="text" style="  border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tadvamt}}" size="8">
<label for="others" >Rs</label>
<br>

<label for="others" style="width: 45%!important;"> Balance :</label>
<input type="text" style="  border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px; text-align:right;" id="others" name="others" value="{{$customer->tbalamt}}" size="8">
<label for="others" >Rs</label>
<br>
      </fieldset>
      </span>
<span >

<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">01 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">02 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">03 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>

<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">04 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">05 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">06 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">07 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">08 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">09 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
<div style=" margin-left :330px;">
<label for="others" style="margin-top:12px ">10 :</label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px;margin-top:10px;" id="others" name="others" value="" size="8">
</div>
</span>
      </div>
</body>
</html>