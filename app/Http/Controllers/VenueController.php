<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
Use DB;
class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }

    public function index()
    {
        $venue = Venue::all();
        // display in order
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

        return redirect('/venues')->with('success', 'Venue created');
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
        // print_r($request->session()->get('venueid'));
        return view('venues.show')->with('venue', $venue)->with('venueid',$request->session()->get('venueid'));
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

        return redirect('/venues')->with('success', 'Venue updated');
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
        return redirect('/venues')->with('danger', 'Venue Removed');
    }
}
