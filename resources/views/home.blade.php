@extends('layouts.dashboard')
@section('menu')
<section class="home-section">
  <div class="home-content">
    @include('navbar')
      <img src="{{ asset('img/logo1.jpeg') }}" alt="" class="responsive" height="800">
  </div>
</section>
@endsection