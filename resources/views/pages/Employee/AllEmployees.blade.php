@extends('layouts.master')
@section('content')
<!-- Welcome Section-->

<section class="lg:ml-60 md:ml-60 sm:ml-60 relative">
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
        <div class="lg:w-full border-b-2">
            <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
            <div class="flex flex-row">
                <span class="text-md font-semibold text-sm self-center mx-2 md:mx-0">Total Employee</span>
                <span class="text-md self-center text-left text-neutral-400 pl-2">{{$total_employee}}</span>
            </div>
            <span class="text-4xl self-center font-bold pb-10">Employee List</span>
            <div class="flex flex-col">
            </div>
            </div>
        </div>
    </div>
</section>
<!-- Welcome Section end-->
<section class="lg:ml-60 md:ml-60 sm:ml-60 mt-2 relative">
    <!-- Filter Start-->
    <!-- <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
      <div class="lg:w-full bg-red-100 rounded-lg p-2">
        <div class="flex justify-between flex-col xl:flex-row md:flex-row sm:flex-col">
          <div class="flex lg:flex-row md:flex-row xl:flex-row sm:flex-row flex-col">
            <div class="self-center lg:py-0 md:py-0 sm:py-0 xl:py-0 py-2"><input type="email" name="email" class=" b-2 px-3 p-2 h-full dark:focus:border-red-300 focus:ring-red-300 focus:border-red-300 border-1 xl:w-96 lg:w-96 md:w-64 sm:w-60 w-60 border-red-300 placeholder-neutral-400 font-semibold focus:outline-none block text-gray-400  rounded-lg sm:text-sm focus:ring" placeholder="Search"></div>
            <select id="countries" class="self-center ml-5 border border-red-300 text-gray-600 text-sm rounded-lg focus:ring-red-300 focus:border-red-300 block xl:w-full lg:w-full md:w-48 sm:w-48 w-52 py-2 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-300 dark:focus:border-red-300">
              <option selected>Name</option>
              <option value="title">Title</option>
              <option value="assignTo">Assign To</option>
            </select>
          </div>
          <div class="flex flex-row">
            <span class="text-sm font-semibold self-center text-left ">Select by:</span>
            <select class="border-0 bg-transparent w-30">
              <option>Date</option>
              <option>No</option>
              <option>Maybe</option>
            </select>
            <i class="fa fa-bars p-4"></i>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Filter End-->
    
    <div class="container xl:px-10 md:px-10 sm:px-4 px-0 mx-auto flex flex-col xl:flex align">
      <div class="fix-width text-left ">
        <table class="table table-striped project-list-table">
          <thead>
            <tr class="">
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center"></th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center">Sr.No.</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Given Name</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Job Role</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Primary Contact Number</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Working Location</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-left">Email</th>
              <th class="text-neutral-400 p-4 font-semibold text-sm text-center"></th>
            </tr>
          </thead>
          <tbody>
              @php
                $count = 0
              @endphp
              @foreach($employees as $employee)
              @php
                if($employee->image_path!="" && $employee->image_path!="null" )
                {
                  $image = asset('images/profile')."/".$employee->image_path;
                }
                else
                {
                  $image = asset('images')."/default.png";
                }
              @endphp
              <tr class="bg-white">
                  <td class="text-sm font-semibold p-2 text-center">
                    <a data-modal-toggle="small-modal" data-attr="{{ route('api_single_employee', $employee->id) }}" data-id="{{ $employee->id }}" title="View" style="cursor:pointer;color: blue;" >
                      <i class="fa fa-eye"></i>
                    </a>
                  </td>
                  <td class="text-sm font-semibold p-2 text-center">{{++$count}}</td>
                  <td class="flex flex-row text-sm font-bold text-left">
                    <img src="{{$image}}"  class="rounded-full grid-image mt-2 mb-2"></img>
                    <span class="text-sm font-semibold p-2  self-center ml-2">{{$employee->given_name}}</span>
                  </td>
                  <td class="text-sm font-semibold p-2 text-left">
                    @if($employee->job_role!=0)
                      {{$employee->job_role_name->name}}
                    @endif
                  </td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $employee->contact_number }}</td>
                  <td class="text-sm font-semibold p-2 text-left">
                    @if($employee->working_location!=0)
                      {{$employee->working_location_name->name}}
                    @endif
                  </td>
                  <td class="text-sm font-semibold p-2 text-left">{{ $employee->email }}</td>
                  <td class="text-sm font-semibold p-2 text-left">
                  <div class="dropdown_container" tabindex="-1">
                      <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                      <div class="dropdown">
                          <a href="#" class="grid_dropdown_item view_button" ><div><i class="fa fa-eye"></i> View</div></a>
                          @if((Auth::user()->type==1 || Auth::user()->type==2 ))
                            <a href="{{ route('edit_employee_profile', $employee->id) }}" class="grid_dropdown_item edit_button" ><div><i class="fa fa-edit"></i> Edit</div></a>
                            <a onclick="return confirm('Are you sure Delete This Employee..?')"  href="{{ route('delete_employee_profile', $employee->id) }}" class="grid_dropdown_item delete_button"   title="Delete"  >
                            <div><i class="fa fa-trash-o"> Delete</i></div>
                          @endif
                          </a>
                      </div>
                  </td>  
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @if((Auth::user()->type==1 || Auth::user()->type==2 ))
      <div class="mb-10 mt-5 mr-10 self-center lg:self-center float-right">
        <a href="{{ route('create_employee_profile') }}" class="text-white rounded-3xl bg-red-600 text-md font-normal px-4 py-2 rounded-lg">Add Employee <i class="fa fa-plus"></i></a>
      </div>
    @endif

    
