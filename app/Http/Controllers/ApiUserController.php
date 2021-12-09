<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    public function index()
    {
        $data['users'] = User::where('app', 'mobile')->orderBy('nama')->where('id', '!=', Auth::guard('api')->user()->id)->get();
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil mengambil data';

        return response()->json($data);
    }

    public function updateProfil(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        if ($user == null)
        {
            $data['status_code'] = 400;
            $data['message'] = 'User tidak ditemukan';

            return response()->json($data);
        }
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil memperbarui data';
        $user->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);

        return response()->json($data);
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::guard('api')->user()->id);
        if ($user == null)
        {
            $data['status_code'] = 400;
            $data['message'] = 'User tidak ditemukan';

            return response()->json($data);
        }
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil memperbarui data';
        $user->update([
            'password' => $request->password != null ? bcrypt($request->password) : $user->password,
        ]);

        return response()->json($data);
    }
}
