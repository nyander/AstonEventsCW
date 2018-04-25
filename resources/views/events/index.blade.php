@extends('layouts.app')
@section('content')

<header>
  <div class="container">
    <div id="branding">
      <h1> <span class="highlight">Events</span> </h1>
      <p class="homecaseinformation">
        <b>Select Event</b>
      </p>
</header>

<section id="">
  <div class="container">
      <div class="row">

          @foreach($events as $event)

          <div class="col-md-4 p-3">
            <div class="containerit">
              <a href="{{ $event->path() }}">
                  <div class="card bg-dark text-white" style="font-family:cursive,Comic Sans MS, , sans-serif">
                      <img class="card-img" src="{{ url('/photos/' .$event->thumbnail_path) }}" style="opacity:1;" class="image">
                      <!-- <img class="card-img" src="{{ $event->thumbnail_path }}" style="opacity:0.2;"> -->
                      <div class="overlayit">
                      <div class="cBody">
                          <h5 class="card-title"><b>Title:</b> {{ $event->name }}</h5>
                          <p class="card-text"> <b>Venue:</b>{{ $event->venue }}</p>
                          <p class="card-text"> <b>Type:</b> {{ $event->type }}</p>
                          <p class="card-text"> <b>Likes:</b> {{ $event->favorites_count }}</p>
                          <p class="card-text"> <b>Due date:</b> {{ $event->due_date }}</p>
                          <p class="card-text"> <b>Time:</b>{{ $event->time }}</p>
                          <p class="card-text"> <b>Email:</b> {{ $event->email }}</p>
                      </div>
                    </div>
                  </div>
              </a>
            </div>
          </div>


          @endforeach

      </div>

      {{$events->links()}}

  </div>

</section>
<footer>
  <p>
    Aston Events, Copyright &copy; 2018
  </p>
</footer>
</body>
</html>


@endsection
