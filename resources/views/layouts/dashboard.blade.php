<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Central Palace</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/companyForm.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

   <body>
    <aside class="">
        <div class="sidebar close">
            <div class="logo-details">
              <img src="{{ asset('img/logo.png') }}" alt="" height="60px" width="79px">
        
              <span class="logo_name">Crystal Solution</span>
            </div>
            <ul class="nav-links">    
              <li>
                <div class="iocn-link">
                  <a href="">
                  <i class='bx bx-file-blank'></i>
                  <span class="link_name" value=""> File</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu" id="sub-item-1">
        
                        @foreach($data as $row)
                        @if($row->mainmenu == "Files")
                        @if($row->status == "N" ||  is_null($row->status))
                        <li> <a href="{{ url('/' . $row->route) }}"   style="pointer-events: none;"> {{ $row->submenu }} <span data-toggle="collapse" href="#sub-item-11" class="icon pull-right"></span></a></li>
                        @else
                        @if( $row->route == "N" )
                        
                            <li><a data-toggle="collapse" href="{{'#'. $row->sub_id }}"> {{ $row->submenu }} <span data-toggle="collapse" href="{{'#'. $row->sub_id }}" class="icon pull-right"><em class="fa fa-caret-down"></em></span></a>
                            <ul class="children collapse" id="{{ $row->sub_id }}">
                            @foreach($data2 as $sm)
                            @if(  $sm->submenu == $row->submenu &&  $sm->mainmenu == "Files" )
                            @if($sm->status == "N" ||  is_null($sm->status))
                            <li><a href="{{ url('/' . $sm->route) }}"  style="pointer-events: none;"> <span class="fa fa-arrow-right">&nbsp;</span> {{ $sm->submenu2 }}</a></li>
                            @else
                            <li><a href="{{ url('/' . $sm->route) }}" > <span class="fa fa-arrow-right">&nbsp;</span> {{ $sm->submenu2 }}</a></li>
                            @endif
                            @endif
                            @endforeach
                            </ul>
                            </li>
                        
                        @else
                        <li> <a href="{{ url('/' . $row->route) }}"> {{ $row->submenu }} </a></li>
                        @endif
                        @endif
                        @endif
                        @endforeach
                        </ul>
        </li>
          
              <li>
                <div class="iocn-link">
                  <a href="">
                  <i class='bx bx-transfer'></i>
                    <span class="link_name" value="">Transactions</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu" id="sub-item-2">
        
                        @foreach($data as $row)
                        @if($row->mainmenu == "Transactions")
                        @if($row->status == "N" ||  is_null($row->status))
                        <li> <a href="{{ url('/' . $row->route) }}"   style="pointer-events: none;"> {{ $row->submenu }} <span data-toggle="collapse" href="#sub-item-21" class="icon pull-right"></span></a></li>
                        @else
                        @if( $row->route == "N" )
                        
                            <li><a data-toggle="collapse" href="{{'#'. $row->sub_id }}"> {{ $row->submenu }} <span data-toggle="collapse" href="{{'#'. $row->sub_id }}" class="icon pull-right"><em class="fa fa-caret-down"></em></span></a>
                            <ul class="children collapse" id="{{ $row->sub_id }}">
                            @foreach($data2 as $sm)
                            @if(  $sm->submenu == $row->submenu &&  $sm->mainmenu == "Transactions" )
                            @if($sm->status == "N" ||  is_null($sm->status))
                            <li><a href="{{ url('/' . $sm->route) }}"  style="pointer-events: none;"> <span class="fa fa-arrow-right">&nbsp;</span> {{ $sm->submenu2 }}</a></li>
                            @else
                            <li><a href="{{ url('/' . $sm->route) }}" > <span class="fa fa-arrow-right">&nbsp;</span> {{ $sm->submenu2 }}</a></li>
                            @endif
                            @endif
                            @endforeach
                            </ul>
                            </li>
                        
                        @else
                        <li> <a href="{{ url('/' . $row->route) }}"> {{ $row->submenu }} </a></li>
                        @endif
                        @endif
                        @endif
                        @endforeach
                        </ul>
                    
            <li>
                <div class="iocn-link">
                  <a href="">
                  <i class='bx bxs-report' ></i>
                    <span class="link_name">Reports</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu" id="sub-item-3">
        
                        @foreach($data as $row)
                        @if($row->mainmenu == "Reports")
                        @if($row->status == "N" ||  is_null($row->status))
                        <li> <a href="{{ url('/' . $row->route) }}"   style="pointer-events: none;"> {{ $row->submenu }} <span data-toggle="collapse" href="#sub-item-31" class="icon pull-right"></span></a></li>
                        <!-- <li><a href="#"><span class="link_name_2" value=""> ></span></a> <i class='bx bxs-chevron-down arrow' ></i> -->
                        @else
                        @if( $row->route == "N" )
                        
                            <li><a data-toggle="collapse" href="{{'#'. $row->sub_id }}"> {{ $row->submenu }} <span data-toggle="collapse" href="{{'#'. $row->sub_id }}" class="icon pull-right"> <em class="fa fa-caret-right"></em></span></a>
                            <ul class="sub-menu-2" id="{{ $row->sub_id }}">
                            @foreach($data2 as $sm)
                            @if(  $sm->submenu == $row->submenu &&  $sm->mainmenu == "Reports" )
                            @if($sm->status == "N" ||  is_null($sm->status))
                            <li><a href="{{ url('/' . $sm->route) }}"  style="pointer-events: none;"> <span class="fa fa-arrow-right">&nbsp;</span> {{ $sm->submenu2 }}</a></li>
                            @else
                            <li><a href="{{ url('/' . $sm->route) }}" > <span class="fa fa-arrow-right">&nbsp;</span> {{ $sm->submenu2 }}</a></li>
                            @endif
                            @endif
                            @endforeach
                            </ul>
                            </li>
                        
                        @else
                        <li> <a href="{{ url('/' . $row->route) }}"> {{ $row->submenu }} </a></li>
                        @endif
                        @endif
                        @endif
                        @endforeach
                        </ul>
                        </li>
        
        <li>
                <div class="iocn-link">
                  <a href="">
                    <i class='bx bx-book-alt' ></i>
                    <span class="link_name">Utilities</span>
                  </a>
                  <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu" id="sub-item-4">
        
                        @foreach($data as $row)
                        @if($row->mainmenu == "Utilities")
                        @if($row->status == "N" ||  is_null($row->status))
                        <li> <a href="{{ url('/' . $row->route) }}"   style="pointer-events: none;"> {{ $row->submenu }} <span data-toggle="collapse" href="#sub-item-41" class="icon pull-right"></span></a></li>
                        @else
                        @if( $row->route == "N" )
                        
                            <li><a data-toggle="collapse" href="{{'#'. $row->sub_id }}"> {{ $row->submenu }} <span data-toggle="collapse" href="{{'#'. $row->sub_id }}" class="icon pull-right"><em class="fa fa-caret-down"></em></span></a>
                            <ul class="children collapse" id="{{ $row->sub_id }}">
                            @foreach($data2 as $sm)
                            @if(  $sm->submenu == $row->submenu &&  $sm->mainmenu == "Utilities" )
                            @if($sm->status == "N" ||  is_null($sm->status))
                            <li><a href="{{ url('/' . $sm->route) }}"  style="pointer-events: none;"> <span class="fa fa-arrow-right">&nbsp;</span> {{ $sm->submenu2 }}</a></li>
                            @else
                            <li><a href="{{ url('/' . $sm->route) }}" > <span class="fa fa-arrow-right">&nbsp;</span> {{ $sm->submenu2 }}</a></li>
                            @endif
                            @endif
                            @endforeach
                            </ul>
                            </li>
                        
                        @else
                        <li> <a href="{{ url('/' . $row->route) }}"> {{ $row->submenu }} </a></li>
                        @endif
                        @endif
                        @endif
                        @endforeach
                        </ul>
                    
              </li>
            <div class="profile-details">
              <div class="profile-content">
                <!-- <img src="img/emt.jpg" alt=""> -->
              </div>
              <div class="name-job">
                <div class="profile_name"></div>
                <div class="job"></div>
              </div>
              <!-- <i class='bx bx-log-out'></i> -->
            </div> 
          </li>
        </ul>
          </div>
          <section class="home-section">
            <div class="home-content">
                @include('navbar')
              @yield('menu')
</div>
</section>
</aside>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/canvasJS/canvasjs.min.js') }}"></script>
    <script src="{{asset('js/fontawesome.js')}}"></script> 
    <script src="{{asset('js/form_validation.js')}}"></script> 

    </body>       
</html>




	