<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\JobRoleMaster;
use App\Models\WorkingLocationMaster;

class EmployeeController extends Controller
{
    public function profile(){     
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get();
        return view('profile')->with(['job_roles'=>$job_roles,'working_locations'=>$working_locations]);
    }

    public function create_employee_profile(){
        $current_user = Auth::user()->name;

        $employees = Profile::where('isDelete', '=', 0)->get();  
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get();
        return view('pages.Employee.CreateProfile')->with(['mode'=>"add",'current_user'=>$current_user,'employees'=>$employees,'job_roles'=>$job_roles,'working_locations'=>$working_locations]);
    }
    public function edit_employee_profile($id){

        $profile = Profile::find($id);
        $current_user = Auth::user()->name;

        $employees = Profile::where('isDelete', '=', 0)->get();  
        $job_roles = JobRoleMaster::where('isDelete', '=', 0)->get();
        $working_locations = WorkingLocationMaster::where('isDelete', '=', 0)->get();
        return view('pages.Employee.CreateProfile')->with(['mode'=>"edit",'profile'=>$profile,'current_user'=>$current_user,'employees'=>$employees,'job_roles'=>$job_roles,'working_locations'=>$working_locations]);
    }
    

    public function store_profile_data(Request $request)
    {

        $validated = $request->validate([
            'given_name' => 'required',
            'family_name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            // 'image_path' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if($request->mode === 'add')
        {
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

            if($request->image_path!=null && $request->image_path!="null")
            {
                $imageName = $request->given_name.'_'.time().'.'.$request->image_path->extension();
                // move Public Folder
                $request->image_path->move(public_path('images/profile'), $imageName);
                $profile->image_path = $imageName;
            }
            //Remaining attributes
            $profile->save();

            if($profile){
                return redirect()->route('view_all_employees');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            $profile_id = $request->profile_id;
            $profile = Profile::find($profile_id);

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
            // $profile->user_id = auth()->user()->id;
            if($request->image_path!=null && $request->image_path!="null")
            {
                $imageName = $request->given_name.'_'.time().'.'.$request->image_path->extension();
                // move Public Folder
                $request->image_path->move(public_path('images/profile'), $imageName);
                $profile->image_path = $imageName;
            }
            $profile->save();

            if($profile){
                return redirect()->route('view_all_employees');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
    public function delete_employee_profile($id){
        $profile = Profile::find($id);

        $profile->isDelete = 1;

        $profile->save();
        if($profile){
            // return response()->json('success',200);
            return redirect()->route('view_all_employees');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function get_single_employee(Request $request, $id)
    {
        $employee = Profile::find($id);
        // $dob = date("Y-m-d",strtotime($employee->dob));
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
        $data['id'] = ($employee->id!=null) ? $employee->id : "";
        $data['given_name'] = ($employee->given_name!=null) ? $employee->given_name : "";
        $data['family_name'] = ($employee->family_name!=null) ? $employee->family_name : "";
        $data['dob'] = ($employee->dob!=null) ? $employee->dob : "";
        $data['job_role'] = ($job_role!=null) ? $job_role : "";
        $data['job_role_id'] = ($employee->job_role!=null) ? $employee->job_role : "";
        $data['edu_qualification'] = ($employee->edu_qualification!=null) ? $employee->edu_qualification : "";
        $data['skills'] = ($employee->skills!=null) ? $employee->skills : "";
        $data['present_address'] = ($employee->present_address!=null) ? $employee->present_address : "";
        $data['permanent_address'] = ($employee->permanent_address!=null) ? $employee->permanent_address : "";
        $data['contact_number'] = ($employee->contact_number!=null) ? $employee->contact_number : "";
        $data['contact_number_2'] = ($employee->contact_number_2!=null) ? $employee->contact_number_2 : "";
        $data['working_location'] = ($working_location!=null) ? $working_location : "";
        $data['working_location_id'] = ($employee->working_location!=null) ? $employee->working_location : "";
        $data['email'] = ($employee->email!=null) ? $employee->email : "";
        $data['image_path'] = ($image!=null) ? $image : "";

        return response()->json(['employee'=>$data],200);
        // return response()->json(['employee'=>$employee],200);
    }
}
