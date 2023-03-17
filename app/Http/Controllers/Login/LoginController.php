<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Hash;
use Auth;
class LoginController extends Controller
{
    /**
     * checkUser: check user exits
     * checkEmail: check email exits
     * dataInsert: insert user into database
     * method GET: return view Form Register
     * method POST: return handle Register
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function handleRegister(RegisterRequest $request)
    {
        try {
            $checkUsername = User::where('username', $request->username)->first();
            $checkEmail = User::where('email', $request->email)->first();
            if ($checkUsername != null || $checkEmail != null) {
                return view('frontend.register')->with('msg', 'Username or email already exists');
            }
            $dataInsert = [
                'name' => $request->fullname,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'isAd' => 0
            ];
            $user = User::create($dataInsert);
            $user = User::find($user->id);
            $user->assignRole('user');
            return redirect()->route('frontend.index');
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    public function formRegister()
    {
        return view('frontend.register');
    }

    /**
     * method POST: return handle Login
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|string
     */
    public function handleLogin(LoginRequest $request)
    {
        try {
            $dataLogin = $request->only('username', 'password');
            $login = Auth::attempt($dataLogin);
            if ($login) {
                if (auth()->user()->isAd == 1) {
                    return redirect()->route('backend.index');
                }
                return redirect()->route('frontend.index');
            }
            return view('backend.login')->with('msg', 'Username or password is incorrect');
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    /**
     * return view form login
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function formLogin()
    {
        return view('backend.login');
    }

    /**
     * Logout
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $isAdmin = auth()->user()->isAd;
        if ($isAdmin == 1) {
            Auth::logout();
            return redirect()->route('backend.login');
        } else {
            Auth::logout();
            return redirect()->route('frontend.index');
        }
    }
}
