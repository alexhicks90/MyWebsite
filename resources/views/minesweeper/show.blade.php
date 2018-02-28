@extends ('layouts.master')

@section('content')

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/css/minesweeper.css">
</head>
<body>
  <div id="minePage" class="jumbotron">
    <h2 class="display-4 ml-3">Alex's Pure Javascript Minesweeper</h2>
    <div id="test" class="jumbotron mx-2 bg-inverse">
    <br/>
      <div id="timer" class="mx-auto"></div>
      <h5 class="mt-2 mx-auto text-white">Mines: <span class="badge badge-pill badge-danger" id="mineCount"></span></h5>
      <div id="boardContainer" class="mx-auto"></div>
    </div>
  </div>

  
  <script>

    // pass form values to json for minesweeper script
    var height = {!! json_encode($height) !!};
    var width = {!! json_encode($width) !!};
    var mines = {!! json_encode($mines) !!};
    var boardPadding = {!! json_encode($boardPadding) !!};
    var difficulty = {!! json_encode($difficulty) !!};

    

    // add padding to board based on width input
    var board = document.getElementById("boardContainer");
    //board.style.paddingLeft = boardPadding + "%";
    var boardWidth = 18 * width;
    board.style.width = boardWidth + "px";
    
  </script>

  <script src="/js/minesweeper.js"></script>
</body>

@endsection