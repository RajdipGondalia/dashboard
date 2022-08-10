@extends('layouts.master')
@section('content')
<!-- Welcome Section-->
@php
if($mode=="edit")
{
    $id = $profile->id;
    $given_name = $profile->given_name;
    $family_name = $profile->family_name;
    $dob = $profile->dob;
    $job_role_id = $profile->job_role;
    $edu_qualification = $profile->edu_qualification;
    $skills = $profile->skills;
    $present_address = $profile->present_address;
    $permanent_address = $profile->permanent_address;
    $contact_number = $profile->contact_number;
    $contact_number_2 = $profile->contact_number_2;
    $working_location_id = $profile->working_location;
    $email = $profile->email;
    $image_path = $profile->image_path;
}
else
{
    $id = "";
    $given_name = "";
    $family_name = "";
    $dob = "";
    $job_role_id = 0;
    $edu_qualification = "";
    $skills = "";
    $present_address = "";
    $permanent_address = "";
    $contact_number = "";
    $contact_number_2 = "";
    $working_location_id = 0;
    $email = "";
    $image_path = "";

}
@endphp
<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
                <span class="text-4xl self-center font-bold pb-10">Add Employee</span>
                    <div class="flex flex-col">
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- Welcome Section end-->
<section class="lg:ml-60 md:ml-60 sm:ml-60 mt-2 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="flex flex-col bg-red-100 xl:mx-10 md:mx-10 sm:mx-2 mx-0 rounded-lg">

            <div  class="flex  sm:flex-col flex-col xl:px-12 md:px-12 sm:px-12 px-0 w-full">
            <!-- <div  class="flex lg:flex-row xl:flex xl:flex-row md:flex-row sm:flex-col flex-col xl:px-12 md:px-12 sm:px-12 px-0 w-full"> -->

                @if($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('store_profile_data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    

                    <div class="rounded-none p-4 xl:w-10/10 md:w-10/10 sm:w-full w-full md:p-4 text-center flex flex-col">
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Given Name <span class="text-red-700">*</span></span>
                                <input type="text" name="given_name"  value="{{$given_name}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="Given Name"> 
                            </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Family Name<span class="text-red-700">*</span></span>
                                <input type="text" name="family_name" value="{{$family_name}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="Given Name"> 
                            </label>
                        </div>
                        
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Birth Date</span>
                                <input name="dob" type="date" value="{{$dob}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="Given Name"> 
                            </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                Job Role <span class="text-red-700">*</span> </span>
                                <select name="job_role" class="form-select appearance-none block w-full bg-red-100 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out  focus:border-red-300 focus:ring-red-300 m-0 mt-1 focus:bg-red-100 focus:text-gray-700 focus:bg-red-100 focus:border-red-300 focus:outline-none" aria-label="Default select example">
                                    <option value="0">Select Job Role</option>
                                    @foreach($job_roles as $job_role)
                                        <option  {{($job_role_id == $job_role->id)?"selected":""}}  value="{{ $job_role->id }}">{{ $job_role->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                    Education Qualification
                                </span>
                            <textarea type="text" name="education_qualification"  class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-20 text-center rounded-lg self-start w-full flex flex-row
                            focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">{{$edu_qualification}}</textarea> </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                Skills
                                </span>
                            <textarea type="text" name="skills" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-20 text-center rounded-lg self-start w-full flex flex-row
                            focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">{{$skills}}</textarea> </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                Present Address
                                </span>
                            <textarea type="text" name="present_address" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-20 text-center rounded-lg self-start w-full flex flex-row
                            focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">{{$present_address}}</textarea> </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                Permanent Address
                                </span>
                            <textarea type="text" name="permanent_address" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-20 text-center rounded-lg self-start w-full flex flex-row
                            focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">{{$permanent_address}}</textarea> </label>
                        </div>
                        
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Primary Contact Number</span>
                                <input type="text" name="contact_number" value="{{$contact_number}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                            </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Secondary Contact Number</span>
                                <input type="text" name="contact_number_2" value="{{$contact_number_2}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                            </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Email<span class="text-red-700">*</span></span>
                                <input type="email" name="email" value="{{$email}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                            </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">
                                    Working Location <span class="text-red-700">*</span> </span>
                                <select name="working_location" class="form-select appearance-none block w-full bg-red-100 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out  focus:border-red-300 focus:ring-red-300 m-0 mt-1 focus:bg-red-100 focus:text-gray-700 focus:bg-red-100 focus:border-red-300 focus:outline-none" aria-label="Default select example">
                                    <option value="0">Select Working Location</option>
                                    @foreach($working_locations as $working_location)
                                        <option {{($working_location_id == $working_location->id)?"selected":""}} value="{{ $working_location->id }}">{{ $working_location->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="w-full"> 
                            <label class="block mb-5 self-center xl:w-2/6 lg:w-2/6 md:w-full sm:w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Profile Image<span class="text-red-700">*</span></span>
                                <input type="file" name="image_path" value="{{$image_path}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                            </label>
                        </div>
                        <div class="mb-10 mt-10 self-center lg:self-center ">
                            <input type="hidden" name="mode" value="{{$mode}}" >
                            <input type="hidden" name="profile_id" value="{{$id}}" >
                            <button type="submit" class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
