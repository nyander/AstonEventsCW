@extends('layouts.app')
@section('content')
<header>
  <div class="container">
    <div id="branding">
      <h1> <span class="highlight"><h1><b>Event Details</b></h1></span> </h1>
      <p>
</header>
    <div class="container">
        <div class="row">

        <!-- Carousel -->
            <div class="col-md-8">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- The slideshow -->
                    <div class="carousel-inner">

                        <!-- Thumbnail -->
                        <div class="carousel-item active">
                            <img src="{{ url('/photos/' .$event->thumbnail_path) }}" width="100%">
                            <!-- <img src="{{ $event->thumbnail_path }}" width="100%"> -->
                        </div>

                        <!-- Photos associated with the event -->
                        @foreach($event->photos as $photo)
                        <div class="carousel-item">
                            <img src="{{ url('/photos/' .$photo->path) }}" width="100%">
                            <!-- <img src="{{ $photo->path }}" width="100%"> -->
                            @can('update', $event)
                            <div class="carousel-caption">
                                <form action="{{ route('photos.deletes', $photo) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">remove</button>
                                </form>
                            </div>
                            @endcan
                        </div>
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

                <h3 class="mt-3" style="font-family:Comic Sans MS, cursive, sans-serif"><u>comments</u></h3>
                <hr />

                <!-- Replies -->
                <replies :data=" {{ $event->replies }}"></replies>

            </div>

            <!-- Event Information -->
            <div class="col-md-4 p-3" id ="showblade">

                <div class="card bg-light mb-3" >
                    <div class="card-header">{{ $event->type }}</div>
                    <div class="cBody">
                      <h5 class="card-title">{{ $event->name }}</h5>
                      <b>Time: </b><p class="card-text">{{ $event->time }}</p>
                      <b>Date: </b><p class="card-text">{{ $event->due_date }}</p>
                      <b>Contact:</b> <p class="card-text">{{ $event->contact }}</p>
                      <b>Description: </b><p class="card-text">{{ $event->description }}</p>
                      <b>Email: </b><a href="mailto: {{$event->email}}"> <p class="card-text">{{ $event->email }}</p></a>
                        @auth <favorite :event ="{{ $event }}"></favorite> @endauth
                    </div>
                </div>

                @can('update', $event)
                <div class="card bg-light mb-3">
                    <div class="card-header">Upload photos</div>
                    <div class="cBody">
                        <form action="{{ route('photos.store', $event) }}" method="POST" class="form-group" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-control">
                                <input name="photos[]"  type="file" multiple required/>
                            </div>
                            <input type="submit" class="btn btn-default mt-2" value="Upload" />
                        </form>
                    </div>
                </div>
                @endcan
            </div>

        </div>
    </div>
@endsection
