<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use App\Models\TimeTracker;
use App\Models\Task;
use App\Models\Todolist;

class DashboardController extends Controller
{
    public function index(){
        // $DATA = 'Hello World';
        // return view('demo')->with('data',$DATA);

        $users = User::all();
        
        return view('main_page')->with('users',$users);
        // return view('demo.php');
    }

    public function store_profile_data(Request $request){

        
        //dd($request->all());
        // dd($request->img[0]);
        $profile = new Profile;
        $profile->given_name = $request->given_name;
        $profile->family_name = $request->family_name;
        $profile->dob = $request->dob;
        $profile->job_role = $request->job_role;
        $profile->edu_qualification = $request->education_qualification;
        $profile->skills = $request->skills;
        $profile->present_address = $request->present_address;
        $profile->permanent_address = $request->permanent_address;
        $profile->contact_number = $request->contact_number;
        $profile->contact_number_2 = $request->contact_number_2;
        $profile->working_location = $request->working_location;
        $profile->email = $request->email;
        $profile->user_id = auth()->user()->id;
        // $profile->profile_photo = $request->file('img');

        $validated = $request->validate([
            'given_name' => 'required',
            'family_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
        ]);
        //Remaining attributes
        $profile->save();

        if($profile){
            return redirect()->route('all_employees');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }

        
    }

