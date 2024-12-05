@extends('site.master')

@section('content')

<!-- page title -->
<section class="page-title-section overlay" data-background="{{ asset('frontend/images/backgrounds/page-title.jpg')}}">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb mb-2">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="index.html">Home</a></li>
            <li class="list-inline-item text-white h3 font-secondary nasted">Upcoming Events</li>
          </ul>
          <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- courses -->
  <section class="section">
    <div class="container">
      <div class="row">
        <!-- event -->
        @foreach ($events as $item)
        <div class="col-lg-4 col-sm-6 mb-5">
          @include('includes.event')
        </div>
        @endforeach
        <!-- event -->

        <!-- event -->

        <!-- event -->

        <!-- event -->

        <!-- event -->

      </div>
    </div>
  </section>
  <!-- /courses -->


@stop
