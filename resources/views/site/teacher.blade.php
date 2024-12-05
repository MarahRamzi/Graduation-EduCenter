@extends('site.master')

@section('content')
<section class="page-title-section overlay" data-background="{{ asset('frontend/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb mb-2">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="index.html">Home</a></li>
            <li class="list-inline-item text-white h3 font-secondary nasted">Our teacher</li>
          </ul>
          <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- teachers -->
  <section class="section">
    <div class="container">
      <div class="row">

        <div class="col-12">
          <!-- teacher category list -->
          <ul class="list-inline text-center filter-controls mb-5">
            <li class="list-inline-item m-3 text-uppercase active" data-filter="all">All</li>
            @foreach ( $teachers as $item )
            <li class="list-inline-item m-3 text-uppercase" data-filter="arts">{{ $item->major}}</li>
            @endforeach
          </ul>
        </div>


      </div>
      <!-- teacher list -->
      <div class="row filtr-container">
        @foreach ( $teachers as $item )
        <!-- teacher -->
        <div data-category="arts, law" class="col-lg-4 col-sm-6 mb-5 filtr-item">
          <div class="card border-0 rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="{{ asset('uploads/teachers/' . $item->image) }}" alt="teacher">
            <div class="card-body">
              <a href="teacher-single.html">
                <h4 class="card-title">{{ $item->name}}</h4>
              </a>
              <p>{{ $item->major}}</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a class="text-color" href="https://facebook.com/themefisher"><i class="ti-facebook"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="https://twitter.com/themefisher"><i class="ti-twitter-alt"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="https://github.com/themefisher"><i class="ti-google"></i></a></li>
                <li class="list-inline-item"><a class="text-color" href="https://instagram.com/themefisher/"><i class="ti-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    </div>
    </section>

        <!-- teacher -->



        <!-- teacher -->

        <!-- teacher -->

        <!-- teacher -->

        <!-- teacher -->

        <!-- teacher -->

        <!-- teacher -->

        <!-- teacher -->

  <!-- /teachers -->






@stop
