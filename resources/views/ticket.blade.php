<?php

$ticket_num = Session::get('ticket_number');
?>


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
            <h1>Signup Successful!</h1>
            <h2>Your Ticket Number is: {{$ticket_num}} </h2>
            
            
            
          </div>
        </div>
        <div class="col-sm-2 col-xs-12 col-md-2"></div>
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
 .contact-us-main-content h2 {
    text-align: center;
    margin-bottom: 30px;
    margin-top: -10px;
    font-size: 26px;
}

section.covid-form .contact-us-main-content {
    padding: 60px 30px 30px 30px;
    background-color: #fff;
    box-shadow: 0px 2px 5px #ccc;
    position: relative;
    left: 55px;
    margin-top: 70px;
    margin-right: 20px;
    z-index: 1;
}

section.covid-form {
    padding: 0px;
    margin-bottom: 76px;
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
@endsection