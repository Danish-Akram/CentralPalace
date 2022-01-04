@extends('layouts.dashboard')
@section('menu')
<section class="home-section">
    <div class="home-content">
        @include('navbar')
<div  style="margin-top:30px; width:900px;" class="center">
<header><i class="fa fa-home" aria-hidden="true"></i> / Function Maintenance</header>
<div>
<a href="{{route('home')}}" class="button">home</a>
<a href="{{route('function_insert_btn')}}" class="button">add new</a>
<input type="text" placeholder="Search..." id="myInput" onkeyup="myFunction()" class="searchbox form-control">
</div>
<div style="height: 400px; overflow-y: auto">
<table class="table" id= "myTable">
  <thead class="thead-light">
    <tr>
      <th scope="col" width="80px">Code</th>
      <th scope="col" width="460px">Description</th>
      <th scope="col" width="90px">Status</th>
      <th scope="col" width="100px">User</th>
      <th scope="" width="100px">Last Date</th>
      <th scope="col" width="70px">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($function as $_data)
  @if ($_data->status == "N")

  <tr class="tr">
  @endif
    
      <td >{{$_data->code}}</td>
      <td class="">{{$_data->description}}</td>
      @if ($_data->status == "A")
      <td>Active</td>

      @else
      
      <td>Not Active</td>

      @endif
      @if($_data->updated_by == "")
        <td>{{ $_data->created_by }}</td>
      @else
        <td>{{ $_data->updated_by }}</td>
      @endif 
      @if($_data->updated_at == "")
      <td>{{date('d-m-Y', strtotime($_data->created_at))}}</td>
    @else
    <td>{{date('d-m-Y', strtotime($_data->updated_at))}}</td>
    @endif      
    
	    <td class=""><a href="{{route('function_update_page',$_data->id)}}">  <i class="far fa-edit"></i></a>
    <a href="{{route('function_view_page',$_data->id)}}"><i class="fas fa-eye"></i></a>
	</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
    </div>
</section>
@endsection
