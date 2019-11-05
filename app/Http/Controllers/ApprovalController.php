<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class ApprovalController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
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
        if ($calendar->approval == false)
        {
            $calendar->approval = true;
            $calendar->update();
        }
        return redirect('calendars/approval')->with('success', 'Event Approved');
    }
}
