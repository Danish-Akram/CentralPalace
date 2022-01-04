<!DOCTYPE html>
<html>
 <head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse:collapse;
}
tr{
    border-bottom: 1px solid black;
}
</style>
</head>
<body>
<div>
<span  style="height:150px; width: 50px; background-color:#B78628;border-right:5px solid black;margin-bottom:10px;">
<label style="height:70px; width: 150px;padding:50px; font-size:26px">Booking Form</label></span>
<img src="img/centralPalace.jpeg" height="150px" width="270px" style="margin-left:422px;margin-bottom:20px;">
</div>
<h4 style="margin-left:522px;margin-top:10px;display:inline;">Date:</h4>
<input type="text" size="5" style="margin-left:5px;display:inline-block;border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->ttrndat}}">
<h4 style="margin-left:10px;display:inline;">Customer Name:</h4>
<input type="text" size="30" style="margin-left:10px;display:inline-block;border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->tcstnam}}">
<h4 style="margin-left:40px;display:inline;">Ph:</h4>
<input type="text" size="5" style="margin-left:5px;display:inline-block;border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->tphnnum}}"><br>

</div>
   
    <table style="width:100%;margin-top:5px">
    <tr>
       <th style="   padding:10px;       width:20%">Address</th>
       <td style="  padding:10px;       width:80%">{{$customer->tcstadd1}}</td>
     </tr>
     <tr>
       <th style="  padding:10px;       width:20%">No of Guest</th>
       <td style="  padding:10px;       width:40%">{{$customer->tgstnum}}</td>
     </tr>
     <tr>
        <th style="  padding:10px;        width:20%"  >Event Date</th>
        <td style="  padding:10px;        width:40%"  >{{$customer->tevtdat}}</td>
     </tr>
     <tr >
        <th style="  padding:10px;        width:20%; height:100px" >Type</th>
        <td style="  padding:10px;        width:80%">
        <input type="checkbox" style="margin-left:50px; margin-top:5px;" id="mehandi" name="mehandi" value=""
        @if($customer->tfuncod == "001") ? checked : unchecked @endif>

        <label for="mehandi"> Mehandi </label>
        <input type="checkbox" style="margin-left:80px;  margin-top:5px;" id="barat" name="barat" value="barat"
        @if($customer->tfuncod == "001") ? checked : unchecked @endif>

        <label for="barat"> Barat</label>
        <input type="checkbox" style="margin-left:80px;  margin-top:5px;" id="valima" name="valima" value="valima"
        @if($customer->tfuncod == "001") ? checked : unchecked @endif>

        <label for="valima"> Valima</label><br>
        <input type="checkbox" style="margin-left:50px; margin-top:5px;" id="others" name="others" value="others"
        @if($customer->tfuncod == "001") ? checked : unchecked @endif>

        <label for="others"> Others</label>
        <input type="text" style="margin-left:30px; margin-top:5px;  border-bottom:2 px dotted black;
         border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value=""
              @if($customer->tfuncod == "001") ? checked : unchecked @endif>

        </td>
     </tr>
     <tr >
     <th style="width:20%;padding:10px; height:100px" >Venue</th>
     <td style="width:80%;padding:10px;">
     <input type="checkbox" style="margin-left:50px; margin-top:5px;" id="mehandi" name="mehandi" value="mehandi"
     @if($customer->tfuncod == "001") ? checked : unchecked @endif>
     <label for="mehandi"> Crystal Hall </label>
     <input type="checkbox" style="margin-left:80px;  margin-top:5px;" id="barat" name="barat" value="barat"
     @if($customer->tfuncod == "002") ? checked : unchecked @endif>
     <label for="barat"> Diamond Hall</label>
     <input type="checkbox" style="margin-left:80px;  margin-top:5px;" id="valima" name="valima" value="valima"
     @if($customer->tfuncod == "001") ? checked : unchecked @endif>

     <label for="valima"> Party Hall</label><br>
     <input type="checkbox" style="margin-left:50px; margin-top:5px;" id="others" name="others" value="others"
     @if($customer->tfuncod == "001") ? checked : unchecked @endif>

     <label for="others"> Farm House</label>
     <input type="checkbox" style="margin-left:83px;  margin-top:5px;" id="barat" name="barat" value="barat"
     @if($customer->tfuncod == "001") ? checked : unchecked @endif>

     <label for="barat"> Other Event</label>
     </td>
  </tr>
