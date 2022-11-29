<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Expenses;
use App\Models\Incom;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        // $incom1 = DB::table('incoms')
        //         ->select('salon_id', DB::raw('SUM(price)'))
        //         ->groupBy('salon_id')
        //         ->get();
        
        $in = Incom::whereMonth('created_at', Carbon::today());
        $in1 = Incom::whereMonth('created_at',"10-2022")->get();
        $in2 = Incom::whereMonth('created_at',"11-2022")->get();
        $in3 = Incom::whereMonth('created_at',"12-2022")->get();
        $ser = Service::whereMonth('created_at', Carbon::today());
        $ex = Expenses::whereMonth('created_at', Carbon::today());
        return view('home',compact('in','ex','ser','in1','in2','in3'))
        ->with("book",Booking::all())
        // ->with("incomsalon",Incom::distinct()->get('salon_id'))
        ->with("expenses",Expenses::all())
        ->with("incoms",Incom::all())
        ->with("services",Service::all())
        ->with("profile",Profile::all());
    }
}
