<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\DashboardModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private $dashboard;

    public function __construct()
    {
        $this->dashboard = new DashboardModel();
    }
    public function index()
    {
        $title = 'Admin';
        $summary = $this->dashboard->getSummary();
        // Đã xóa toàn bộ biến liên quan đến tour/booking/revenue
        return view('admin.dashboard', compact('title', 'summary'));
    }


}
