<?php

namespace App\Http\Controllers\SicenetEnLinea;

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
        $threads = Thread::forUser(Auth::guard('web')->user()->usudis_cve)->latest('updated_at')->take(5);

        $cursosActivos = Auth::guard('web')->user()->data->cursosActivosVirtuales;
        $cursosDisponibles = Auth::guard('web')->user()->data->cursosDisponibles;

        JavaScript::put([
            'path' => env('APP_URL'),
            'tra_cve' => Auth::guard('web')->user()->usudis_cve,
        ]);

        return view('sicenet_enlinea.index')
            ->with('cursosActivos', $cursosActivos)
            ->with('cursosDisponibles', $cursosDisponibles)
            ->with('threads', $threads);
    }
}
