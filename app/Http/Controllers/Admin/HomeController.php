<?php

namespace App\Http\Controllers\Sicenet;

use App\Http\Controllers\Controller;
use JavaScript;

class HomeController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth:instructor']);
    }

    public function index()
    {

        JavaScript::put([
            'path' => env('APP_URL'),
        ]);

        return view('sicenet.home.index');
    }
}
