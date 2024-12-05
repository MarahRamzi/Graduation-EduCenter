<div class="card border-0 rounded-0 hover-shadow">
    <div class="card-img position-relative">
      <img class="card-img-top rounded-0" src="{{ asset('uploads/events/' . $item->image) }}" alt="event thumb">
      <div class="card-date"><span>18</span><br>December</div>
    </div>
    <div class="card-body">
      <!-- location -->
      <p><i class="ti-location-pin text-primary mr-2"></i>{{ $item->location }}</p>
      <a href="event-single.html"><h4 class="card-title">{{ $item->description }}</h4></a>
    </div>
  </div>


  {{-- <div class="card">
    <span id="date" class="text-light font-weight-bold rounded">8 OCT</span>
    <img class="card-img-top" src="{{ asset('uploads/events/' . $item->image) }}" alt="Card image cap">
    <div class="card-body d-flex flex-column justify-content-between">
    <p><span class="text-success"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg></span>
    <small>{{ $item->location }}</small>
    </p>
    <p><b>{{ $item->description }}</b></p>
    </div> --}}
