@extends('site.master')

@section('content')

    <!-- page title -->
    <section class="page-title-section overlay" data-background="{{ asset('frontend/images/backgrounds/page-title.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="index.html">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">Our Courses</li>
                    </ul>
                    <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment
                        favoured by some universities and the emphasis placed on final exams by others.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- courses -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <!-- course item -->
                @include('includes.course')

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

        </div>
        </div>
    </section>



@stop
