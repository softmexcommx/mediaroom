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

class UserEnLineaController extends Controller
{

	public function __construct()
	{
		//$this->middleware('auth');
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
}
