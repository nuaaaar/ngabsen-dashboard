<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['username', 'password']);

        if (! $token = Auth::guard('api')->attempt($credentials))
        {
            $data['status'] = 'ERR';
            $data['status_code'] = 401;
            $data['message'] = 'Username atau password salah';

            return response()->json($data);
        }
        $user = User::with('today_check_in', 'today_check_out')->where('id', Auth::guard('api')->user()->id)->first();
        if ($user->app == 'dashboard')
        {
            $data['status'] = 'ERR';
            $data['status_code'] = 404;
            $data['message'] = 'User tidak terdaftar sebagai karyawan';
            $this->logout();
            return response()->json($data);
        }
        $data['status'] = 'OK';
        $data['user'] = $user;
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil login';
        $data['user_token'] = $token;

        return response()->json($data);
    }

    public function loginAlternative(Request $request)
    {
        $user = User::with('today_check_in', 'today_check_out')->where('id', $request->id)->first();
        if ($user != null) {
            $token = Auth::guard('api')->login($user);
            $data['user_token'] = $token;
            $data['user'] = $user;
            $data['status_code'] = 200;
            $data['message'] = 'Berhasil login';
        }else{
            $data['status'] = 'ERR';
            $data['status_code'] = 404;
            $data['message'] = 'User tidak terdaftar sebagai karyawan';
        }
        return response()->json($data);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil mengambil data';
        $data['user'] = User::with('today_check_in', 'today_check_out')->where('id', Auth::guard('api')->user()->id)->first();

        return response()->json($data);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
