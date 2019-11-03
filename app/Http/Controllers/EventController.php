<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Venue;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $event = Event::all();
        //$venue = Venue::find();
        $venue = Venue::all();
        // $venueid = $event['venue_id'];
        // $venue = Venue::find($venue_id);
        // $venuename = $venue->venue_name;
        return view('events.index')->with('event', $event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'eventname' => 'required',
            'eventdescription' => 'required',
            'eventorganizer' => 'required',
            'venue_id'=> 'required'

        ]);
        //test
        $event = new Event();
        // $event->eventname = $request->input('title');
        // $event->eventdescription = $request->input('body');
        // $event->eventorganizer = $request->input('applicant');
        // $event->venue_id = $request->input('venue');
        // $event->save();

        $event->create($request->all());
    

        return redirect('/events')->with('success', 'Event Created');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
               
        return view('events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $event = Event::find($id);
       return view('events.edit')->with('event', $event);
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
            'eventname' => 'required',
            'eventdescription' => 'required',
            'eventorganizer' => 'required',
            'venue_id'=> 'required'

        ]);

        $event = Event::find($id);
        
        // $event->eventname = $request->input('eventname');
        // $event->eventdescription = $request->input('eventdescription');
        // $event->eventorganizer = $request->input('eventorganizer');
        // $event->venue_id = $request->input('venue_id');
        // $event->save();
        $event->update($request->all());
        return redirect('/events')->with('success', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('/events')->with('danger', 'Event Removed');
    }
}