    public function get_all_employees(){
        // $employees = Profile::all();     
        $employees = Profile::orderBy('id',"DESC")->get();   
        return view('employee')->with('employees',$employees);
    }
    public function profile(){     
        return view('profile');
    }
    // public function task(){     
    //     return view('task');
    // }
    public function todolist(){     
        return view('todolist');
    }
    // public function time_tracker(){     
    //     return view('time_tracker');
    // }
    public function get_time_tracker(){
        // $time_trackers = TimeTracker::all(); 
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;
        if($login_user_type==1 || $login_user_type==2 )
        {
            $time_trackers = TimeTracker::orderBy('id',"DESC")->get(); 
        }
        else
        {
            $time_trackers = TimeTracker::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get(); 
        }
        $today = date("Y-m-d");
            
        $single_time_trackers = TimeTracker::where('user_id', '=', $login_user_id)->whereDate('current_time', '=', $today)->get();
        $TotalSecondsDiff =0;
        $SecondsDiff=0;
        foreach($single_time_trackers as $day_time)
        {
            $flag = $day_time->flag;
            $id = $day_time->id;
            // if($flag=="start")
            // {
            //     $start_time=$day_time->current_time;
            //     $total_start_time = $start_time++;
            // }
            if($flag=="stop")
            {
                $single_start_trackers = TimeTracker::where('user_id', '=', $login_user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();
                // dd($single_start_trackers);
                // dd($id);
                $start_time=$single_start_trackers->current_time;
                // dd($start_time);
                $stop_time=$day_time->current_time;
                // dd($stop_time);
                $start = strtotime($start_time);
                // dd($start);
                $stop = strtotime($stop_time);
                $SecondsDiff = abs($stop-$start);

                $TotalSecondsDiff += $SecondsDiff;
            }
        }
        $TotalMinutesDiff = $TotalSecondsDiff/60; 

        $user_last_details = TimeTracker::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->first();
        // dd($user_last_details);
        if($user_last_details)
        {
            $user_last_flag = $user_last_details->flag;
        }
        else
        {
            $user_last_flag = "";
        }
        return view('time_tracker')->with(['time_trackers'=>$time_trackers,'total_minutes'=>$TotalMinutesDiff,'total_seconds'=>$TotalSecondsDiff,'user_last_flag'=>$user_last_flag]);
    }
    public function get_single_time_tracker(){
        return view('single_time_tracker')->with('single_time_trackers',$single_time_trackers);
    }
    public function get_single_employee(Request $request, $id){
        $employee = Profile::find($id);
        return response()->json(['employee'=>$employee],200);
    }
    public function get_single_task(Request $request, $id){
        $task = Task::find($id);
        return response()->json(['task'=>$task],200);
    }

    public function task_start(Request $request){
        $task_id = $request->id;
        $task_start = Task::find($task_id);
        if($task_start){
            $task_start->start_by = $request->user_id;
            $task_start->user_id = $request->user_id;
            $task_start->start_time = $request->start_time;
            $task_start->status = '1';           
    
            $task_start->save();
            if($task_start){
                return redirect()->route('all_tasks');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }
       

       
    }
    public function task_stop(Request $request){
        $task_id = $request->id;
        $task_stop = Task::find($task_id);
        if($task_stop)
        {
            $task_stop->stop_by = $request->user_id;
            $task_stop->stop_time = $request->stop_time;
            $task_stop->status = '2';
            

            $task_stop->save();

            if($task_stop){
                return redirect()->route('all_tasks');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }
    }
    public function task_complete(Request $request){
        $task_id = $request->id;
        $task_complete = Task::find($task_id);
        if($task_complete)
        {
            $task_complete->user_id = $request->user_id;
            // $task_complete->complete_by = $request->user_id;
            // $task_complete->complete_time = $request->complete_time;
            $task_complete->status = '3';
            

            $task_complete->save();

            if($task_complete){
                return redirect()->route('all_tasks');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }
    }
    public function task_cancel(Request $request){
        $task_id = $request->id;
        $task_complete = Task::find($task_id);
        if($task_complete)
        {
            $task_cancel->user_id = $request->user_id;
            // $task_cancel->cancel_by = $request->user_id;
            // $task_cancel->cancel_time = $request->cancel_time;
            $task_cancel->status = '4';
            

            $task_cancel->save();

            if($task_cancel){
                return redirect()->route('all_tasks');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }  
        }
        else{
            $message = 'Data not Saved';
            Session('message',$message); 
        }
    }

    public function time_start(Request $request){

        //$date="date(Y-m-d h:i:s)";
        //dd($request->all());
        // dd($request->img[0]);
        $time_start = new TimeTracker;
        $time_start->flag = 'start';
        $time_start->user_id = $request->user_id;
        $time_start->current_time = $request->start_time;
        
        

        $time_start->save();

        if($time_start){
            return redirect()->route('time_tracker');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
    public function time_stop(Request $request){

        //$date="date(Y-m-d h:i:s)";
        //dd($request->all());
        // dd($request->img[0]);
        $time_start = new TimeTracker;
        $time_start->flag = 'stop';
        $time_start->user_id = $request->user_id;
        $time_start->current_time = $request->start_time;
        

        $time_start->save();

        if($time_start){
            return redirect()->route('time_tracker');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }

        
    }
    public function get_tasks(){
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        if($login_user_type==1 || $login_user_type==2 )
        {
            $tasks = Task::orderBy('id',"DESC")->get();
        }
        else
        {
            $tasks = Task::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        }

        // $single_start_trackers = TimeTracker::where('user_id', '=', $user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();

        $users = User::all();
        // foreach($tasks as $task){
        //     $array = explode(',',$task->assign_to);
            
        //     foreach($array as $assigned){
        //         $data['assign_to'] = ;
                
        //         dd($data-);
        //     }
           
        // }
        
        return view('task')->with(['tasks'=>$tasks,'users'=>$users]);
    }
    public function store_task_data(Request $request){

        
        //dd($request->all());
        // dd($request->img[0]);
        $task = new Task;
        $task->task_title = $request->task_title;
        $task->task_desc = $request->task_desc;

        $due_date = $request->due_date;
        $DueDate = date("Y-m-d",strtotime($due_date));
        $task->due_date = $DueDate;

        $assign_to = $request->assign_to;
        if($assign_to!="")
        {
            $AssignTo = implode(',', $assign_to);
            $task->assign_to = $AssignTo;
        }
        else
        {
            $task->assign_to = "";
        }

        $task->status = '0';
        $task->user_id = auth()->user()->id;

        // $users = User::all();
        // var user_id = `{{Auth::user()->id}}`;

        // $task->task_photo = $request->file('img');

        $validated = $request->validate([
            'task_title' => 'required',
            'assign_to' => 'required',
        ]);
        //Remaining attributes
        $task->save();

        if($task){
            return redirect()->route('all_tasks');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function get_todolist(){
        $todolists = Todolist::all();        
        return view('todolist')->with('todolists',$todolists);
    }
    public function store_todolist_data(Request $request)
    {
        //dd($request->all());
        // dd($request->img[0]);
        $todolist = new Todolist;
        $todolist->todo_title = $request->todo_title;
        $todolist->todo_desc = $request->todo_desc;
        $todolist->user_id = auth()->user()->id;
        // $todolist->todolist_photo = $request->file('img');

        $validated = $request->validate([
            'todo_title' => 'required'
        ]);
        //Remaining attributes
        $todolist->save();

        if($todolist){
            return redirect()->route('todolist');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
    public function get_assignto_names_from_ids($request){
        //dd([$request]);
        $assign_to_data = User::whereIn('id', [$request])->get();
        // dd($assign_to_data);

        return $assign_to_data;
    }
}
