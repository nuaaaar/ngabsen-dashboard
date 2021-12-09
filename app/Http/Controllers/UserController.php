<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data['admins'] = User::where('app', 'dashboard')->orderBy('nama')->get();
        $data['karyawans'] = User::where('app', 'mobile')->orderBy('nama')->get();

        return view('dashboard.user.index', $data);
    }

    public function create()
    {
        if(!isset($_GET['app']))
        {
            return abort(404);
        }else{
            if ($_GET['app'] != 'dashboard' && $_GET['app'] != 'mobile')
            {
                return abort(404);
            }
        }
        if ($_GET['app'] == 'dashboard')
        {
            $data['role'] = 'Admin';
        }else
        {
            $data['role'] = 'Karyawan';
        }
        return view('dashboard.user.create', $data);
    }

    public function store(Request $request)
    {
        if ($request->app != 'dashboard' && $request->app != 'mobile')
        {
            return abort(400);
        }
        $user = User::where('username', $request->username)->first();
        if ($user != null)
        {
            return redirect()->back()->with('ERR', 'Username sudah digunakan di akun lain.');
        }
        $fotoDiriPath = '/app-assets/images/logo/logo-ngabsen.png';
        if ($request->hasFile('foto_diri'))
        {
            $fileName = time().'_'.$request->file('foto_diri')->getClientOriginalName();
            $fotoDiriPath = '/storage/' . $request->file('foto_diri')->storeAs('foto_diris', $fileName, 'public');
        }
        User::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'app' => $request->app,
            'foto_diri' => $fotoDiriPath
        ]);

        return redirect()->back()->with('OK', 'Data berhasil ditambah.');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        if ($data['user']->app == 'dashboard')
        {
            $data['role'] = 'Admin';
        }else
        {
            $data['role'] = 'Karyawan';
        }
        if (Auth::user()->id == $data['user']->id)
        {
            $data['role'] = 'Profile';
        }

        return view('dashboard.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $usernameExisting = User::where('username', $request->username)->first();
        if ($usernameExisting != null)
        {
            if ($user->id != $usernameExisting->id)
            {
                return redirect()->back()->with('ERR', 'Username sudah digunakan di akun lain.');
            }
        }
        $fotoDiriPath = $user->foto_diri;
        if ($request->hasFile('foto_diri'))
        {
            $fileName = time().'_'.$request->file('foto_diri')->getClientOriginalName();
            $fotoDiriPath = '/storage/' . $request->file('foto_diri')->storeAs('foto_diris', $fileName, 'public');
        }
        if (isset($request->delete_thumbnail))
        {
            if ($request->delete_thumbnail == 1)
            {
                $fotoDiriPath = '/app-assets/images/logo/logo.png';
            }
        }
        $user->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => $request->password != null ? bcrypt($request->password) : $user->password,
            'foto_diri' => $fotoDiriPath
        ]);

        return redirect()->back()->with('OK', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus.');
    }
}
