@extends('website.layouts.master')
@section('title')
    {{ __('main.site') }} | {{ __('main.projects') }}
@endsection
@section('css')
@endsection
@section('content')
    <!--===== HERO AREA STARTS =======-->
<div class="inner-main-hero-area">
    <div class="img1">
      <img src="{{ asset('website/assets/img/all-images/hero/hero-img1.png') }}" alt="">
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-5">
            <div class="inner-heading header-heading">
                <h2>{{ __('main.projects') }} </h2>
                <div class="space24"></div>
                <p><a href="{{ route('home') }}">{{ __('main.home') }} <i class="fa-solid fa-angle-right"></i></a> <a href="{{ route('previous_work') }}">  {{ __('main.projects') }}</a></p>
            </div>
        </div>
        <div class="col-lg-2"></div>

      </div>
    </div>
  </div>
<!--===== HERO AREA ENDS =======-->

<!--===== GALLERY AREA STARTS =======-->
<div class="service3-section-area sp1">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">
        <div class="heading3 text-center space-margin60">
          <h5 data-aos="fade-left" data-aos-duration="800">{{ __('main.projects') }}  </h5>
          <div class="space20"></div>
          <h2 class="text-anime-style-3">{{ __('main.our galleries') }}   </h2>
        </div>
      </div>
    </div>
    <div class="row">
<?php $index=0 ?>
        @foreach ($galleries  as $gallery)


      <div class="col-lg-3 col-md-6" data-aos="zoom-in-up" data-aos-duration="800">
        <div class="amenities-boxarea">
          <div class="img1">
            <img src="{{asset($gallery->image)}}" alt="">
          </div>
          <div class="space32"></div>
          <div class="content-area">
            <a> {{ $gallery->title }}</a>
            <div class="space18"></div>
            <h3>0{{ ++$index }}</h3>
          </div>
        </div>
      </div>
 @endforeach
    </div>
  </div>
</div>
  <!--===== GALLERY AREA ENDS =======-->



@endsection
