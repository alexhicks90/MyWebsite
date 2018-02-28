@extends ('layouts.master')

@section('content')

    <div>
        <h2>High Scores Page</h2>
        <h4>{{ ucfirst($difficulty) }} Difficulty</h4>

        @if (!empty($scores))

                <div class="row">
                    <div class="col-4">Rank:</div>
                    <div class="col-4">Name:</div>
                    <div class="col-4">Time:</div>
                </div>
                @foreach($scores as $score)
                    <div class="row">
                        <div class="col-4 monospace">
                            {{ $rankNumbers[$loop->index] }}
                        </div>   
                        <div class="col-4 monospace">
                            {{ $score->name }}
                        </div>
                        <div class="col-4 monospace"> 
                            {{ $formattedTimes[$loop->index] }}
                        </div>
                    </div>  
                @endforeach

        @endif
    </div>
      
    
  @include('layouts.errors')


@endsection