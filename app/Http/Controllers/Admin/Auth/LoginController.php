<?php

namespace App\Http\Controllers\Sicenet\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    protected $guard = 'admin';

    public function __construct()
    {
        //$this->middleware('auth:admins')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function username()
    {
        return 'usu_email';
    }

    public function login(Request $request)
    {

        $this->validator($request);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), false)) {

            return redirect()->route('main.admin');
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email' => 'required|email|exists:e_usuario|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'Estas credenciales no coinciden con nuestros registros.',
        ];

        //validate the request.
        $request->validate($rules, $messages);
    }

    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', '¡Acceso fallido. Por favor intente nuevamente!');
    }

    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login');
    }

    protected function guard()
    {
        return Auth::guard($this->guard);
    }
}
