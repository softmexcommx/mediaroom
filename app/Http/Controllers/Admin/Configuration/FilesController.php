<?php

namespace App\Http\Controllers\Admin\Configuration;

use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\ModelsView\ResponseModelView;
use App\Models\Area;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

  
    public function index($id){
        

        return response()->json($files);
    }

}
