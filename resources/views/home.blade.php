@extends('layouts.app')

@section('content')
<html>
  <head>
    <meta charset="utf-8" />
    <meta name ="viewport" content="width=device-width" />
    <meta name = "keywords" content="Event organisation, Event development, Aston events" />
    <meta name = "description" content="Website which will allow you create an event for students" />
    <meta name = "author" content="Richard Nyande" />
    <link rel="stylesheet" href="./sass/app.scss">
    <title>Aston Events Website- Home</title>
  </head>
  <body>

    <header>
      <div class="container">
        <div id="branding">
          <h1> <span class="highlight">My Events</span> </h1>
          <p class="homecaseinformation">
            <b>This Page holds all of Your Events</b>
          </p>
    </header>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                @if(count($events))
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Events</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                        <td><a id ="bold" href="{{ route('events.show', $event) }}"> <strong>{{ $event->name}}</strong> </a> </td>
                        <td><a href="{{ route('events.edit', ['event' => $event] ) }}" class="text-dark" style="text-decoration:none">edit</a></td>
                        <td>
                            <form action="{{ route('events.destroy', ['event' => $event] ) }}" method="POST">
                                {{method_field('DELETE')}}

                                {{csrf_field()}}
                                <a href="#" onclick="$(this).closest('form').submit()" class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @else
                    <section id="create">
                    <img src='./photos/index.png'>
                    <h1 style="font-family:Comic Sans MS, cursive, sans-serif"><a href="{{ route('events.create')}} "><u>Create new Event</u></a></h1>
                  </section>
                    @endunless
                </div>
            </div>
        </div>
      </section>

      <section id="boxes">
        <div class="container">
          <div class="box">
          <img src='./photos/Cutlure.jpg'>
            <h3>Culture</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
          </div>

          <div class="box">
            <img src='./photos/sports.png'/>
            <h3>Sports</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
          </div>

          <div class="box">
            <img id="others" src="./photos/others.png"/>
            <h3>Others</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
          </div>

        </div>
      </section>

  <footer>
    <p>
      Aston Events, Copyright &copy; 2018
    </p>
  </footer>
  </body>
    </section>


</html>
@endsection
