<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;

class ScoreController extends Controller
{
    public function show() {

        $difficulty = request()->segment(3);

        $query = Score::where('difficulty', '=', $difficulty)
            ->orderBy('time', 'asc')
            ->take(10);

        $scores = $query->get(); 
        $times = $query->pluck('time');
        $formattedTimes;
        $rankNumbers;

        for ($i = 0; $i < sizeOf($times); $i++) {
            
            //Format times for human readability
            $hours = substr(floor($times[$i] / 3600), -2);
            $minutes = substr(floor($times[$i] / 60) % 60, -2);
            $seconds = substr(floor($times[$i] % 60), -2);

            $hourString = $hours . " Hour" . ($hours!=1 ? "s, " : ", ");
            $minuteString = $minutes . " Minute" . ($minutes!=1 ? "s, " : ", ");
            $secondString = $seconds . " Second" . ($seconds!=1 ? "s" : "");

            if ($hours == 0 && $minutes == 0) {
                $formattedTimes[$i] = $secondString;
            } else if ($hours == 0) {
                $formattedTimes[$i] = $minuteString. $secondString;
            } else {
                $formattedTimes[$i] = $hourString . $minuteString . $secondString;
            }
            

            // Populate rankNumbers Array to account for ties
            if ($i > 0 && $times[$i] != $times[$i-1]) {
                $rankNumbers[$i] = $i + 1;
            } else if ($i == 0) { 
                $rankNumbers[$i] = 1;
            } else {
                $rankNumbers[$i] = $rankNumbers[$i-1];
            }
        }

        return view('minesweeper.scores', compact('scores', 'difficulty', 'formattedTimes', 'rankNumbers'));
    }
}
