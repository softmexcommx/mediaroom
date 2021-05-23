<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ModelsView\SessionModelView;
use Auth;
use Session;
use Toastr;

class MainController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['admin', 'loadadmin']);

    }

    public function admin()
    {

        if (Auth::guard('admin')->check() == true && Auth::guard('admin')->user()->status == true) {
            \App::setLocale('es');
            session(['locale' => 'es']);
            Session::forget('sessionModel');
            $sm = new SessionModelView;
            $sm->id = Auth::guard('admin')->user()->id;
            Session::put('sessionModel', $sm);
            Toastr::clear();
            Toastr::success(Auth::guard('admin')->user()->name, trans('textos.home.welcome'));
            return redirect()->route('admin.load');
        }
    }

    public function mediaroom()
    {
        if (Auth::guard('web')->check() == true) {
            \App::setLocale('es');
            session(['locale' => 'es']);
            Session::forget('sessionModel');
            $sm = new SessionModelView;
            $sm->id = Auth::guard('web')->user()->id;
            Session::put('sessionModel', $sm);
            Toastr::clear();
            Toastr::success(Auth::guard('web')->user()->name, trans('textos.home.welcome'));
            return redirect()->route('mediaroom.load');
        }
    }

    public function loadmediaroom()
    {

        if (Auth::guard('web')->user()->status == 2) {

            return redirect()->route('mediaroom.home');
        } else {
            Session::flash('error', 'Tu cuenta no ha sido confirmada. <br>Al generar tu registro enviamos un email solicitando la confirmación de tu cuenta, si no lo recibiste haz click aqui');
            return redirect()->route('login');

        }

        return redirect()->route('login');
    }

    public function loadadmin()
    {

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }

        return redirect()->route('admin.login');
    }
}
