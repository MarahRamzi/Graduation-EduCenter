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
