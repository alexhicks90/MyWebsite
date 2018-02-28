@extends ('layouts.master')

@section('content')
<div class="row">
<div class="blog-header mt-3">
  <div class="container">
    <h1 class="blog-title">Alex's Classic Minesweeper</h1>
    <p class="blog-description">Classic Minesweeper re-creation made with pure JavaScript</p>
  </div>
</div>
@if (session('status'))
    <h4 class="alert alert-info">
        {{ session('status') }}
    </h4>
@endif
<div>
  <form method="POST" action="/minesweeper">
    {{ csrf_field() }}
    <label for="difficulty" class="ml-1">Choose your difficulty: </label>
    <select onchange="toggleCustom()" id="difficulty" class="form-control" name="difficulty">
        <option value="beginner">Beginner (12x12 - 18 Mines)</option>
        <option value="intermediate" selected>Intermediate (16x16 - 40 Mines)</option>
        <option value="expert">Expert (20x20 - 80 Mines)</option>
        <option value="custom">Custom - (Height, Width: 5 - 25  |  Mines: 5 - 200)</option>
    </select>
    <p class="mt-2">*Note* Scores only tracked for preset difficulties<br/><span style="visibility: hidden;">*Note**</span>(beginner, intermediate, expert)</p>
    <div id="customValues" class="collapse mt-4">
        <div class="form-group">
            <label for="height">
                Height: 
            </label>
            <input class="form-control" type="number" name="height" id="height" min="5" max="25">
        </div>

        <div class="form-check">
            <label for="width">
                Width:
            </label>
            <input class="form-control" type="number" name="width" id="width" min="5" max="25">
        </div>

        <div class="form-check">
            <label for="mines">
                Mines:  
            </label>
            <input class="form-control" type="number" name="mines" id="mines" min="5" max="200">
        </div>
    </div>
    <div class="my-3">
        <button type="submit" class="btn btn-warning">Let's Play!</button>
    </div>
  </form>
  @include('layouts.errors')
</div>
</div>
<script>
    function toggleCustom() {

        var difficulty = document.getElementById("difficulty");
        var custom = document.getElementById("customValues");
        //var status = custom.style.visibility;

        if (difficulty.value == "custom") {
            custom.classList.remove("collapse");
        } else {
            custom.classList.add("collapse");
        }              
    }
</script>

@endsection