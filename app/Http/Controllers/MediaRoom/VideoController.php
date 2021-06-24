<?php

namespace App\Http\Controllers\MediaRoom;

use App\Http\Controllers\Controller;
use Auth;
use JavaScript;
use App\Models\Area;
use App\Models\Category;
use Illuminate\Http\Request;
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index($idArea= null)
    {

        $query = Category::query();
        $categories = $query->where('edo', true)->get();

        JavaScript::put([
            'path' => env('APP_URL'),
            'id' => Auth::guard('web')->user()->id,
            'idArea' => $idArea
        ]);

        return view('mediaroom.videos.index')->with('categories', $categories);
    }

    public function getVideos(Request  $request)
    {        
        $data = [];
        $query = Area::query();

        if($request->idArea != null){
            $query->where('idArea',$request->idArea);
        }
        $areas = $query->get();

        foreach($areas as $item){
          
            foreach($item->videos as $video)
        
            $data[] = array(
                'name' => $video['name'],                
                'ext' => $video['ext'],                
                'url' => $video['url']
            );
        }
        
        return response()->json($data);
    }
}