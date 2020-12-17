<title>Covid 19</title>

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



<!-- Covid test Section Start -->
<section class="covid-form">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="select-state-usa">
          <h1>  Schedule COVID Testing for Clinic </h1>
        </div>
      
  <div class="custom-state-field text-center">
    <form>
      <select name="state" id="list" accesskey="target">
        <option value='none' selected disabled="">Select State/City</option>
        @foreach($states as $state)
        <option value="{{route('patient_signup', ['id' => $state->id])}}"> {{$state->state_name}}</option>
        @endforeach
        <!--<option value="{{route('patient_signup')}}"> Marion, OH </option>
        <option value="{{route('patient_signup')}}"> Dayton, OH </option>
        <option value="{{route('patient_signup')}}"> Springfield, OH </option> -->       
      </select>
      <input type=button value="Go" onclick="goToNewPage()" />
    </form>
  </div>
  
      </div>
    </div>
  </div>
</section>
<!-- Covid test form Section End -->


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

<script type="text/javascript">
    function goToNewPage()
    {
        var url = document.getElementById('list').value;
        if(url != 'none') {
            window.location = url;
        }
    }
</script>  

@endsection