</table>
<table style="width:100%">
<tr>
<td style="height:300px;width:52%">
<label for="others"> Others</label>
<input type="text" style="margin-left:30px;  border-bottom:2 px dotted black;
 border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value=""><br>
 <label for="others" style="margin:100px;" > Main Course</label><br>

 <label for="others" style="margin-left:20px; margin-top:30px;"> 1</label>
 <input type="text" style="margin-top:5px;  border-bottom:2 px dotted black;
  border-right: 0px; border-left: 0px; border-top: 0px" size="10" id="others" name="others" value="">

  <label for="others"style="margin-left:10px; margin-top:100px;"> 2</label>
  <input type="text" size="10" style="margin-top:5px;  border-bottom:2 px dotted black;
   border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value=""><br>

   <label for="others" style="margin-left:20px; margin-top:30px;"> 3</label>
   <input type="text" style="margin-top:5px;  border-bottom:2 px dotted black;
    border-right: 0px; border-left: 0px; border-top: 0px" size="10" id="others" name="others" value="">
  
    <label for="others"style="margin-left:10px; margin-top:100px;"> 4</label>
    <input type="text" size="10" style="margin-top:5px;  border-bottom:2 px dotted black;
     border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value=""><br>

     <label for="others" style="margin-left:20px; margin-top:30px;"> 5</label>
     <input type="text" style="margin-top:5px;  border-bottom:2 px dotted black;
      border-right: 0px; border-left: 0px; border-top: 0px" size="10" id="others" name="others" value="">
    
      <label for="others"style="margin-left:10px; margin-top:100px;"> 6</label>
      <input type="text" size="10" style="margin-top:5px;  border-bottom:2 px dotted black;
       border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value=""><br>

       <label for="others" style="margin-left:20px; margin-top:30px;"> 7</label>
       <input type="text" style="margin-top:5px;  border-bottom:2 px dotted black;
        border-right: 0px; border-left: 0px; border-top: 0px" size="10" id="others" name="others" value="">
      
        <label for="others"style="margin-left:10px; margin-top:100px;"> 8</label>
        <input type="text" size="10" style="margin-top:5px;  border-bottom:2 px dotted black;
         border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value=""><br>

         <label for="others" style="margin-left:20px; margin-top:30px;"> 9</label>
         <input type="text" style="margin-top:5px;  border-bottom:2 px dotted black;
          border-right: 0px; border-left: 0px; border-top: 0px" size="10" id="others" name="others" value="">
        
          <label for="others"style="margin-left:2px; margin-top:100px;"> 10</label>
          <input type="text" size="10" style="margin-top:5px;  border-bottom:2 px dotted black;
           border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value=""><br>
</td>
<td style="height:300px;width:48%">
<label for="others" style="margin-left:20px; margin-top:30px;"> Per Head </label>
<label for="others" style="margin-left:60px; margin-top:30px;"> Rs: </label>
<input type="text" style=" border-bottom:2 px dotted black;
border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->tperhed}}" size="10"><br>

<label for="others" style="margin-left:20px;margin-top:30px;"> Hall Charges </label>
<label for="others" style="margin-left:35px;margin-top:30px;"> Rs: </label>
<input type="text" style="  border-bottom:2 px dotted black;
 border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->thalchg}}" size="10"><br>

 <label for="others" style="margin-left:20px;margin-top:30px;"> AC Charges </label>
 <label for="others" style="margin-left:40px;margin-top:30px;"> Rs: </label>
 <input type="text" style="  border-bottom:2 px dotted black;
  border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->tacchg}}" size="10"><br>
  
  <label for="others" style="margin-left:20px;margin-top:30px;"> Decore Charges </label>
  <label for="others" style="margin-left:16px;margin-top:30px;"> Rs: </label>
  <input type="text" style="  border-bottom:2 px dotted black;
   border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->tdecchg}}" size="10"><br>
   
   <label for="others" style="margin-left:20px;"> DJ Charges </label>
   <label for="others" style="margin-left:44px;"> Rs: </label>
   <input type="text" style="  border-bottom:2 px dotted black;
    border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->tdjchg}}" size="10"><br>
    
    
    <label for="others" style="margin-left:20px;"> Heating Charges </label>
<label for="others" style="margin-left:11px;"> Rs: </label>
<input type="text" style="  border-bottom:2 px dotted black;
 border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->thetchg}}" size="10"><br>
<hr>
<label for="others" style="margin-left:20px;margin-top:30px;"> Total Amount </label>
<label for="others" style="margin-left:28px;margin-top:30px;"> Rs: </label>
<input type="text" style="  border-bottom:2 px dotted black;
 border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->ttrntot}}" size="10"><br>

 <label for="others" style="margin-left:20px;margin-top:30px;"> Advance Amount </label>
 <label for="others" style="margin-left:5px;margin-top:30px;"> Rs: </label>
 <input type="text" style="  border-bottom:2 px dotted black;
  border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->tadvamt}}" size="10"><br>

  <label for="others" style="margin-left:20px;margin-top:30px;"> Balance </label>
  <label for="others" style="margin-left:67px;margin-top:30px;"> Rs: </label>
  <input type="text" style="  border-bottom:2 px dotted black;
   border-right: 0px; border-left: 0px; border-top: 0px" id="others" name="others" value="{{$customer->tbalamt}}" size="10"><br>
   </td>
</tr>
</table>
</body>
</table>