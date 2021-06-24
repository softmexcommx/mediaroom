<?php

namespace App\Http\Controllers\MediaRoom;

use App\Http\Controllers\Controller;
use Auth;
use JavaScript;
use App\Models\Area;
use App\Models\Category;
use Illuminate\Http\Request;
class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index($idCategory = null)
    {

        $query = Category::query();
        $categories = $query->where('edo', true)->get();

        JavaScript::put([
            'path' => env('APP_URL'),
            'id' => Auth::guard('web')->user()->id,
            'idCategory' => $idCategory
        ]);

        return view('mediaroom.images.index')->with('categories', $categories);
    }

    public function getAreas(Request  $request)
    {        
        $data = [];
        $query = Area::query();

        if($request->idCategory != null){
            $query->where('category_idCategory',$request->idCategory);
        }
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


    public function area($idArea)
    {

        $area = Area::find($idArea);                
        JavaScript::put([
            'path' => env('APP_URL'),
            'id' => Auth::guard('web')->user()->id,
            'idArea' => $idArea
        ]);

      

        return view('mediaroom.images.details')->with('area', $area);
    }
}

