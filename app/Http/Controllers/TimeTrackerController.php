<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TimeTracker;

class TimeTrackerController extends Controller
{
    public function delete_single_time_tracker($id){
        $time_tracker = TimeTracker::find($id);

        $time_tracker->isDelete = 1;

        $time_tracker->save();
        if($time_tracker){
            // return response()->json('success',200);
            return redirect()->route('view_all_time_trackers');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function time_tracker_start(Request $request){

        //$date="date(Y-m-d h:i:s)";
        //dd($request->all());
        // dd($request->img[0]);
        $time_start = new TimeTracker;
        $time_start->flag = 'start';
        $time_start->user_id = $request->user_id;
        $time_start->current_time = $request->start_time;
        
        

        $time_start->save();

        if($time_start){
            return redirect()->route('view_all_time_trackers');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
    public function time_tracker_stop(Request $request){

        //$date="date(Y-m-d h:i:s)";
        //dd($request->all());
        // dd($request->img[0]);
        $time_start = new TimeTracker;
        $time_start->flag = 'stop';
        $time_start->user_id = $request->user_id;
        $time_start->current_time = $request->start_time;
        

        $time_start->save();

        if($time_start){
            return redirect()->route('view_all_time_trackers');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }

        
    }
}
