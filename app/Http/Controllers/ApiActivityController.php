<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiActivityController extends Controller
{
    public function index()
    {
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil mengambil data';
        $data['activities'] = Activity::where('user_id', Auth::guard('api')->user()->id)->orderByDesc('created_at')->get();

        return response()->json($data);
    }
}
