<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $title = 'Transport';
        return view('clients.transport', compact('title'));
    }
} 