<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use Carbon\Carbon;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dt = date("Y-m-d");
        $counter = 0;
        $haventapprove = Calendar::where('approval','=','0')->get();
        $todayapply = Calendar::get();
        foreach($todayapply as $today)
        {
            if($today->created_at->format('Y-m-d') == date('Y-m-d'))
            {
                $counter += 1;
            };
        };
        $totalevent = Calendar::get('id')->max();
        $data = [
            'haventapprove' => $haventapprove,
            'totalevent' => $totalevent,
            'counter' => $counter
        ];
        return view('admin')->with($data);
    }
}
