<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data['setting'] = Setting::first();

        return view('dashboard.setting.index', $data);
    }

    public function store(Request $request)
    {
        $setting = Setting::first();
        if ($setting != null)
        {
            $setting->update([
                'check_in_start' => $request->check_in_start,
                'check_in_end' => $request->check_in_end,
                'check_out_start' => $request->check_out_start
            ]);
        }else
        {
            Setting::create([
                'check_in_start' => $request->check_in_start,
                'check_in_end' => $request->check_in_end,
                'check_out_start' => $request->check_out_start
            ]);
        }

        return redirect()->back()->with('OK', 'Data berhasil diperbarui.');
    }
}
