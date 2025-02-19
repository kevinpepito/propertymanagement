<?php

namespace App\Http\Controllers\Top;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index() {
        $users = User::all();
        return view('top.index');
    }
}
