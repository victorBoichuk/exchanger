<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user  = new User();
        $isAdmin = $user->isAdmin(auth()->user());
        $y = '';
        if ($isAdmin) $y = 'Пользователь является админом';
        return view('home')->with('isAdmin', $y);
    }

}
