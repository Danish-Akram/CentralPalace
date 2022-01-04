@extends('layouts.dashboard')
@section('menu')
  <section class="home-section">
    <div class="home-content">
      @include('navbar')
<div  style=" width:900px; margin-top:30px" class="center">
  <header><i class="fa fa-home" aria-hidden="true"></i> / Item Maintenance</header>
<div>
<a href="{{route('home')}}" class="button" >home</a>
  <a href="{{route('item_insert_btn')}}" class="button">add new</a>
  <input type="text" placeholder="Search..." id="myInput" onkeyup="myFunction()" class="searchbox2 form-control">
</div>
<div style="height: 500px; overflow-y:auto">
<table class="table" id="myTable">
  <thead class="thead-light">
    <tr>
      <th scope="col" width="145px">Model</th>
      <th scope="col" width="445px">Description</th>
      <th scope="col" width="90px">Status</th>
      <th scope="col" width="90px">User</th>
      <th scope="col" width="100px">Last Date</th>
      <th scope="col" width="60px">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($item as $_data)
    @if ($_data->titmsts == "N")
 
    <tr class="tr">
    @endif  
      <td>{{$_data->titmcod}}</td>
      <td>{{$_data->titmdsc}}</td>
      @if ($_data->titmsts == "A")
      <td>Active</td>
      @else
      <td> Not Active</td>
      @endif
      @if($_data->tupdated_by == "")
      <td>{{ $_data->tcreated_by }}</td>
      @else
      <td>{{ $_data->tupdated_by }}</td>
      @endif 
      @if($_data->updated_at == "")
      <td>{{date('d-m-Y', strtotime($_data->created_at))}}</td>
      @else
      <td>{{date('d-m-Y', strtotime($_data->updated_at))}}</td>
      @endif  
	  <td><a href="{{route('item_update_page', $_data->id)}}">  <i class="far fa-edit"></i></a>
    <a href="{{route('item_view_page', $_data->id)}}"><i class="fas fa-eye"></i></a>
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
