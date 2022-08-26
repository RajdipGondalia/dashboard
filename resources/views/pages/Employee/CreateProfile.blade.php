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
    $page_title = "Edit Employee";
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
    $page_title = "Add Employee";

}
@endphp
<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
                <span class="text-4xl self-center font-bold pb-10">{{$page_title}}</span>
                    <div class="flex flex-col">
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- Welcome Section end-->
<section class="lg:ml-60 md:ml-60 sm:ml-60 mt-2 relative">
    <div class="flex flex-col xl:flex xl:flex-col pt-2  xl:justify-between xl:pl-10 md:pl-10 sm:pl-10 pl-0 xl:px-10 md:px-10 sm:px-10 px-0
                    sm:mx-0 xl:mx-0">
        @if($errors->any())
            <div class="validation-alert-box alert alert-danger  bg-red-100 xl:mx-10 md:mx-10 sm:mx-2 mx-0 mb-5 rounded-lg ">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                <div class="validation-alert-title alert alert-danger self-end bg-red-100 mb-2" role="alert">
                    {{ $error }}
                </div>
                @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-red-100 rounded-md mb-10 p-4 md:p-4 text-center flex flex-col">
            <form action="{{ route('store_profile_data') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class=" flex flex-col xl:flex-row md:flex-row sm:flex-row">
                    <div class=" w-full flex flex-col xl:flex-row md:flex-row sm:flex-row justify-between">
                        <div class="  flex flex-col form-floating xl:w-2/5 md:w-2/5 sm:w-2/5 w-full mb-3">
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Given Name <span class="text-red-700">*</span>
                                </span>
                                <input type="text" name="given_name" value="{{$given_name}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Family Name <span class="text-red-700">*</span>
                                </span>
                                <input type="text" name="family_name" value="{{$family_name}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Birth Date
                                </span>
                                <input name="dob" type="date" value="{{$dob}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Job Role <span class="text-red-700">*</span>
                                </span>
                                <select name="job_role" class="form-select appearance-none block sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-red-100 bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-red-300 focus:outline-none"
                                    aria-label="Default select example">
                                    <option value="">Select Job Role</option>
                                    @foreach($job_roles as $job_role)
                                        <option  {{($job_role_id == $job_role->id)?"selected":""}}  value="{{ $job_role->id }}">{{ $job_role->name }}</option>
                                    @endforeach
                                </select>
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Education Qualification
                                </span>
                                <textarea type="text" name="edu_qualification" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring"
                                    placeholder="">{{$edu_qualification}}</textarea>
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Skills
                                </span>
                                <textarea type="text" name="skills" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring"
                                    placeholder="">{{$skills}}</textarea>
                            </label>
                        </div>
                        <div class=" flex flex-col form-floating xl:w-2/5 md:w-2/5 sm:w-2/5 w-full mb-3">
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Present Address
                                </span>
                                <textarea type="text" name="present_address" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring"
                                    placeholder="">{{$present_address}}</textarea>
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Permanent Address
                                </span>
                                <textarea type="text" name="permanent_address" class=" h-28 bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring"
                                    placeholder="">{{$permanent_address}}</textarea>
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Primary Contact Number
                                </span>
                                <input type="text" name="contact_number" value="{{$contact_number}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Secondary Contact Number
                                </span>
                                <input type="text" name="contact_number_2" value="{{$contact_number_2}}"class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>

                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Email <span class="text-red-700">*</span>
                                </span>
                                <input type="email" name="email" value="{{$email}}" class="bg-white mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none  employee-input-card p-2 md:p-2 h-10 text-left rounded-lg self-start w-full flex flex-row
                                    focus:border-red-300 focus:ring-red-300 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder="">
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span
                                    class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-xs font-normal">
                                    Working Location <span class="text-red-700">*</span>
                                </span>
                                <select name="working_location" class="form-select appearance-none block sm:w-full w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-red-100 bg-clip-padding bg-no-repeat border-none rounded transition ease-in-out m-0 mt-1 focus:text-gray-700 focus:bg-white focus:border-red-300 focus:outline-none" aria-label="Default select example">
                                        <option value="">Select Working Location</option>
                                        @foreach($working_locations as $working_location)
                                            <option {{($working_location_id == $working_location->id)?"selected":""}} value="{{ $working_location->id }}">{{ $working_location->name }}</option>
                                        @endforeach
                                </select>
                            </label>
                            <label class="block mb-5 self-center w-full">
                                <span class="after:content-[''] after:ml-0.5 after:text-red-500 block text-left text-sm text-gray-500 font-medium ">Profile Image<span class="text-red-700">*</span></span>
                                <input type="file" name="image_path" value="{{$image_path}}" class="mt-1 px-3 p-1 shadow-sm border-gray-500 border-none placeholder-white focus:outline-none employee-input-card p-2 md:p-2 h-10 text-center rounded-lg self-start w-full flex flex-row focus:border-sky-500 focus:ring-sky-500 block w-full  rounded-3xl sm:text-sm focus:ring" placeholder=""> 
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-10 mt-10 self-center lg:self-center ">
                    <input type="hidden" name="mode" value="{{$mode}}" >
                    <input type="hidden" name="profile_id" value="{{$id}}" >
                    <button type="submit" class="text-white rounded-3xl bg-red-500 text-md font-semibold profile-button px-10 py-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
