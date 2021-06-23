<?php

namespace App\Http\Controllers\MediaRoom;

use App\Http\Controllers\Controller;
use Auth;
use JavaScript;
use App\Models\Area;
use Illuminate\Http\Request;
class ImageController extends Controller
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

        return view('mediaroom.images.index');
    }

    public function getAreas(Request $request)
    {        
        $data = [];
        $query = Area::query();
        $areas = $query->get();

        foreach($areas as $item){
          
            $data[] = array(
                'idArea' => $item->idArea,
                'nameArea' => $item->nameArea,
                'thumbnail' => $item->thumbnail
            );
        }
        
        return response()->json($data);
    }
}