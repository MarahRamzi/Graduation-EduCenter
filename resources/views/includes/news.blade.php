<div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
    <img class="card-img-top rounded-0" src="{{ asset('uploads/news/' . $item->image) }}" alt="Post thumb">
    <div class="card-body">
      <!-- post meta -->
      <ul class="list-inline mb-3">
        <!-- post date -->
        <li class="list-inline-item mr-3 ml-0">{{ $item->date}}</li>
        <!-- author -->
        <li class="list-inline-item mr-3 ml-0">{{ $item->auther}}</li>
      </ul>
      <a href="blog-single.html">
        <h4 class="card-title">{{ $item->title}}</h4>
      </a>
      <p class="card-text">{{ $item->description}}</p>
      <a href="blog-single.html" class="btn btn-primary btn-sm">{{ $item->btn_text}}</a>
    </div>
  </div>
