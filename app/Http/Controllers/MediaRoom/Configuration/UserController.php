<?php

namespace App\Http\Controllers\SicenetEnLinea\Configuration;

use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;
use App\ModelsView\ResponseModelView;
use App\Models\Adscripcion;
use App\Models\Categoria;
use App\Models\Contrato;
use App\Models\Delegacion;
use App\Models\Estudio;
use App\Models\Genero;
use App\Models\Trabajador;
use App\Models\UserDis;
use JavaScript;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function password()
    {

        $user = UserDis::find(Auth::user()->usudis_cve);
        return view('sicenet_enlinea.configuration.users.password')->with('user', $user);
    }

    public function passwordupdate(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);

        DB::beginTransaction();
        $resp = new ResponseModelView;
        try {

            $user = UserDis::find(Auth::user()->usudis_cve);
            $user->password = bcrypt($request->password);
            $user->save();

            DB::commit();

            $resp->mensaje = "La contraseña ha sido actualizada satisfactoriamente";
            $resp->codigo = 200;
        } catch (\Exception $e) {
            DB::rollback();
            $resp->error = $e->getMessage();
            $resp->codigo = 400;
        }
        return response()->json($resp);
    }

    public function miimagen()
    {

        $user = UserDis::find(Auth::user()->usudis_cve);
        return view('sicenet_enlinea.configuration.users.imagen')->with('user', $user);
    }


    public function upload(Request $request)
    {

        $resp = new ResponseModelView;

        try {
            $data = json_decode($request->inputData, true);
            $filePho = $request->file('inputImage');

            if ($filePho != null) {
                $nombrePho = Auth::user()->usudis_cve . '.' . $filePho->getClientOriginalExtension();
                $path = 'store/image/photos/' . $nombrePho;
                Image::make($filePho->getRealPath())->crop(
                    intval($data['height']),
                    intval($data['width']),
                    intval($data['x']),
                    intval($data['y'])
                )->save($path);

                $use = UserDis::find(Auth::user()->usudis_cve);
                $use->photo = $path;
                $use->save();

                $resp->mensaje = "La imagen ha sido actualizada satisfactoriamente";
                //    $resp->mensaje = 'OK';
                $resp->codigo = 200;
            } else {
                $resp->error = "Debe seleccionar una imagen";
                $resp->codigo = 401;
            }
        } catch (\Exception $e) {
            $resp->error = $e->getMessage();
            $resp->codigo = 400;
        }

        return response()->json($resp);
    }


    public function miperfil()
    {
        $generos = Genero::orderBy('gen_descor', 'ASC')->where('gen_activo', true)->pluck('gen_descripcion', 'gen_cve');
        $estudios = Estudio::orderBy('graest_descripcion', 'ASC')->where('graest_activo', true)->pluck('graest_descripcion', 'graest_cve');
        $delegaciones = Delegacion::orderBy('del_descripcion', 'ASC')->where('del_activo', true)->pluck('del_descripcion', 'del_cve');
        $contratos = Contrato::orderBy('tipcon_descripcion', 'ASC')->where('tipcon_activo', true)->pluck('tipcon_descripcion', 'tipcon_cve');

        $categorias = Categoria::orderBy('cat_descripcion', 'ASC')->where('cat_activo', true)->pluck('cat_descripcion', 'cat_cve');
        $adscripciones = Adscripcion::orderBy('ads_descripcion', 'ASC')->where('ads_activo', true)->pluck('ads_descripcion', 'ads_cve');

        $user = UserDis::find(Auth::user()->usudis_cve);


        JavaScript::put([
            'path' => env('APP_URL'),
        ]);

        return view('sicenet_enlinea.configuration.perfil')->with('user', $user)->with('generos', $generos)
            ->with('estudios', $estudios)
            ->with('delegaciones', $delegaciones)
            ->with('contratos', $contratos)
            ->with('categorias', $categorias)
            ->with('adscripciones', $adscripciones);
    }

    public function updateperfil(Request $request, $id)
    {

        DB::beginTransaction();

        $resp = new ResponseModelView;
        try {
            $user = UserDis::find($id);
            $user->usudis_wa = $request->usudis_wa;
            $user->usudis_telofi = $request->usudis_telofi;
            $user->usudis_coralt = $request->usudis_coralt;
            $user->save();

            $data = Trabajador::find($user->usudis_cve);
            $data->tra_nombre = $request->tra_nombre;
            $data->tra_apepat = $request->tra_apepat;
            $data->tra_apemat = $request->tra_apemat;
            $data->tra_rfc = $request->tra_rfc;
            $data->tra_curp = $request->tra_curp;
            $data->tra_gencve = $request->tra_gencve;
            $data->tra_graestcve = $request->tra_graestcve;
            $data->tra_delcve = $request->tra_delcve;
            $data->tra_tipcon = $request->tra_tipcon;
            $data->tra_catcve = $request->tra_catcve;
            $data->tra_adscve = $request->tra_adscve;
            $data->tra_antanios = $request->tra_antanios;
            $data->tra_antqnas = $request->tra_antqnas;
            $data->save();

            DB::commit();

            $resp->mensaje = "El perfil ha sido actualizadao satisfactoriamente";
            $resp->url = route('sicenet_enlinea.miperfil'); //env('APP_UR') . "/sicenet_enlinea/configuration/user/perfil";
            $resp->codigo = 200;
        } catch (\Exception $e) {
            DB::rollback();
            $resp->error = $e->getMessage();
            $resp->codigo = 500;
        }
        return response()->json($resp);
    }
}
