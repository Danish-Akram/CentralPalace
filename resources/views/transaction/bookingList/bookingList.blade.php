@extends('layouts.dashboard')
@section('menu')
      <div  style="margin-top: 30px; width:1125px;" class="center">
      <header><i class="fa fa-home" aria-hidden="true"></i> / Booking List Maintenance</header>
      <div>
      <a href="{{route('home')}}" class="button" >home</a>
      <input type="text" placeholder="Search..." id="myInput" onkeyup="myFunction()" class="searchbox form-control">
      </div>
      <div style="height: 400px; overflow-y: auto">
      <table class="table" id= "myTable">
        <thead class="thead-light">
          <tr>
            <th scope="col" width="80px">Booking No</th>
            <th scope="col" width="160px">Customer</th>
            <th scope="col" width="100px">Mobile</th>
            <th scope="col" width="160px">Employee</th>
            <th scope="col" width="100px">Event</th>
            <th scope="col" width="95px">Event Date</th>
            <th scope="col" width="85px">Hall Charges</th>
            <th scope="col" width="85px">AC Charges</th>
            <th scope="col" width="85px">Decore Charges</th>
            <th scope="col" width="85px">DJ Charges</th>
            <th scope="col" width="90px">Total AMount</th>


          </tr>
        </thead>
        <tbody>
          @foreach($bookitm as $_data)

          <tr >
              <td>{{$_data->ttrnnum}}</td>
              <td>{{$_data->tcstnam}}</td>
              <td>{{$_data->tphnnum}}</td>
              <td>{{$_data->name}}</td>
              <td>{{$_data->description}}</td>
              <td>{{$_data->tevtdat}}</td>
              <td style="text-align:right">{{$_data->thalchg}}</td>
              <td style="text-align:right">{{$_data->tacchg}}</td>
              <td style="text-align:right">{{$_data->tdecchg}}</td>
              <td style="text-align:right">{{$_data->tdecchg}}</td>
              <td style="text-align:right">{{$_data->ttrntot}}</td>

            </tr>
            @endforeach
</tbody>

      </table>
      </div>
      </div>
@endsection
