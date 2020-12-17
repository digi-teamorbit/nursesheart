<title>Home</title>

@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

   
<!-- Main Slider -->
<section class="sliderSec">
  <div class="carousel slide" data-ride="carousel" id="carousel-example-generic"> 
    <!-- Wrapper for slides --> 
    <!-- <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    </ol> -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <div class="sliderOverly"><img alt="slider" src="{{asset($banner->image)}}"></div>
        <div class="carousel-caption">
          <div class="container">
            <div class="row">
              <div class="col-md-7 col-sm-12 col-xs-12">
                <?= html_entity_decode($banner->description) ?>
                <a class="btn " href="{{route('covid_test')}}"> NEED A COVID TEST NOW </a> 
                  <a class="btn btn1 border_bt" target="_blank" href="{{App\Http\Traits\HelperTrait::returnFlag(1964) }}"> ACCU Medical Lab  </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Left and right controls --> 
    <!-- <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <i class="fa fa-angle-right" aria-hidden="true"></i> <span class="sr-only">Next</span> </a> --> 
  </div>
</section>
<!-- Main Slider Ends --> 




<!-- Services Start -->
<section class="organic-orange-sec">
  <div class="container">
    <div class="row">      
      <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 col-xs-12">
        <div class="oraganic-text">
          <h3>{{$cms1->name}}</h3>
          <?= html_entity_decode($cms1->content) ?>
        </div>
      </div>
    </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="oraganic-img text-center">
              <div class="organic-1-img text-center">
              <!-- <img src="images/organic-1.png" class="img-responsive" alt="img"> -->
              <i class="fa fa-ambulance" aria-hidden="true"></i>
            </div>
              <h3> {{$cms2->name}} </h3>
              <?= html_entity_decode($cms2->content) ?>
               <!-- <div class="under-info">
                 <ul>
                   <li><i class="fa fa-clock-o" aria-hidden="true"></i><a href="#">6am to 11pm</a></li>
                   <li><i class="fa fa-phone" aria-hidden="true"></i><a href="#">To book runs call Dispatch at 614-648-5111.</a></li>
                 </ul>
                 <p><b>NOTE:</b>  We are BLS and ALS company, meaning basic life support and Advance paramedic life support.</p>
                 <p><b>NOTE: </b> We take and transport Emergency runs</p>
                 <p></p>
               </div> -->
               <a href="{{route('book_ambulance')}}"> Book An Ambulance </a>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="oraganic-img text-center">
                <div class="organic-1-img text-center">
              <!-- <img src="images/organic-2.png" class="img-responsive" alt="img"> -->
              <i class="fa fa-user-md" aria-hidden="true"></i>
            </div>
              <h3>{{$cms3->name}}</h3>
              <?= html_entity_decode($cms3->content) ?>
              
              <a href="{{route('covid_test')}}">NEED A COVID TEST NOW</a>
            </div>
          </div>
        </div>
  </div>
</section>
<!-- Services End -->



<!-- about-sec start -->
<section class="about-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="about-text">
          <img src="{{asset($cms4->image)}}" class="img-responsive" alt="">
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="about-text-1">
          <h3>{{$cms4->name}}</h3>
          <?= html_entity_decode($cms4->content) ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- about-sec end -->


<section class="quotes">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-xs-12">
        <div class="quotes-left-content wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.5s; animation-name: fadeInLeft;">
          <h3>{{$cms5->name}}</h3>
          <?= html_entity_decode($cms5->content) ?>
          <div class="quotes-call-icon">
           <a href="tel:{{App\Http\Traits\HelperTrait::returnFlag(59) }}"> <i class="fa fa-phone" aria-hidden="true"></i> </a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-xs-12">
        <div class="quotes-right-content wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="0.5s" style="visibility: visible; animation-duration: 1.5s; animation-delay: 0.5s; animation-name: fadeInRight;">
          <h2>please call: <a href="tel:{{App\Http\Traits\HelperTrait::returnFlag(59) }}" style="color: #fff;">{{App\Http\Traits\HelperTrait::returnFlag(59) }}</a> for payment.</h2>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">COVID 19 TEST No:</h4>
        </div>
        <div class="modal-body">
          <p>TEXT:  24589</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<!-- ============================================================== -->
<!-- BODY END HERE -->
<!-- ============================================================== -->

@endsection
@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection