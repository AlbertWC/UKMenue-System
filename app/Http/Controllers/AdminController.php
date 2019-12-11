<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use App\Venue;
use App\Feedback;
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
        $haventapprove = Calendar::where('approval','=','0')->where('decline','=','0')->get();
        $todayapply = Calendar::get();
        $venue = Venue::get();
        $venuecounterlist = [];

        // foreach($venue as $venuelist)
        // {
        //     $venuecounter = 0;
        //     foreach($todayapply as $today)
        //     {
        //         if($today->created_at->format('Y-m-d') == date('Y-m-d'))
        //         {
        //             $counter += 1;
        //         }
        //         if($today->venue_id == $venuelist->venue_id && $today->created_at->format('Y-m-d') == date('Y-m-d'))
        //         {
        //             $venuecounter+= 1;
        //         }
        //         $venuecounterlist = [$venuelist->id, $venuecounter];
        //     }
        // }
        $maxevent = 0;
        $feedback = Feedback::get();
        $totalevent = Calendar::get('id')->max();    
        if($totalevent == null)
        {
            $maxevent = 0;
        }
        else
        {
            $maxevent = $totalevent->id;
        }
        foreach($todayapply as $today)
        {
            $venuecounter = 0;
            if($today->created_at->format('Y-m-d') == date('Y-m-d'))
            {
                $counter += 1;
            }
            foreach($venue as $venuelist)
            {
                if($today->venue_id == $venuelist->venue_id && $today->created_at->format('Y-m-d') == date('Y-m-d'))
                {
                    $venuecounter+= 1;
                }
            }
            $venuecounterlist = array($venuecounter);
        };
        // dd($maxevent);
        $data = [
            'haventapprove' => $haventapprove,
            'totalevent' => $totalevent,
            'todayapply' => $todayapply,
            'counter' => $counter,
            'venue' => $venue,
            'venuecounter' => $venuecounter,
            'venuecounterlist'=> $venuecounterlist,
            'maxevent' => $maxevent,
        ];
        // dd($venuecounterlist);
        return view('admin')->with($data);
    }
}
