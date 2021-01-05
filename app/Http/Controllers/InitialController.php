<?php

namespace App\Http\Controllers;

use App\SafetyZonesSetings;
use App\SecurityPolities;
use Illuminate\Http\Request;

class InitialController extends Controller
{
    //
    public function initial()
    {
        SecurityPolities::create([
            'deaths' => 0,
            'injury' => 0,
            'hospitalized' => 0,
            'accidents_people' => 0,
            'accidents_times' => 0,
            'accidents_false' => 0,
            'fines_times' => 0,
            'fines_million' => 0
        ]);

        SafetyZonesSetings::create([
            'title' => '特殊專區',
            'switch' => ''
        ]);
    }
}
