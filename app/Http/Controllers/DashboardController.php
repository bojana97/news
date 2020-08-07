<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $user_id = Auth()->user()->id;

        $user = User::find($user_id);

        $userPages = $user->pages()->orderBy('page.created_at', 'desc')->get();

        return view('dashboard',  ['userPages' => $userPages]);

    }
}
