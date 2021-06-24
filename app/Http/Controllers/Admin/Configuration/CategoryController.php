<?php

namespace App\Http\Controllers\Admin\Configuration;

use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\ModelsView\ResponseModelView;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    public function index()
    {
        $categories = DB::table('cat_categories')
            ->select('cat_categories.idCategory', 'cat_categories.nameCategory', 'cat_categories.slug', 'cat_categories.edo')            
            ->where('edo', true)
            ->get();
        return response()->json($categories);
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        $resp = new ResponseModelView;
        try {           
                $category = new Category;
                $category->nameCategory = $request->nameCategory; 
                $category->slug = Str::slug($request->get('nameCategory'), '_');
                $category->edo = true;                
                $category->save();
                DB::commit();
                $resp->descripcion = "La categoria ha sido creado satisfactoriamente";
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

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $resp = new ResponseModelView;
        try {

          

                $category = Category::find($id);
                $category->nameCategory = $request->nameCategory;   
                $category->slug = Str::slug($request->get('nameCategory'), '_');             
                $category->save();

                DB::commit();

                $resp->descripcion = 'La categoria ha sido actualizado satisfactoriamente';
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

           

                $category = Category::find($id);
                if (!$category == null) {

                    if ($category->edo == true) {
                        $category->edo = false;
                        $resp->descripcion = 'La categoria ha sido bloqueado';
                    } else {
                        $category->edo = true;
                        $resp->descripcion = 'La categoria ha sido activado';
                    }
                    $category->save();
                    DB::commit();

                    $resp->mensaje = 'OK';
                    $resp->codigo = 200;
                } else {
                    $resp->descripcion = 'No existe la categoria';
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
