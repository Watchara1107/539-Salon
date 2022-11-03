<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Expenses;
use App\Models\Incom;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Month;

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
        $in = Incom::whereMonth('created_at', Carbon::today());
        $ex = Expenses::whereMonth('created_at', Carbon::today());
        return view('home',compact('in','ex'))
        ->with("book",Booking::all())
        ->with("incom",Incom::all())
        ->with("expenses",Expenses::all())
        ->with("profile",Profile::all());
    }
}
