<?php

namespace App\Http\Controllers\Sicenet\Configuration;

use Alert;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Image;
use JavaScript;
use Session;
use App\Http\Controllers\Controller;
use App\ModelsView\ResponseModelView;
use App\Models\User;
use App\Models\Trabajador;
use App\Models\Estudio;
use App\Models\Genero;
use App\Models\Delegacion;
use App\Models\Contrato;
use App\Models\Adscripcion;
use App\Models\Categoria;
use Ultraware\Roles\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:instructor');
    }

    public function index()
    {
        if (Auth::user()->hasPermission('users')) {
            return view('configuration.users.index');
        } else {
            Alert::error('al modulo de usuarios', 'Acceso denegado');
            return redirect()->route('inicio');
        }
    }

    public function instructores()
    {
        $query = User::query();
        $query->where('usu_cencve', Auth::guard('instructor')->user()->usu_cencve);
        $_instructores = $query->get();
        return view('sicenet.configuration.users.instructores')->with('instructores', $_instructores);
    }

    public function create()
    {
        if (Auth::user()->hasPermission('users.store')) {

            JavaScript::put([
                'rol' => null,
                'idCustomer' => null,
                'idCompany' => Session::get('sessionModel')->idCompany,
            ]);
            $companies = Company::orderBy('businessName', 'ASC')->where('status', '>', 0)->pluck('businessName', 'idCompany');
            $accounts = CustomerCompany::orderBy('businessName', 'ASC')->where('status', '>', 0)->pluck('businessName', 'idCCompany');

            return view('configuration.users.create')
                ->with('companies', $companies)->with('myCompanies', Session::get('sessionModel')->idCompany)
                ->with('accounts', $accounts)->with('myAccounts', null);
        } else {
            Alert::error('al modulo de usuarios', 'Acceso denegado');
            return redirect()->route('inicio');
        }
    }
    public function show($id)
    {

        $resp = new ResponseModelView;
        try {

            $user = DB::table('users')->where('id', $id)->first();
            if (!$user == null) {
                $resp->data = $user;
                $resp->descripcion = 'Detalles del usuario';
                $resp->mensaje = 'OK';
                $resp->codigo = 200;
            } else {
                $resp->descripcion = 'No existe el usuario';
                $resp->mensaje = '';
                $resp->codigo = 401;
            }
        } catch (\Exception $e) {
            $resp->error = $e->getMessage();
            $resp->menesaje = 'BAD REQUEST';
            $resp->codigo = 400;
        }

        return response()->json($resp);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $resp = new ResponseModelView;
        try {
            if (Auth::user()->hasPermission('users.store')) {
                $emailExist = User::where('email', $request->email)->first();
                if ($emailExist == null) {
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = bcrypt('secret');
                    $user->photo = '/store/image/photos/avatar.jpg';
                    $user->edo = true;
                    $user->typeUser = $request->typeUser;
                    $user->role_id = $request->role_id;
                    $user->save();

                    $role = Role::find($request->role_id);
                    $user->attachRole($role);

                    $user->accounts()->sync($request->accounts);

                    $user->companies()->sync($request->companies);

                    DB::commit();
                    $resp->descripcion = "El usuario ha sido creado satisfactoriamente";
                    $resp->menesaje = 'ok';
                    $resp->codigo = 200;
                    $resp->url = '/users/index';
                } else {
                    $resp->descripcion = 'El email ya existe como usuario';
                    $resp->menesaje = 'UNAUTHORIZED';
                    $resp->codigo = 402;
                }
            } else {
                $resp->descripcion = 'No tiene los permisos necesarios';
                $resp->menesaje = 'UNAUTHORIZED';
                $resp->codigo = 401;
            }
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

            if (Auth::user()->hasPermission('users.destroy')) {

                $use = User::find($id);
                if (!$use == null) {

                    if ($use->edo == true) {
                        $use->edo = false;
                        $resp->descripcion = 'El usuario ha sido bloqueado';
                    } else {
                        $use->edo = true;
                        $resp->descripcion = 'El usuario ha sido activado';
                    }
                    $use->save();
                    DB::commit();

                    $resp->mensaje = 'OK';
                    $resp->codigo = 200;
                } else {
                    $resp->descripcion = 'No existe el usuario';
                    $resp->mensaje = '';
                    $resp->codigo = 401;
                }
            } else {
                $resp->descripcion = 'No tiene los permisos necesarios';
                $resp->mensaje = 'UNAUTHORIZED';
                $resp->codigo = 401;
            }
        } catch (\Exception $e) {
            DB::rollback();
            $resp->error = $e->getMessage();
            $resp->codigo = 400;
        }

        return response()->json($resp);
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
        ]);

        DB::beginTransaction();
        $resp = new ResponseModelView;
        $resp->error = "";
        try {

            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->password);
            $user->save();
            DB::commit();

            $resp->mensaje = "La contraseña ha sido actualizada satisfactoriamente";
            //$resp->mensaje = 'OK';
            $resp->codigo = 200;
        } catch (\Exception $e) {
            DB::rollback();
            $resp->error = $e->getMessage();
            $resp->codigo = 400;
        }
        return response()->json($resp);
    }

    public function upload(Request $request)
    {

        $resp = new ResponseModelView;

        try {
            $data = json_decode($request->inputData, true);
            $filePho = $request->file('inputImage');

            if ($filePho != null) {
                $nombrePho = Auth::user()->id . '-' . Auth::user()->clave . '.' . $filePho->getClientOriginalExtension();
                $path = 'store/image/photos/' . $nombrePho;
                Image::make($filePho->getRealPath())->crop(
                    intval($data['height']),
                    intval($data['width']),
                    intval($data['x']),
                    intval($data['y'])
                )->save($path);

                $use = User::find(Auth::user()->id);
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

    public function miimagen()
    {

        $user = User::find(Auth::user()->id);
        return view('configuration.users.imagen')->with('user', $user);
    }

    public function miperfil()
    {
        $generos = Genero::orderBy('gen_descor', 'ASC')->where('gen_activo', true)->pluck('gen_descripcion', 'gen_cve');
        $estudios = Estudio::orderBy('graest_descripcion', 'ASC')->where('graest_activo', true)->pluck('graest_descripcion', 'graest_cve');
        $delegaciones = Delegacion::orderBy('del_descripcion', 'ASC')->where('del_activo', true)->pluck('del_descripcion', 'del_cve');
        $contratos = Contrato::orderBy('tipcon_descripcion', 'ASC')->where('tipcon_activo', true)->pluck('tipcon_descripcion', 'tipcon_cve');

        $categorias = Categoria::orderBy('cat_descripcion', 'ASC')->where('cat_activo', true)->pluck('cat_descripcion', 'cat_cve');
        $adscripciones = Adscripcion::orderBy('ads_descripcion', 'ASC')->where('ads_activo', true)->pluck('ads_descripcion', 'ads_cve');


        $user = User::find(Auth::user()->id);
        return view('configuration.users.perfil')->with('user', $user)->with('generos', $generos)
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
            $user = User::find($id);
            $user->movil = $request->movil;
            $user->phone = $request->phone;
            $user->save();

            $data = Trabajador::find($user->tra_cve);
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
            $resp->url = "/configuration/user/perfil";


            $resp->codigo = 200;
        } catch (\Exception $e) {
            DB::rollback();
            $resp->error = $e->getMessage();
            $resp->codigo = 500;
        }
        return response()->json($resp);
    }

    public function permission($id)
    {
        try {
            if (Auth::user()->hasPermission('users.update')) {
                $user = User::find($id);

                JavaScript::put(['id' => $user->id]);

                return view('configuration.users.permission', [
                    'user' => $user,
                ]);
            } else {
                Alert::error('al modulo de editar empresas', 'Acceso denegado');
                return redirect()->route('users.index');
            }
        } catch (\Exception $e) {
            Toastr::error($e->getMessage(), "Error", $options = []);
            return redirect()->route('users.index');
        }
    }
}
