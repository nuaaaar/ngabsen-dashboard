<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data['users'] = User::count();

        return view('dashboard.index', $data);
    }
}
