<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Division;

class WelcomePageController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}
