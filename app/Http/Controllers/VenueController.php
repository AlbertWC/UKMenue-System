<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
Use DB;
use Illuminate\Support\Facades\Auth;
use App\Calendar;
use Illuminate\Support\Facades\Session;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:web',['only'=> 'index']);
        $this->middleware('auth:admin',['only' => ['adminindex','store','update','create','destroy','edit']]);
    }

    public function index()
    {
        $venue = Venue::get();
        // // display in order
        // $venue = Venue::orderBy('venue_name', 'desc');
        // $venue = Venue::orderBy('created_at', 'desc')->paginate(10);
        $venue = Venue::orderBy('created_at' , 'desc')->paginate(4);
        return view('venues.index')->with('venue', $venue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        

        //Create Venue
        $venue = new Venue();
        $venue->venue_name = $request->input('title');
        $venue->venue_description = $request->input('body');
        $venue->user_id = auth()->user()->id;
        $venue->save();
        return redirect('/admin/venues')->with('success', 'Venue created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $venue_id
     * @return \Illuminate\Http\Response
     */
    public function show($venue_id, Request $request)
    {
        $venue = Venue::find($venue_id);
        $venueid = $request->session()->put('venueid', $venue_id);
        
        //test calendar
        $calendars = Calendar::where(['approval' => '1' , 'venue_id' => $venue_id])->get();
        $calendar = [];

        foreach($calendars as $row)
        {
            //$enddate = $row->end_date." 20:00:00";
            $calendar[] = \Calendar::event(
                $row->title,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }
        //$calendar = Calendar::get('venue_id' , '=' , $request->session()->get('venueid'));

        
        $calendar = \Calendar::addEvents($calendar);
        // return view('calendars.calendars', compact('calendars', 'calendar'));
        

        // print_r($request->session()->get('venueid'));
        return view('venues.show',compact('calendars','calendar'))->with('venue', $venue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $venue_id
     * @return \Illuminate\Http\Response
     */
    public function edit($venue_id)
    {
        $venue = Venue::find($venue_id);
        return view('venues.edit')->with('venue',$venue);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $venue_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $venue_id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        //Create Venue
        $venue = Venue::find($venue_id);
        $venue->venue_name = $request->input('title');
        $venue->venue_description = $request->input('body');
        $venue->save();

        return redirect('/admin/venues')->with('success', 'Venue updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $venue_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($venue_id)
    {
        $venue = Venue::find($venue_id);
        $venue->delete();
        return redirect('/admin/venues')->with('danger', 'Venue Removed');
    }


    //Admin session venues list
    public function adminindex()
    {
        $venue = Venue::orderBy('created_at' , 'desc')->paginate(4);
        return view('venues.index')->with('venue', $venue);
    }

    //Admin session view particular venue 
    public function adminshow($venue_id,Request $request)
    {
        $venue = Venue::find($venue_id);
        $venueid = $request->session()->put('venueid', $venue_id);
        
        //test calendar
        $calendars = Calendar::where(['approval' => '1' , 'venue_id' => $venue_id])->get();
        $calendar = [];

        foreach($calendars as $row)
        {
            //$enddate = $row->end_date." 20:00:00";
            $calendar[] = \Calendar::event(
                $row->title,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }
        //$calendar = Calendar::get('venue_id' , '=' , $request->session()->get('venueid'));

        
        $calendar = \Calendar::addEvents($calendar);
        // return view('calendars.calendars', compact('calendars', 'calendar'));
        

        // print_r($request->session()->get('venueid'));
        return view('venues.adminshow',compact('calendars','calendar'))->with('venue', $venue);
    }
}
