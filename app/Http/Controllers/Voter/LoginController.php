<?php

namespace App\Http\Controllers\Voter;

use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //use AuthenticatesUsers;

    /**
     * Where to redirect voters after login.
     *
     * @var string
     */
    protected $redirectTo = '/voter';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:voter')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('voter.auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::guard('voter')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->get('remember'))) {
            return redirect()->intended(route('voter.dashboard'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout(Request $request)
    {
        Auth::guard('voter')->logout();
        $request->session()->invalidate();
        return redirect()->route('voter.login');
    }
}
