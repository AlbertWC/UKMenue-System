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
        $this->middleware('auth', ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendars = Calendar::all();
        $calendar = [];

        foreach($calendars as $row)
        {
            $enddate = $row->end_date." 24:00:00";
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
        $calendar = \Calendar::addEvents($calendar);
        return view('calendars.calendars', compact('calendars', 'calendar'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($venue_id)
    {
        dd($venue_id);
        $venue = Venue::all();
        return view('calendars.addevent')->with('venue', $venue);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$venue_id)
    {
        dd($venue_id);
        // $this->validate($request, [
        //     'title' => 'required',
        //     'color' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',

        // ]);

        // $calendar = new Calendar;
        // $calendar->venue_id = $venue_id;
        // dd($venue_id);
        // $calendar->user_id = auth()->user()->id;
        // $calendar->title = $request->input('title');
        // $calendar->color = $request->input('color');
        // $calendar->start_date = $request->input('start_date');
        // $calendar->end_date = $request->input('end_date');
        // $calendar->save();
        //$calendar->create($request->all());

        //return redirect('events')->with('success', 'Event Created');
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'venue_id' => 'required',
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $calendar = Calendar::find($id);

        $calendar->update($request->all());
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
}
