<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['status_code'] = 200;
        $data['message'] = 'Berhasil mengambil data';

        $userId = null;
        if (isset($_GET['user_id']))
        {
            $userId = $_GET['user_id'];
        }

        if ($userId != null)
        {
            $data['attendances'] = Attendance::with('user')->where('user_id', $userId)->orderByDesc('created_at')->get();
        }else{
            $data['attendances'] = Attendance::with('user')->orderByDesc('created_at')->get();
        }

        return view('dashboard.attendance.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['attendance'] = Attendance::with('user')->where('id', $id)->first();
        if ($data['attendance'] == null) {
            return abort(404);
        }
        $data['activity'] = Activity::whereDate('created_at', $data['attendance']->date)->first();

        return view('dashboard.attendance.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();

        return redirect()->back()->with('OK', 'Data berhasil dihapus.');
    }
}
