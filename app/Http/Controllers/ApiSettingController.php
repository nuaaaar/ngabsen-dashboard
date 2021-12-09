<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class ApiSettingController extends Controller
{
    public function index()
    {
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil mengambil data';
        $data['setting'] = Setting::first();

        return response()->json($data);
    }
}
