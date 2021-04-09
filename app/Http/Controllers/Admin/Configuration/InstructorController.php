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


class InstructorController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:instructor');
	}

	public function index()
	{

		return view('configuration.users.instructores');
	}
}
