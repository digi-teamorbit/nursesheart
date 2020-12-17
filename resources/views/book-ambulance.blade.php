<title>Book an Ambulance</title>

@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

<!-- Inner Banner Section Start -->


<div class="banner"> <img src="{{asset($inner_banner->image)}}" alt="Avatar" class="image">
  <div class="overlay">
    <div class="container">
      <div class="text">
        <h1 class="playf"> {{$inner_banner->title}} </h1>
      </div>
    </div>
  </div>
</div>


<!-- Inner Banner Section End -->


<!-- Book a ambulance form Start -->
<section class="contact-us-page">
  <div class="container">
    <div class="row">
      <div class="col-sm-2 col-md-2 col-xs-12"></div>
      <div class="col-sm-8 col-md-8 col-xs-12">
        <div class="contact-us-main-content">
          <form action="{{route('book_ambulance_submit')}}" method="post">
            @csrf
          <h1> Book an Ambulance </h1>
          <div class="row">
            <div class="col-sm-6 col-md-6 col-xs-6">
              <div class="form-group-1">
                <label for="usr">Facility Name: </label>
                <input name="facility_name" type="text" class="form-control-1" id="usr">
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6">
              <div class="form-group-1">
                <label for="usr">Patient Name:</label>
                <input name="patient_name" type="text" class="form-control-1" id="usr1">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-6">
              <div class="form-group-1">
                <label for="usr">Address</label>
                <input name="address" type="text" class="form-control-1" id="usr2">
              </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
              <div class="form-group-1">
                <label for="usr">City</label>
                <input name="city" type="text" class="form-control-1" id="usr3">
              </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
              <div class="form-group-1">
                <label for="usr">State</label>
                <input name="state" type="text" class="form-control-1" id="usr4">
              </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
              <div class="form-group-1">
                <label for="usr">Zip</label>
                <input name="zip" type="text" class="form-control-1" id="usr5">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-6">
              <div class="form-group-1">
                <label for="usr">Phone number</label>
                <input name="phone" type="number" class="form-control-1" id="usr6">
              </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
              <div class="form-group-1">
                <label for="usr">Email</label>
                <input name="email" type="email" class="form-control-1" id="usr7">
              </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
              <div class="form-group-1">
                <label for="usr"> Date of Transport </label>
                <input name="date_of_transport" type="date" class="form-control" id="usr7">
              </div>
            </div>
            <div class="col-sm-3 col-md-3 col-xs-6">
              <div class="form-group-1">
                <label for="usr"> Time of Transport </label>
                <input name="time_of_transport" type="time" class="form-control" id="usr7">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
              <div class="contact-us-btn text-center">
                <!--<a href="#"> Submit Request </a>-->
                <button>Submit Request</button>
              </div>
            </div>
          </div>
          </form>
          <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">
              <div class="under-info">
                 <ul>
                   <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{App\Http\Traits\HelperTrait::returnFlag(218) }} </li>
                   <li><i class="fa fa-phone" aria-hidden="true"></i> To book an immediate runs, call Dispatch at <a href="tel:{{App\Http\Traits\HelperTrait::returnFlag(59) }}"> {{App\Http\Traits\HelperTrait::returnFlag(59) }} </a> </li>
                 </ul>
                 <?= html_entity_decode($cms1->content) ?>
                 <p></p>
               </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-2 col-md-2 col-xs-12"></div>
    </div>
  </div>
</section>
<!-- Book a ambulance form End -->


<!-- ============================================================== -->
<!-- BODY END HERE -->
<!-- ============================================================== -->

@endsection
@section('css')
<style>
section.contact-us-page .contact-us-btn button {
    padding: 13px 50px;
    background-color: #0057ae;
    color: #fff;
    font-size: 15px;
    font-family: 'Poppins';
    font-weight: 600;
    text-shadow: none;
    border-radius: 17px;
    border: 1px solid #0057ae;
}

section.contact-us-page .contact-us-btn button:hover {
    background-color: #ad0401;
    color: #fff;
    border: 1px solid #ad0401;
}

button {
  transition: all 0.3s ease-in-out;
  }

/* type="number" arrows */
  /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">  
@endsection

@section('js')
<script type="text/javascript"></script>

<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>
@endsection