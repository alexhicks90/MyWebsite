@extends ('layouts.master')

@section('content')

    <div class="col-sm-1"></div>
    <div class="col-sm-6">
        <form method="POST" action="/minesweeper/scores">
            {{ csrf_field() }}

            <h2>Hello there</h2>
            <p>Enter Your Score: </p>
            <div class="mt-4">
                <div class="form-group">
                    <label for="time">
                        Time:
                    </label>
                    <input class="form-control" type="string" name="time" id="time" value="{{ $time }}" readonly>
                </div>
                <div class="form-group">
                    <label for="difficulty">
                        Difficulty:
                    </label>
                    <input class="form-control" type="string" name="difficulty" id="difficulty" value="{{ $difficulty }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name">
                        Name:
                    </label>
                    <input class="form-control" type="string" name="name" id="name">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-warning mt-2">Submit Score</button>
            </div>   
        </form>
    </div>
    <aside class="col-sm-2">
        <center><br/><br/><br/><br/><br/><br/>
            <a href="/minesweeper/index" class="btn btn-info mt-2">Play Again - Same Settings</a>
            <a href="/minesweeper/index" class="btn btn-info mt-2">Play Again - Pick New Settings</a>
        </center>
    </aside>

  @include('layouts.errors')




@endsection