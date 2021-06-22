<?php

namespace App\Http\Controllers\MediaRoom;

use App\Http\Controllers\Controller;
use Auth;
use JavaScript;
use Lexx\ChatMessenger\Models\Thread;

// Pusher\Laravel\Facades\Pusher

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      
        JavaScript::put([
            'path' => env('APP_URL'),
            'id' => Auth::guard('web')->user()->id,
        ]);

        return view('mediaroom.home.index');
    }

    public function images()
    {
      
        JavaScript::put([
            'path' => env('APP_URL'),
            'id' => Auth::guard('web')->user()->id,
        ]);

        return view('mediaroom.home.images');
    }
}
