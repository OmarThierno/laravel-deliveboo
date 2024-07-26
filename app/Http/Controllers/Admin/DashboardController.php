<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];

        return view('admin.dashboard', compact('data'));
    }
}
