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
        //  'given_name' => 'required|unique:posts|max:255',
            'given_name' => 'required',
            'family_name' => 'required',
        ]);
        //Remaining attributes
        if($validated)
        {
            $profile->save();

            if($profile){
                return redirect()->route('all_employees');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else
        {
            $message = 'Some Field Are Required..!!';
            Session('message',$message);
        }

        
    }

    public function get_all_employees(){
        $employees = Profile::all();        
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
        $time_trackers = TimeTracker::all();        
        return view('time_tracker')->with('time_trackers',$time_trackers);
    }
    public function get_single_employee(Request $request, $id){
        $employee = Profile::find($id);
        return response()->json(['employee'=>$employee],200);
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
        $tasks = Task::all();
        // foreach($tasks as $task){
        //     $array = explode(',',$task->assign_to);
            
        //     foreach($array as $assigned){
        //         $data['assign_to'] = ;
                
        //         dd($data-);
        //     }
           
        // }
        
        return view('task')->with('tasks',$tasks);
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
        $AssignTo = implode(',', $assign_to);
        $task->assign_to = $AssignTo;

        $task->status = '0';
        $task->user_id = auth()->user()->id;

        // $users = User::all();
        // var user_id = `{{Auth::user()->id}}`;

        // $task->task_photo = $request->file('img');

        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
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

        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);
        //Remaining attributes
        $todolist->save();

        if($todolist){
            return redirect()->route('todolist');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
}
