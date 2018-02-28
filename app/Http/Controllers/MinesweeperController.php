<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Minesweeper;
use App\Score;

class MinesweeperController extends Controller
{
    
    public function index() {

        return view('minesweeper.index');
    }

    public function create(Request $request) {
        
        //dd($request->input('time'));

        $time = $request->input('time');
        $difficulty = $request->input('difficulty');
        
        if ($difficulty != "custom") {
            return view('minesweeper.create', compact('time', 'difficulty'));

        } else {
            //remove vars after testing
            return view('minesweeper.create', compact('time', 'difficulty'));
        }
    }

    public function show() {

        
        $difficulty = request('difficulty');
        //dd($difficulty);
        
        if ($difficulty != "custom") {

            switch($difficulty) {

                case "intermediate":
                    $height = 16;
                    $width = 16;
                    $mines = 40;
                    //$boardPadding = $width * 1.65;
                    break;

                case "beginner":
                    $height = 12;
                    $width = 12;
                    $mines = 18;
                    //$boardPadding = $width * 2.7;
                    break;
                
                case "expert":
                    $height = 20;
                    $width = 20;
                    $mines = 80;
                    //$boardPadding = $width;
                    break;                  
            }

        } else {

            $height = request('height');
            $width = request('width');
            $mines = request('mines');

            if ($height*$width <= $mines) {
                return redirect('/minesweeper/index')->with('status', 'You tried to make a game with as many or more mines than spaces for them. Please adjust your settings accordingly.');
            } 
            //$boardPadding = 50.2 - 1.4788164665523 * $width;
            //$boardPadding = 1;
        }
        $boardPadding = 0;
        
        return view('minesweeper.show', compact('height', 'width', 'mines', 'boardPadding', 'difficulty'));
    }

    public function store() {
        

        $this->validate(request(), [
            'time' => 'required',
            'difficulty' => 'required',
            'name' => 'required'
        ]);
        
        Score::create([
            'time' => request('time'),
            'difficulty' => request('difficulty'),
            'name' => request('name')
        ]);
        
        $difficulty = request('difficulty');
        return redirect('/minesweeper/scores/'.$difficulty.'');
        // $difficulty = request('difficulty');
        // $query = Score::where('difficulty', '=', $difficulty)
        //     ->orderBy('time', 'asc')
        //     ->take(10);
        // $scores = $query->get();
        // //dd($scores);
        // return view('minesweeper.scores', compact('scores', 'difficulty'));
    }
}
