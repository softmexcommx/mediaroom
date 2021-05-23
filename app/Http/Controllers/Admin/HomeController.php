<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use JavaScript;

class HomeController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth:admin']);
    }

    public function index()
    {

        JavaScript::put([
            'path' => env('APP_URL'),
        ]);

        return view('admin.home.index');
    }
}
