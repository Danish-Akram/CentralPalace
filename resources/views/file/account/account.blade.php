@extends('layouts.dashboard')
@section('menu')
  <section class="home-section">
    <div class="home-content">
      @include('navbar')
<div  style="width:860px; margin-top:30px" class="center">
  <header><i class="fa fa-home" aria-hidden="true"></i> / Account Maintenance</header>

<div>
<a href="{{route('home')}}" class="button">home</a>
<a href="{{route('account_insert_btn')}}" class="button">add new</a>
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
    @foreach($account as $_data)
    @if ($_data->status == "N")
    <tr class="tr">
    @endif 
      <td scope="row">{{$_data->code}}</td>
      <td>{{$_data->description}}</td>
      {{-- <td class="urdu">{{$_data->urdu_description}}</td> --}}
      <td>{{$_data->status == "A" ? 'Active' : 'Not Active'}}</td>
      <td>{{$_data->created_by}}</td>
      <td>{{date('d-m-Y', strtotime($_data->created_at))}}</td>
      {{-- <td>
          <?php
          $fromDate = $_data->created_at;
          $currentDate = date('d-m-Y');
          $date1 = new DateTime($fromDate);
          $date2 = new DateTime($currentDate);
          $interval = $date1->diff($date2);
          $days = $interval->format('%a');
          echo $days;
          ?>
      </td> --}}
      <td><a href="{{route('account_update_page', $_data->id)}}"><i class="far fa-edit"></i></a>
      <a href="{{route('account_view_page', $_data->id)}}"><i class="fas fa-eye"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
    </div>
  </section>
@endsection
