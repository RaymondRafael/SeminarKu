<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {
        $events = collect();
        return view('index', compact('events'));
    }
}