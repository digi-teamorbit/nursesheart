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
    <div class="patient-form">
      <div class="row">
        <div class="col-sm-2 col-xs-12 col-md-2"></div>
        <div class="col-sm-8 col-xs-12 col-md-8">
          <div class="contact-us-main-content">
            <h1>Patient Signup</h1>
            <div class="row">
              <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="checkbox-custom">
                  <form>
                    <label class="custom_readio"> Insured
                      <input id="insured" value="Insured" type="radio" checked="checked" name="radio">
                      <span class="checkmark"></span>
                    </label>
                    <label class="custom_readio">  Non Insured
                      <input id="non_insured" value="Non Insured" type="radio" name="radio">
                      <span class="checkmark"></span>
                    </label>
                  </form>
                </div>
              </div>
            </div>
            <form method="post" action="{{route('patient_signup_submit')}}" enctype="multipart/form-data">
              @csrf

              <input type="hidden" value="{{$_GET['id']}}" name="state_id">
              <input type="hidden" name="type" id="type">

            <div class="row">
              <div class="col-sm-6 col-md-6 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">Last Name: </label>
                  <input required="" name="last_name" type="text" class="form-control-1" id="usr">
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">First Name:</label>
                  <input required="" name="first_name" type="text" class="form-control-1" id="usr1">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3 col-md-3 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">Address</label>
                  <input required="" name="address" type="text" class="form-control-1" id="usr2">
                </div>
              </div>
              <div class="col-sm-3 col-md-3 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">City</label>
                  <input required="" name="city" type="text" class="form-control-1" id="usr3">
                </div>
              </div>
              <div class="col-sm-3 col-md-3 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">State</label>
                  <?php

                  $id=$_GET['id'];
                  $states=DB::table('states')->get();
                  $default_state=DB::table('states')->where('id', 1)->first()->state_name;
                  $name=$default_state;

                  foreach ($states as $value) {
                    if($value->id == $_GET['id']){
                      $name=$value->state_name;
                    }
                  }

                  ?>
                  <input name="state" type="text" class="form-control-1" id="usr4" value="{{$name}}" readonly="">
                </div>
              </div>
              <div class="col-sm-3 col-md-3 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">Zip</label>
                  <input required="" name="zip" type="text" class="form-control-1" id="usr5">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-6 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">Date of Birth</label>
                  <input required="" name="date_of_birth" type="date" class="form-control" id="usr7">
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">Phone number</label>
                  <input required="" name="phone" type="text" class="form-control-1" id="usr6">
                </div>
              </div>
            </div>
            <div class="row" id="noninsured">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div  class="form-group-1">
                  <label for="usr"> Social Security Number </label>
                    <input name="ssn" type="text" class="form-control-1" id="usr6">
                </div>
              </div>
            </div>
            <div class="row" id="insurance1">
              <div class="col-sm-4 col-md-4 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">Insurance Company Name</label>
                  <input name="insurance_company_name" type="text" class="form-control" id="usr7">
                </div>
              </div>
              <div class="col-sm-4 col-md-4 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">Insurance #</label>
                  <input name="insurance_number" type="text" class="form-control-1" id="usr6">
                </div>
              </div>
              <div class="col-sm-4 col-md-4 col-xs-6">
                <div class="form-group-1">
                  <label for="usr">Group #</label>
                  <input name="group_number" type="text" class="form-control-1" id="usr6">
                </div>
              </div>
            </div>            
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="insurance2">
                <div  class="form-group-1">
                  <label for="usr"> Please Upload Insurance Card </label>
                    <input type="file" id="myFile" name="insurance_card">                      
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div  class="form-group-1">
                  <label for="usr"> Please Upload Driver's License </label>
                    <input required="" type="file" id="myFile" name="driver_liscence">                      
                </div>
              </div>
            </div>

            <!-- HIPPA Authorization -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div  class="form-group-1">
                  <!-- <a href="#" data-toggle="modal" data-target="#myModal"> -->
                  <input type="checkbox" id="authorization" name="authorization" required="">
                <!-- </a> -->
                  <label for="usr"> HIPPA Authorization </label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="contact-us-btn text-center">
                  <!--<a href="#">Submit Now</a>-->
                  <button>Submit Now</button>
                </div>
              </div>
            </div>
          </form>
            <div class="row">
              <div class="col-sm-12 col-xs-12 col-md-12">
                <div class="under-info">
                   <?= html_entity_decode($cms1->content) ?>
                 </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2 col-xs-12 col-md-2"></div>
      </div>
    </div>
  </div>
