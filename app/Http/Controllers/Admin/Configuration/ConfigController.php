<?php

namespace App\Http\Controllers\Sicenet\Configuration;

use App\Http\Controllers\Controller;
use App\ModelsView\ResponseModelView;
use Auth;
use Exception;
use Illuminate\Support\Facades\Artisan;
use JavaScript;

class ConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:instructor');
    }

    public function index()
    {
        JavaScript::put([
            'path' => env('APP_URL'),
            'clear' => route('config.clear'),
        ]);

        return view('sicenet.configuration.index');
    }

    public function clear()
    {
        $resp = new ResponseModelView;
        try {

            if (Auth::guard('instructor')->user()->hasPermissionTo('config clear-cache', 'instructor')) {
                //ClearSicenet::dispatch();
                Artisan::call('sicenet:clear');

                $resp->mensaje = "La limpieza se ha enviado satisfactoriamente";
                $resp->codigo = 200;
            } else {
                return redirect()->route('sicenet.login');
            }
        } catch (\Exception $e) {
            $resp->error = $e->getMessage();
            $resp->codigo = 400;
        }

        return response()->json($resp);
    }
}