</section>

<script type="text/javascript">

    $(document).on('click', '#employeedetailsButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        let id = $(this).attr('data-id');
        // console.log(href);
        $.ajax({
        url: href,
        beforeSend: function() {
            $('#loader').show();
        },
        // return the result
        success: function(result) {
            // console.log(result.employee);
            $('#employeemodel').modal("show");
            var object = result.employee;
            var date    = new Date(object.dob),
            yr      = date.getFullYear(),
            month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
            day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
            dob = day + '-' + month + '-' + yr;

            $(".modal-body").html(
            `<table class="table table-bordered">
                <tr><td colspan="2" style="text-align: center;" ><img src="${object.image_path}" style="width: 200px;height: 200px;" ></img></td></tr>
                <tr><td>Given Name : </td><td>${object.given_name}</td></tr>
                <tr><td>Family Name : </td><td>${object.family_name}</td></tr>
                <tr><td>DOB : </td><td>${dob}</td></tr>
                <tr><td>Job Role : </td><td>${object.job_role}</td></tr>
                <tr><td>Education Qualification : </td><td>${object.edu_qualification}</td></tr>
                <tr><td>Skills : </td><td>${object.skills}</td></tr>
                <tr><td>Present Address : </td><td>${object.present_address}</td></tr>
                <tr><td>Permanent Address : </td><td>${object.permanent_address}</td></tr>
                <tr><td>Primary Contact Number : </td><td>${object.contact_number}</td></tr>
                <tr><td>Secondary Contact Number : </td><td>${object.contact_number_2}</td></tr>
                <tr><td>Working Location : </td><td>${object.working_location}</td></tr>
                <tr><td>Email : </td><td>${object.email}</td></tr>
            </table>`
            );
            
            //$('#smallBody').html(result).show();
            //$("#given_name").prev().val(result.employee[given_name]);
            // $("#file").val(fileName);
        },
        complete: function() {
            $('#loader').hide();
        },
        error: function(jqXHR, testStatus, error) {
            console.log(error);                                                                                                                                  
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
        })
    });
</script>

@endsection
