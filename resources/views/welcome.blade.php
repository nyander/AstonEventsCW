@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name ="viewport" content="width=device-width" />
    <meta name = "keywords" content="Event organisation, Event development, Aston events" />
    <meta name = "description" content="Website which will allow you create an event for students" />
    <meta name = "author" content="Richard Nyande" />
    <link rel="stylesheet" href="./sass/app.scss">
    <title>Aston Events Website- index</title>
  </head>
  <body>

    <header>
      <div class="container">
        <div id="branding">
          <h1> <span class="highlight">Aston</span> Events </h1>
    </header>

    <section id="showcase">
      <div class="container">
        <h1>Welcome</h1>
        <p>The Emersive platform to find the latest and most popular Events occuring at Aston University</p>
      </div>
    </section>

    <section id="boxes">
      <div class="container">
        <div class="box">
        <img src='./photos/Cutlure.jpg' >
          <h3>Culture</a></h3>
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
</html>
@endsection
