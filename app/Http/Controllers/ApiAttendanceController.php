<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Attendance;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAttendanceController extends Controller
{
    public function index()
    {
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil mengambil data';
        $data['attendances'] = Attendance::where('user_id', Auth::guard('api')->user()->id)->orderByDesc('date')->get()->groupBy('date')->toArray();

        return response()->json($data);
    }

    public function checkIn(Request $request)
    {
        if (Auth::guard('api')->user()->today_check_in != null) {
            $data['status_code'] = 409;
            $data['message'] = 'Sudah melakukan check in hari ini';

            return response()->json($data);
        }
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil melakukan check in';
        $imagePath = '/app-assets/images/logo/logo-ngabsen.png';
        if ($request->hasFile('image'))
        {
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $imagePath = '/storage/' . $request->file('image')->storeAs('selfies', $fileName, 'public');
        }
        $setting = Setting::first();
        $now = strtotime(date('Y-m-d H:i:s'));
        $deadline = strtotime(date('Y-m-d H:i:s', strtotime(date('Y-m-d ') . $setting->check_in_end)));
        $isLate = 0;
        if ($now > $deadline) {
            $isLate = 1;
        }
        Attendance::create([
            'user_id' => Auth::guard('api')->user()->id,
            'status' => 'check in',
            'image' => $imagePath,
            'date' => date('Y-m-d'),
            'is_late' => $isLate
        ]);

        return response()->json($data);
    }

    public function checkOut(Request $request)
    {
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil melakukan check out';
        $imagePath = '/app-assets/images/logo/logo-ngabsen.png';
        if ($request->hasFile('image'))
        {
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $imagePath = '/storage/' . $request->file('image')->storeAs('selfies', $fileName, 'public');
        }
        Attendance::create([
            'user_id' => Auth::guard('api')->user()->id,
            'status' => 'check out',
            'image' => $imagePath,
            'date' => date('Y-m-d')
        ]);
        Activity::create([
            'user_id' => Auth::guard('api')->user()->id,
            'descriptions' => $request->descriptions
        ]);

        return response()->json($data);
    }
}
