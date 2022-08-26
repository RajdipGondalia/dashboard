<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\TimeTracker;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Models\ClientMaster;
use App\Models\ClientCategoryMaster;
use App\Models\JobRoleMaster;


class ViewController extends Controller
{
    public function index(){
        $current_user = Auth::user()->name;

        $total_employees_count = Profile::where('isDelete', '=', 0)->count();

        $total_tasks_count = Task::where('isDelete', '=', 0)->count();
        $pending_tasks_count = Task::where('isDelete', '=', 0)->where('status', '=', 0)->count();

        $total_projects_count = Project::where('isDelete', '=', 0)->count();

        $count['total_employees_count'] = $total_employees_count;
        $count['total_tasks_count'] = $total_tasks_count;
        $count['pending_tasks_count'] = $pending_tasks_count;
        $count['total_projects_count'] = $total_projects_count;
        

        return view('pages.dashboard')->with(['count'=>$count,'current_user'=>$current_user]);
    }

    public function view_all_employees(){
        $employees = Profile::where('isDelete', '=', 0)->get();   
        $current_user = Auth::user()->name;
        $total_employee = Profile::where('isDelete', '=', 0)->count();
        return view('pages.Employee.AllEmployees')->with(['employees'=>$employees,'current_user'=>$current_user,'total_employee'=>$total_employee]);
    }

    public function view_all_time_trackers(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;
        if($login_user_type==1 || $login_user_type==2 )
        {
            $time_trackers = TimeTracker::where('isDelete', '=', 0)->orderBy('id',"DESC")->get(); 
        }
        else
        {
            $time_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get(); 
        }
        $today = date("Y-m-d");
            
        $single_time_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->whereDate('current_time', '=', $today)->get();
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
                $single_start_trackers = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();
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

        $user_last_details = TimeTracker::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->whereDate('current_time', '=', $today)->first();
        // dd($user_last_details);
        if($user_last_details)
        {
            $user_last_flag = $user_last_details->flag;
        }
        else
        {
            $user_last_flag = "";
        }
        return view('pages.TimeTracker.AllTimetrackers')->with(['time_trackers'=>$time_trackers,'total_minutes'=>$TotalMinutesDiff,'total_seconds'=>$TotalSecondsDiff,'user_last_flag'=>$user_last_flag,'current_user'=>$current_user]);

    }

    public function view_all_tasks(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        if($login_user_type==1 || $login_user_type==2 )
        {
            $tasks = Task::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        }
        else
        {
            // $tasks = Task::where('isDelete', '=', 0)->where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
            $tasks = Task::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();

        }

        // $single_start_trackers = TimeTracker::where('user_id', '=', $user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();

        $users = User::where('isDelete', '=', 0)->get();
        $projects = Project::where('isDelete', '=', 0)->get();

        // foreach($tasks as $task){
        //     $array = explode(',',$task->assign_to);
            
        //     foreach($array as $assigned){
        //         $data['assign_to'] = ;
                
        //         dd($data-);
        //     }
           
        // }
        
        return view('pages.Task.AllTasks')->with(['tasks'=>$tasks,'users'=>$users,'projects'=>$projects,'current_user'=>$current_user]);

    }
    public function get_assignto_names_from_ids($request){
        // dd([$request]);
        $assign_to_data = User::where('isDelete', '=', 0)->whereIn('id', [$request])->get();
        // dd($assign_to_data);

        return $assign_to_data;
    }

    
    public function view_all_clients(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        $clients = ClientMaster::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        $total_client = ClientMaster::where('isDelete', '=', 0)->count();

        $users = User::where('isDelete', '=', 0)->get();
        $client_categories = ClientCategoryMaster::where('isDelete', '=', 0)->get();
        
        
        return view('pages.Client.AllClients')->with(['clients'=>$clients,'client_categories'=>$client_categories,'users'=>$users,'current_user'=>$current_user,'total_client'=>$total_client]);
    }
    public function view_all_projects(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        $projects = Project::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        $total_project = Project::where('isDelete', '=', 0)->count();
        
        $users = User::where('isDelete', '=', 0)->get();
        $clients = ClientMaster::where('isDelete', '=', 0)->get();
        
        
        return view('pages.Project.AllProjects')->with(['projects'=>$projects,'clients'=>$clients,'users'=>$users,'current_user'=>$current_user,'total_project'=>$total_project]);
    }

    public function view_all_users(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        $users = User::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        $total_user = User::where('isDelete', '=', 0)->count();
        
        return view('pages.User.AllUsers')->with(['users'=>$users,'current_user'=>$current_user,'total_user'=>$total_user]);

    }
    

    
}