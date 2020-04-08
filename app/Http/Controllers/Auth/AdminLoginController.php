<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin_cidade');
    }


    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $authOK = Auth::guard('admin_cidade')->attempt($credentials, $request->remember);
        if($authOK) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInputs($request->only('email', 'remember'));

    }

    public function index() {
        return view('auth.loginAdmin');
    }
}
