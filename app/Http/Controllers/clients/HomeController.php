<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clients\Home;

class HomeController extends Controller
{
    private $hometours;

    public function __construct()
    {
        parent::__construct();
        $this->hometours = new Home();
    }

    public function index()
    {
        $title = 'Trang chủ';
        return view('clients.home', compact('title'));
    }
}
