<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use App\Models\TimeTracker;
use App\Models\Task;
use App\Models\Todolist;
use App\Models\ClientMaster;
use App\Models\ClientCategoryMaster;
use App\Models\Project;
use App\Models\JobRoleMaster;
use App\Models\WorkingLocationMaster;
use App\Models\ProjectVsComment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;





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
        $validated = $request->validate([
            'given_name' => 'required',
            'family_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            'image_path' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        
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


        $imageName = $request->given_name.'_'.time().'.'.$request->image_path->extension();
        // move Public Folder
        $request->image_path->move(public_path('images/profile'), $imageName);
        $profile->image_path = $imageName;


        
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
        $job_roles = JobRoleMaster::all();
        $working_locations = WorkingLocationMaster::all();

        
        return view('profile')->with(['job_roles'=>$job_roles,'working_locations'=>$working_locations]);
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
        $dob = date("d-m-Y",strtotime($employee->dob));
        if($employee->job_role!=0)
        {
            $job_role = $employee->job_role_name->name;
        }
        else
        {
            $job_role = "";
        }
        if($employee->working_location!=0)
        {
            $working_location = $employee->working_location_name->name;
        }
        else
        {
            $working_location = "";
        }
        if($employee->image_path!="" && $employee->image_path!="null" )
        {
            $image = asset('images/profile')."/".$employee->image_path;
            
        }
        else
        {
            $image = asset('images')."/default.png";
        }
        $data['given_name'] = ($employee->given_name!=null) ? $employee->given_name : "";
        $data['family_name'] = ($employee->family_name!=null) ? $employee->family_name : "";
        $data['dob'] = ($dob!=null) ? $dob : "";
        $data['job_role'] = ($job_role!=null) ? $job_role : "";
        $data['edu_qualification'] = ($employee->edu_qualification!=null) ? $employee->edu_qualification : "";
        $data['skills'] = ($employee->skills!=null) ? $employee->skills : "";
        $data['present_address'] = ($employee->present_address!=null) ? $employee->present_address : "";
        $data['permanent_address'] = ($employee->permanent_address!=null) ? $employee->permanent_address : "";
        $data['contact_number'] = ($employee->contact_number!=null) ? $employee->contact_number : "";
        $data['contact_number_2'] = ($employee->contact_number_2!=null) ? $employee->contact_number_2 : "";
        $data['working_location'] = ($working_location!=null) ? $working_location : "";
        $data['email'] = ($employee->email!=null) ? $employee->email : "";
        $data['image_path'] = ($image!=null) ? $image : "";


        return response()->json(['employee'=>$data],200);
        // return response()->json(['employee'=>$employee],200);
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
        $projects = Project::all();

        // foreach($tasks as $task){
        //     $array = explode(',',$task->assign_to);
            
        //     foreach($array as $assigned){
        //         $data['assign_to'] = ;
                
        //         dd($data-);
        //     }
           
        // }
        
        return view('task')->with(['tasks'=>$tasks,'users'=>$users,'projects'=>$projects]);
    }
    
    
    public function store_task_data(Request $request){

        
        //dd($request->all());
        // dd($request->img[0]);
        $task = new Task;
        $task->project_id = $request->project_id;
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
        $task->priority = $request->priority;
        $task->status = '0';
        $task->user_id = auth()->user()->id;

        // $users = User::all();
        // var user_id = `{{Auth::user()->id}}`;

        // $task->task_photo = $request->file('img');

        $validated = $request->validate([
            'project_id' => 'required',
            'task_title' => 'required',
            'assign_to' => 'required',
            'priority' => 'required',
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
    public function get_clients(){
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        // if($login_user_type==1 || $login_user_type==2 )
        // {
            $clients = ClientMaster::orderBy('id',"DESC")->get();
        // }
        // else
        // {
        //     $clients = ClientMaster::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        // }

        // $single_start_trackers = TimeTracker::where('user_id', '=', $user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();

        $users = User::all();
        $client_categories = ClientCategoryMaster::all();
        
        
        return view('client_master')->with(['clients'=>$clients,'client_categories'=>$client_categories,'users'=>$users]);
    }
    public function store_client_master_data(Request $request){

        //dd($request->all());
        // dd($request->img[0]);
        $client_master = new ClientMaster;
        $client_master->company_name = $request->company_name;
        $client_master->first_name = $request->first_name;
        $client_master->last_name = $request->last_name;
        $client_master->email = $request->email;
        $client_master->address = $request->address;
        $client_master->client_category_id = $request->client_category_id;
        $client_master->user_id = auth()->user()->id;


        $validated = $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'client_category_id' => 'required',
        ]);
        //Remaining attributes
        $client_master->save();

        if($client_master){
            return redirect()->route('all_client');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }

    public function get_projects(){
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        // if($login_user_type==1 || $login_user_type==2 )
        // {
            $projects = Project::orderBy('id',"DESC")->get();
        // }
        // else
        // {
        //     $projects = Project::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        // }

        // $single_start_trackers = TimeTracker::where('user_id', '=', $user_id)->where('id', '<', $id)->where('flag', '=', "start")->orderBy('id',"DESC")->first();

        $users = User::all();
        $clients = ClientMaster::all();

        // foreach($tasks as $task){
        //     $array = explode(',',$task->assign_to);
            
        //     foreach($array as $assigned){
        //         $data['assign_to'] = ;
                
        //         dd($data-);
        //     }
           
        // }
        
        return view('project')->with(['projects'=>$projects,'clients'=>$clients,'users'=>$users]);
    }
    public function store_project_data(Request $request){

        
        //dd($request->all());
        // dd($request->img[0]);
        $project = new Project;
        $project->title = $request->title;
        $project->client_id = $request->client_id;

        $due_date = $request->due_date;
        $DueDate = date("Y-m-d",strtotime($due_date));
        $project->due_date = $DueDate;

        $assign_to = $request->assign_to;
        if($assign_to!="")
        {
            $AssignTo = implode(',', $assign_to);
            $project->assign_to = $AssignTo;
        }
        else
        {
            $project->assign_to = "";
        }
        $project->project_manager = $request->project_manager;

        $project->status = '0';
        $project->user_id = auth()->user()->id;


        $validated = $request->validate([
            'title' => 'required',
            'assign_to' => 'required',
        ]);
        //Remaining attributes
        $project->save();

        if($project){
            return redirect()->route('all_projects');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function get_project_details(Request $request, $id){
        // $project = Project::find($id);
        // return response()->json(['project'=>$project],200);

        // $tasks = Task::where('user_id', '=', $login_user_id)->orderBy('id',"DESC")->get();
        $tasks = Task::where('project_id', '=', $id)->orderBy('id',"DESC")->get();
        $users = User::all();
        $clients = ClientMaster::all();
        $project_comments = ProjectVsComment::where('project_id', '=', $id)->orderBy('id',"ASC")->get();
        return view('project_details')->with(['tasks'=>$tasks,'clients'=>$clients,'users'=>$users,'project_id'=>$id,'project_comments'=>$project_comments]);
    }

    public function store_project_comment_data(Request $request){

        $project_comment = new ProjectVsComment;
        $project_comment->comment = $request->comment;
        $project_comment->project_id = $request->project_id;

        $project_comment->user_id = auth()->user()->id;


        $validated = $request->validate([
            'comment' => 'required',
        ]);
        //Remaining attributes
        $project_comment->save();

        if($project_comment){
            return redirect()->route('project_details', $project_comment->project_id);
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }
    }
    public function get_users(){
        $users = User::orderBy('id',"DESC")->get();
        
        return view('user')->with('users',$users);
    }
    public function store_user_data(Request $request){

        
        //dd($request->all());
        // dd($request->img[0]);
        // dd($request);

        $validated = $request->validate([
            'type' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image_path' => ['required','image','mimes:png,jpg,jpeg','max:2048'],
        ]);

        $user = new User;
        $user->type = $request->type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $imageName = $request->name.'_'.time().'.'.$request->image_path->extension();
        // move Public Folder
        $request->image_path->move(public_path('images/user'), $imageName);
        $user->image_path = $imageName;

        $user->save();

        if($user){
            return redirect()->route('all_users');
        }else{
            $message = 'Data not Saved';
            Session('message',$message);
        }  
    }
}
