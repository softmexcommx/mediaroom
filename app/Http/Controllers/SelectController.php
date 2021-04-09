<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SelectController extends Controller
{

    public function __construct()
    {
        $this->middleware('cors');
    }

}
