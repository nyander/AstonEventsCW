@extends('layouts.app')
@section('content')
<header>
  <div class="container">
    <div id="branding">
      <h1> <span class="highlight"><h1><b>Post event</b></h1></span> </h1>
      <p> <b>Below, add the information for your Event</b></p>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-10">



            <hr />

            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Event's name" required>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="description" rows="4" placeholder="Provide information of the Event" required></textarea>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control"  name= "due_date" required>
                </div>

                <div class="form-group">
                    <input type="time" class="form-control"  name= "time" placeholder="events time" required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control"  name= "email" placeholder="email" required>
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" name="contact" placeholder="contact number" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="venue" placeholder="venue/location" required>
                </div>

                <div class="form-group">
                    <label for="exampleSelect2">Event type</label>
                    <select class="form-control" name="type" required>
                    <option value="">pick event type</option>
                    <option>sport</option>
                    <option>culture</option>
                    <option>other</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="file" class="form-control" name="thumbnail_path" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Post</button>
            </form>

            <!-- Errors -->
            @if(count($errors))
                <ol class ="text-center p-2">
                    @foreach($errors->all() as $error)
                        <p style='color:red'>{{$error}}</p>
                    @endforeach
                </ol>
            @endif

        </div>
    </div>
</div>
<footer>
  <p>
    Aston Events, Copyright &copy; 2018
  </p>
</footer>
@endsection
