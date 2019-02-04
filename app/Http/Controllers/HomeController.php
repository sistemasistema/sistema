<?php

namespace App\Http\Controllers;


use Config;
use Session;
use App;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function setLanguage($language)
    {
        App::setLocale($language);

        return redirect()->back();
    }
}
