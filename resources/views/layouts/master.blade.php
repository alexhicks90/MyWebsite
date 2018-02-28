
<!doctype html>
<html lang="en">
  <head>
    <title>Alex Hicks</title>
    <meta name="description" content="Junior Web Developer Profile. Looking for opportunities.">
    <meta name="keywords" content="HTML5, CSS3, Bootstrap, JavaScript, PHP, XML">
    <meta name="author" content="Alex Hicks">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../../../../favicon.ico">

    <!-- Bootstrap core CSS -->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 -->
    <!-- Custom styles for this template -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="content">
      @include ('layouts.nav')
      
      <main role="main" class="container">
        <div class="my-3">
          
          @yield ('content')

          
        </div>
      </main>
    </div>

    @include ('layouts.footer')
    
  </body>
</html>
