 @extends('site.master')

@section('title', 'Home|' . env('APP_NAME'))

@section('content')
<!-- hero slider -->

<section class="hero-section overlay bg-cover" data-background="{{ asset('frontend/images/banner/banner-1.jpg')}}">
  <div class="container">
    <div class="hero-slider">
      <!-- slider item -->

      <div class="hero-slider-item">
        <div class="row">
          <div class="col-md-8">
            <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Your bright future is our mission</h1>
            <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor
              incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>
            <a href="{{ route('contact')}}" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">Apply now</a>
          </div>
        </div>
      </div>




      <!-- slider item -->

      <!-- slider item -->

    </div>
  </div>
</section>

<!-- /hero slider -->

<!-- banner-feature -->
<section class="bg-gray overflow-md-hidden">
  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-xl-4 col-lg-5 align-self-end">
        <img class="img-fluid w-100" src="{{ asset('frontend/images/banner/banner-feature.png')}}" alt="banner-feature">
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="row feature-blocks bg-gray justify-content-between">
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Scholorship News</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Notice Board</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Achievements</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
          <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
            <i class="ti-write mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
            <h3 class="mb-xl-4 mb-lg-3 mb-4">Admission Now</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
              et dolore magna aliqua. Ut enim ad</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /banner-feature -->

<!-- about us -->
 <section class="section">
    <div class="container">
      <div class="row align-items-center">
        @foreach ( $abouts as $item)


        <div class="col-md-6 order-2 order-md-1">
          <h2 class="section-title">{{ $item->title }}</h2>
          <p>{{ $item->description }} </p>
          <a href="{{route('site.about')}}" class="btn btn-outline-primary">{{ $item->btn_text}}</a>
        </div>
        <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
          <img class="img-fluid w-100" src="{{ asset('uploads/abouts/' . $item->image) }}" alt="about image">
        </div>
        @endforeach
      </div>
    </div>
  </section>
<!-- /about us -->

<!-- courses -->
 <section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3">Our Courses</h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="{{ route('site.courses')}}" class="btn btn-sm btn-outline-primary ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
    <!-- course list -->
<div class="row justify-content-center">
  <!-- course item -->
  
  @include('includes.course')
  
</div>

  <!-- course item -->

  <!-- course item -->

  <!-- course item -->

  <!-- course item -->

  <!-- course item -->

<!-- /course list -->
    <!-- mobile see all button -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="courses.html" class="btn btn-sm btn-outline-primary d-sm-none d-inline-block">sell all</a>
      </div>
    </div>
  </div>
</section>
<!-- /courses -->

<!-- cta -->
 <section class="section bg-primary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h6 class="text-white font-secondary mb-0">Click to Join the Advance Workshop</h6>
        <h2 class="section-title text-white">Training In Advannce Networking</h2>
        <a href="contact.html" class="btn btn-light">join now</a>
      </div>
    </div>
  </div>
</section>
<!-- /cta -->

<!-- success story -->
 @include('includes.sucessstory')
<!-- /success story -->

<!-- events -->
 <section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="d-flex align-items-center section-title justify-content-between">
          <h2 class="mb-0 text-nowrap mr-3">Upcoming Events</h2>
          <div class="border-top w-100 border-primary d-none d-sm-block"></div>
          <div>
            <a href="events.html" class="btn btn-sm btn-outline-primary ml-sm-3 d-none d-sm-block">see all</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- event -->
  @foreach ($events as $item)


   <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
   @include('includes.event')
  </div>
  @endforeach
  <!-- event -->

  <!-- event -->

 </div>
    <!-- mobile see all button -->
    <div class="row">
      <div class="col-12 text-center">
        <a href="course.html" class="btn btn-sm btn-outline-primary d-sm-none d-inline-block">sell all</a>
      </div>
    </div>
  </div>
</section>
<!-- /events -->

<!-- teachers -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title">Our Teachers</h2>
      </div>
      <!-- teacher -->
      @foreach ( $teachers as $item )


       <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        @include('includes.teacher')
        </div>
      </div>
      @endforeach
      <!-- teacher -->

      <!-- teacher -->

     </div>
  </div>
</section>
<!-- /teachers -->

<!-- blog -->
 <section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Latest News</h2>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- blog post -->
  @foreach ($news as $item )
  <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
    @include('includes.news')
  </article>
  @endforeach
  <!-- blog post -->

  <!-- blog post -->

 </div>
  </div>
</section>
<!-- /blog -->

@stop




