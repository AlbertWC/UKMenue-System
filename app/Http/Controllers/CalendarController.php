<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use App\Venue;
use App\User;

class CalendarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web', ['only'=>['index','show','edit','update','destory','create','store']]);
        $this->middleware('auth:admin',['only' => 'displaycalendar']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$venueid = $request->session()->get('venueid')
        //$calendars = Calendar::get('venue_id','=',$request->session()->get('venueid'));
        $calendars = Calendar::where(['approval' => '1' , 'user_id' => auth()->user()->id])->get();
        $calendar = [];

        foreach($calendars as $row)
        {
            //$enddate = $row->end_date." 24:00:00";
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
       
        return view('calendars.calendars', compact('calendars', 'calendar'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $venue = Venue::all();
        return view('calendars.addevent')->with('venue', $venue);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);
        $venueid = $request->session()->get('venueid');  
        $calendar = new Calendar;
        $calendar->venue_id = $venueid;
        $calendar->user_id = auth()->user()->id;
        $calendar->title = $request->input('title');
        $calendar->color = $request->input('color');
        $calendar->start_date = $request->input('start_date');
        $calendar->end_date = $request->input('end_date');
        $calendar->save();

        return redirect('events')->with('success', 'Event Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $calendar = Calendar::get();
        //dd($calendar);
        return view('calendars.display')->with('calendar', $calendar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calendar = Calendar::find($id);
        return view('calendars.editevent', compact('calendar', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {

        $this->validate($request, [
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $calendar = Calendar::find($id);
        $calendar->title = $request->input('title');
        $calendar->color = $request->input('color');
        $calendar->start_date = $request->input('start_date');
        $calendar->end_date = $request->input('end_date');

        $calendar->save();
        return redirect('events')->with('success', "Event Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendar = Calendar::find($id);
        $calendar->delete();
        return redirect('events')->with('success', "Event Deleted");
    }
    public function displaycalendar(Request $request)
    {
        //$venueid = $request->session()->get('venueid')
        //$calendars = Calendar::get('venue_id','=',$request->session()->get('venueid'));
        $calendars = Calendar::where(['approval' => '1' , 'venue_id' => $request->session()->get('venueid')])->get();
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
       
        return view('calendars.calendars', compact('calendars', 'calendar'));
        
    }

}
