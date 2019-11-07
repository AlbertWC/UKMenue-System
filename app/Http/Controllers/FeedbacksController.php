<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Feedback;
use DB;

class FeedbacksController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest:web', ['only' => 'admindisplay']);
       $this->middleware('guest:admin', ['except' => ['admindisplay','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::where(['user_id' => auth()->user()->id])->orderBy('created_at','desc')->paginate(5);
        //$feedback =  Feedback::orderBy('created_at', 'desc')->paginate(10);
        return view('feedbacks.index')->with('feedback', $feedback);


      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedbacks.create');
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'comment' => 'required'
        ]);
        
        //create feedback
        $feedback = new Feedback;
        $feedback->firstname = $request->input('firstname');
        $feedback->lastname = $request->input('lastname');
        $feedback->email = $request->input('email');
        $feedback->contact = $request->input('contact');
        $feedback->comment = $request->input('comment');
        $feedback->user_id = auth()->user()->id;
        $feedback->save();

        return redirect('/feedbacks')->with('success', 'Feedback Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedback::find($id);
        return view('feedbacks.show')->with('feedback', $feedback);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::find($id);
        return view('feedbacks.edit')->with('feedback', $feedback);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'comment' => 'required'
        ]);
        
        //create feedback
        $feedback = Feedback::find($id);
        $feedback->firstname = $request->input('firstname');
        $feedback->lastname = $request->input('lastname');
        $feedback->email = $request->input('email');
        $feedback->contact = $request->input('contact');
        $feedback->comment = $request->input('comment');
        $feedback->save();

        return redirect('/feedbacks')->with('success', 'Feedback Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();
        return redirect('/feedbacks')->with('success', 'Feedback Deleted');
    }

    public function admindisplay()
    {
        $feedback =  Feedback::orderBy('created_at', 'desc')->paginate(10);
        return view('feedbacks.index')->with('feedback', $feedback);
    }
}
