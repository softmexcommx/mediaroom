<?php

namespace App\Http\Controllers;

class DataTablesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

}