</section>
<!-- Covid test form Section End -->

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">HIPPA Authorization</h4>
        </div>
        <div class="modal-body">
          <ol>
            <li>This authorization may include disclosure of information relating to COVID-19 testing only if I place my initials on the appropriate line.  In the event of health information described below includes any of these types of information, and I initial the line below, I specifically authorize release of such information to the person(s) related to Nurse’s Heart Medical Staffing and any subsidiaries affiliated with NHMS</li><br>
            <li>If I am authorizing the release of COVID-19 information, the recipient is prohibited from re-disclosing such information without my authorization unless permitted to do so under federal or state law.  I understand that I have the right to request a list of people who may receive or use my COVID-19 related information without authorization.  If I experience discrimination because of the release or disclosure of COVID-19 related information, I may contact the Ohio Civil Rights Commission Columbus Regional Office at (614) 466-5928.  This agency is responsible for protecting my rights.</li><br>
            <li>I have the right to revoke this authorization at any time by writing to the health care provided listed below.  I understand that I may revoke this authorization except to the extent that action has already taken based on this authorization.</li><br>
            <li>I understand that signing this authorization is voluntary.  My treatment, payment, enrollment in a health plan, or eligibility for benefits will not be conditioned upon my authorization of this disclosure.</li><br>
            <li>Information disclosed under this authorization might be re-disclosed by the recipient (except as noted above in Item 2), and this re-disclosure may no longer be protected by federal or state law</li><br>
            <li>THIS AUTHORIZATION DOES NOT AUTHORIZE YOU TO DISCUSS MY HEALTH INFORMATION OR MEDICAL CARE WITH ANYONE OTHER THAN THE NURSE'S HEART MEDICAL STAFFING OR ANY SUBSIDIARIES AFFILIATED WITH THE COMPANY</li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->


<!-- ============================================================== -->
<!-- BODY END HERE -->
<!-- ============================================================== -->

@endsection
@section('css')
<style>
  section.covid-form .contact-us-btn button {
    padding: 13px 50px;
    background-color: #0057ae;
    color: #fff;
    font-size: 15px;
    font-family: 'Poppins';
    font-weight: 600;
    text-shadow: none;
    border-radius: 17px;
    border: 1px solid #0057ae;
    transition: all 0.3s ease-in-out;
}

section.covid-form .contact-us-btn button:hover {
    background-color: #ad0401;
    color: #fff;
    border: 1px solid #ad0401;
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


.modal-body ol li{
  font-size: 13px;
}

.btn-default {
    padding: 13px 50px;
    background-color: #0057ae;
    color: #fff;
    font-size: 15px;
    font-family: 'Poppins';
    font-weight: 600;
    text-shadow: none;
    border-radius: 17px;
    border: 1px solid #0057ae;
    transition: all 0.3s ease-in-out;
    margin-right: 223px;
}

.btn-default:hover {
    background-color: #ad0401;
    color: #fff;
    border: 1px solid #ad0401;
}
</style>

 
@endsection

@section('js')
<script type="text/javascript"></script>

      <script>
        $(document).ready(function() {
          $("#noninsured").hide();
          $("#type").val("Insured");
         });


        function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.drop li');
    this.val = '';
    this.index = -1;
    this.initEvents();
}

DropDown.prototype = {
    initEvents: function () {
        var obj = this;
        obj.dd.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).toggleClass('active');
        });
        obj.opts.on('click', function () {
            var opt = $(this);
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text(obj.val);
            opt.siblings().removeClass('selected');
            opt.filter(':contains("' + obj.val + '")').addClass('selected');
        }).change();
    },
    getValue: function () {
        return this.val;
    },
    getIndex: function () {
        return this.index;
    }
};

$(function () {
    // create new variable for each menu
    var dd1 = new DropDown($('#noble-gases'));
    // var dd2 = new DropDown($('#other-gases'));
    $(document).click(function () {
        // close menu on document click
        $('.wrap-drop').removeClass('active');
    });
});
      </script>

      <script type="text/javascript">
        
         $("#insured").click(function(){
          $("#insurance1").show();
          $("#insurance2").show();
          $("#noninsured").hide();
          $("#type").val("Insured");
         });

         $("#non_insured").click(function(){
          $("#insurance1").hide();
          $("#insurance2").hide();
          $("#noninsured").show();
          $("#type").val("Non Insured");
         });
      </script>

      <script type="text/javascript">
        
        $('input[type="checkbox"]').on('change', function(e){
   if(e.target.checked){
     $('#myModal').modal();
   }
});
       

      </script>
@endsection