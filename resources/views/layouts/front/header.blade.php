<?php $segment = Request::segments();?>

<!-- Header Start -->
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="sidenav" id="mySidenav">
            <a class="closebtn" href="javascript:void(0)" onclick="closeNav()">&times;</a>
          </div>
          <div class="mobilecontainer hidden-lg hidden-md">
            <span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer">&#9776;</span>
          </div>
          <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="main-logo">
              <div class="logowow fadeIn" data-wow-delay="1s" data-wow-duration="1s">
                <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" class="img-responsive wow pulse animated animated" data-wow-delay="200ms" data-wow-iteration="infinite" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-delay: 200ms; animation-iteration-count: infinite; animation-name: pulse;" alt=""></a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </header>
  <!-- header ends -->