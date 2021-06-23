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
use Illuminate\Support\Str;
class AreaController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

  
    public function index($id){
        $areas = DB::table('cat_areas')
        ->select('cat_areas.idArea', 'cat_areas.nameArea', 'cat_areas.slug', 'cat_areas.edo', 'cat_areas.category_idCategory')        
        ->where('category_idCategory', $id)
        ->where('edo', true)
        ->get();
        return response()->json($areas);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $resp = new ResponseModelView;
        try {
            

                $area = new Area;
                $area->namearea = $request->nameArea;  
                $area->slug = Str::slug($request->get('nameArea'), '_');
                $area->edo = true;
                $area->category_idCategory = $request->category_idCategory;                
                $area->save();
                DB::commit();
                $resp->descripcion = "El area ha sido creado satisfactoriamente";
                $resp->menesaje = 'ok';
                $resp->codigo = 200;
           
        } catch (\Exception $e) {
            DB::rollback();
            $resp->descripcion = $e->getMessage();
            $resp->menesaje = 'BAD REQUEST';
            $resp->codigo = 400;
        }
        return response()->json($resp);
    }

    public function update(Request $request,  $id)
    {
        DB::beginTransaction();
        $resp = new ResponseModelView;
        try {

         

                $area = Area::find($id);
                $area->nameArea = $request->nameArea;   
                $area->slug = Str::slug($request->get('nameArea'), '_');                  
                $area->category_idCategory = $request->category_idCategory;
                $area->save();

                DB::commit();

                $resp->descripcion = 'El area ha sido actualizado satisfactoriamente';
                $resp->mensaje = 'OK';
                $resp->codigo = 200;
           
        } catch (\Exception $e) {
            DB::rollback();
            $resp->error = $e->getMessage();
            $resp->menesaje = 'BAD REQUEST';
            $resp->codigo = 400;
        }

        return response()->json($resp);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $resp = new ResponseModelView;
        try {

          

                $area = Area::find($id);
                if (!$area == null) {

                    if ($area->edo == true) {
                        $area->edo = false;
                        $resp->descripcion = 'El area ha sido bloqueado';
                    } else {
                        $area->edo = true;
                        $resp->descripcion = 'El area ha sido activado';
                    }
                    $area->save();
                    DB::commit();

                    $resp->mensaje = 'OK';
                    $resp->codigo = 200;
                } else {
                    $resp->descripcion = 'No existe el area';
                    $resp->mensaje = '';
                    $resp->codigo = 401;
                }
            
        } catch (\Exception $e) {
            DB::rollback();
            $resp->error = $e->getMessage();
            $resp->codigo = 400;
        }

        return response()->json($resp);
    }
}
