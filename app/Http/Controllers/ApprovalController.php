<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class ApprovalController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }
    public function approval()
    {
        $calendar = Calendar::get();
        return view('calendars.approval')->with('calendar',$calendar);
    }
    public function updateevent(Request $request)
    {
        $id = $request->input('id');

        $calendar = Calendar::find($id);

        if ($request->input('approvebtn') == "approve" && $calendar->approval == false)
        {
            $calendar->approval = true;
            $calendar->update();
            return redirect('calendars/approval')->with('success', 'Event Approved');
        }
        elseif ($request->input('declinebtn') == "decline" && $calendar->decline == false)
        {
            $this->validate($request, [
                'declinemessage' => 'required|min:12'
            ]);
            $calendar->decline = true;
            $calendar->declinemessage = $request->input('declinemessage');
            $calendar->update();
            return redirect('calendars/approval')->with('success', 'Event Declined');
        }
        
        
    }
    // public function declineevent(Request $request)
    // {
    //     $id = $request->input('id');

    //     $calendar = Calendar::find($id);

    //     if($calendar->decline == false)
    //     {
    //         $calendar->decline = true;
    //         $calendar->declinemessage = $request->input('declinemessage');
    //         $calendar->update();
    //     }
    // }
}
