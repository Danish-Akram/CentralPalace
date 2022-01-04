@extends('layouts.dashboard')
@section('menu')
  <section class="home-section">
    <div class="home-content">
      @include('navbar')
<div  style="width:860px; margin-top:30px" class="center">
  <header><i class="fa fa-home" aria-hidden="true"></i> / Customer Maintenance</header>

<div>
<a href="{{route('home')}}" class="button">home</a>
<a href="{{route('customer_insert_btn')}}" class="button">add new</a>
{{-- <button class="button" onclick="window.location='{{route('account-excel')}}'" >excel</button>
<button class="button" onclick="window.location='{{route('account-pdf')}}'" >pdf</button>
<button class="button" onclick="window.location='{{route('account-email')}}'" >email</button>
<button class="button" onclick="window.location='{{route('account-sms')}}'" >sms</button> --}}

<input type="text" placeholder="Search..." id="myInput" onkeyup="myFunction()" class="searchbox form-control">
</div>
<div style="height: 400px; overflow-y: auto">
<table class="table" id= "myTable">
  <thead class="">
    <tr>
      <th scope="col" width="100px">Code</th>
      <th scope="col" width="370px">Description</th>
      {{-- <th scope="col" width="370px">Urdu Description</th> --}}
      <th scope="col" width="120px">Status</th>
      <th scope="col" width="100px">User</th>
      <th scope="" width="110px">Last Date</th>
      <th scope="col" width="70px">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($customer as $_data)
    @if ($_data->tcststs == "N")
   
    <tr class="tr">
    @endif  
        <td>{{$_data->tcstcod}}</td>
        <td>{{$_data->tcstnam}}</td>
        @if ($_data->tcststs == "A")
        <td>Active</td>
        @else
        <td> Not Active</td>
        @endif
        @if($_data->tupdated_by == "")
          <td>{{ $_data->tcreated_by }}</td>
        @else
          <td>{{ $_data->tupdated_by }}</td>
        @endif 
        @if($_data->tupdated_at == "")
        <td>{{date('d-m-Y', strtotime($_data->created_at))}}</td>
      @else
      <td>{{date('d-m-Y', strtotime($_data->updated_at))}}</td>
      @endif      
      
        <td><a href="{{route('customer_update_page', $_data->id)}}"><i class="far fa-edit"></i></a>
        <a href="{{route('customer_view_page', $_data->id)}}"><i class="fas fa-eye"></i></a></td>
      </tr>
      @endforeach
  </tbody>
</table>
</div>
</div>
    </div>
  </section>
@endsection
