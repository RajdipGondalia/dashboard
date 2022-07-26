<?php
use App\Http\Controllers\DashboardController;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  
  <!-- <link rel="stylesheet" href="{{ asset('/feather/feather.css') }}"> -->
  <!-- <link rel="stylesheet" href="/mdi/css/materialdesignicons.min.css"> -->
  <!-- <link rel="stylesheet" href="/ti-icons/css/themify-icons.css"> -->
  <!-- <link rel="stylesheet" href="/typicons/typicons.css"> -->
  <!-- <link rel="stylesheet" href="/simple-line-icons/css/simple-line-icons.css"> -->
  <!-- <link rel="stylesheet" href="/css/vendor.bundle.base.css"> -->
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- <link rel="stylesheet" href="/datatables.net-bs4/dataTables.bootstrap4.css"> -->
  <link rel="stylesheet" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 

  <!-- endinject -->
  <!-- for chatbox start -->
  <style>
    #custom-search-input {
      background: #e8e6e7 none repeat scroll 0 0;
      margin: 0;
      padding: 10px;
    }
    #custom-search-input .search-query {
    background: #fff none repeat scroll 0 0 !important;
    border-radius: 4px;
    height: 33px;
    margin-bottom: 0;
    padding-left: 7px;
    padding-right: 7px;
    }
    #custom-search-input button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 0 none;
    border-radius: 3px;
    color: #666666;
    left: auto;
    margin-bottom: 0;
    margin-top: 7px;
    padding: 2px 5px;
    position: absolute;
    right: 0;
    z-index: 9999;
    }
    .search-query:focus + button {
    z-index: 3;   
    }
    .all_conversation button {
    background: #f5f3f3 none repeat scroll 0 0;
    border: 1px solid #dddddd;
    height: 38px;
    text-align: left;
    width: 100%;
    }
    .all_conversation i {
    background: #e9e7e8 none repeat scroll 0 0;
    border-radius: 100px;
    color: #636363;
    font-size: 17px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    width: 30px;
    }
    .all_conversation .caret {
    bottom: 0;
    margin: auto;
    position: absolute;
    right: 15px;
    top: 0;
    }
    .all_conversation .dropdown-menu {
    background: #f5f3f3 none repeat scroll 0 0;
    border-radius: 0;
    margin-top: 0;
    padding: 0;
    width: 100%;
    }
    .all_conversation ul li {
    border-bottom: 1px solid #dddddd;
    line-height: normal;
    width: 100%;
    }
    .all_conversation ul li a:hover {
    background: #dddddd none repeat scroll 0 0;
    color:#333;
    }
    .all_conversation ul li a {
      color: #333;
      line-height: 30px;
      padding: 3px 20px;
    }
    .member_list .chat-body {
    margin-left: 47px;
    margin-top: 0;
    }
    .top_nav {
    overflow: visible;
    }
    .member_list .contact_sec {
    margin-top: 3px;
    }
    .member_list li {
    padding: 6px;
    }
    .member_list ul {
    border: 1px solid #dddddd;
    }
    .chat-img img {
    height: 34px;
    width: 34px;
    }
    .member_list li {
    border-bottom: 1px solid #dddddd;
    padding: 6px;
    }
    .member_list li:last-child {
    border-bottom:none;
    }
    .member_list {
    height: 380px;
    overflow-x: hidden;
    overflow-y: auto;
    }
    .sub_menu_ {
      background: #e8e6e7 none repeat scroll 0 0;
      left: 100%;
      max-width: 233px;
      position: absolute;
      width: 100%;
    }
    .sub_menu_ {
      background: #f5f3f3 none repeat scroll 0 0;
      border: 1px solid rgba(0, 0, 0, 0.15);
      display: none;
      left: 100%;
      margin-left: 0;
      max-width: 233px;
      position: absolute;
      top: 0;
      width: 100%;
    }
    .all_conversation ul li:hover .sub_menu_ {
      display: block;
    }
    .new_message_head button {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
    }
    .new_message_head {
      background: #f5f3f3 none repeat scroll 0 0;
      float: left;
      font-size: 13px;
      font-weight: 600;
      padding: 18px 10px;
      width: 100%;
    }
    .message_section {
      border: 1px solid #dddddd;
    }
    .chat_area {
      float: left;
      height: 300px;
      overflow-x: hidden;
      overflow-y: auto;
      width: 100%;
    }
    .chat_area li {
      padding: 14px 14px 0;
    }
    .chat_area li .chat-img1 img {
      height: 40px;
      width: 40px;
    }
    .chat_area .chat-body1 {
      margin-left: 50px;
    }
    .chat-body1 p {
      background: #fbf9fa none repeat scroll 0 0;
      padding: 10px;
    }
    .chat_area .admin_chat .chat-body1 {
      margin-left: 0;
      margin-right: 50px;
    }
    .chat_area li:last-child {
      padding-bottom: 10px;
    }
    .message_write {
      background: #f5f3f3 none repeat scroll 0 0;
      float: left;
      padding: 15px;
      width: 100%;
    }

    .message_write textarea.form-control {
      height: 70px;
      padding: 10px;
    }
    .chat_bottom {
      float: left;
      margin-top: 13px;
      width: 100%;
    }
    .upload_btn {
      color: #777777;
    }
    .sub_menu_ > li a, .sub_menu_ > li {
      float: left;
      width:100%;
    }
    .member_list li:hover {
      background: #428bca none repeat scroll 0 0;
      color: #fff;
      cursor:pointer;
    }
  </style>
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <!-- for chatbox end -->
  <style>
    .file {
        visibility: hidden;
        position: absolute;
    }
  </style>
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="../../images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="../../images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-nfunction  d-lg-block ms-0">
            <!-- <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
            <h3 class="welcome-sub-text">Your performance summary this week </h3> -->
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" >
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_employees') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Employee</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('time_tracker') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Time Tracker</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_tasks') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Employee Task</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('todolist') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Employee To-Do List</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_client') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Clients</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_projects') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Projects</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('all_users') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="#sectionA" class="nav-link active" data-toggle="tab">Section A</a>
          </li>
          <li class="nav-item">
              <a href="#sectionB" class="nav-link" data-toggle="tab">Section B</a>
          </li>

          <li class="nav-item nav-category">UI Elements</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">UI Elements</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Forms and Datas</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="menu-icon mdi mdi-layers-outline"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">pages</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">help</li>
          <li class="nav-item">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
              <i class="menu-icon mdi mdi-file-document"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-6">
              <div class="bg-white mt-5 mb-5">
                <div class="row">
                  <div class="justify-content-between align-items-center col-md-12 mt-5" >
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">Files</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 message_section">
              
              <!--chat_sidebar-->
                <div class="row">
                  <div class="new_message_head justify-content-between">
                    <div class="pull-left">
                      <button>
                        <i class="fa fa-plus-square-o" aria-hidden="true"></i> Broadcast </button>
                    </div>
                  </div>
                  <!--new_message_head-->
                  <div class="chat_area">
                    <ul class="list-unstyled">
                      @foreach($project_comments as $project_comment)
                        @php
                          $CreatedAt=$project_comment->created_at;
                          if($CreatedAt!="" && $CreatedAt!="NULL" && $CreatedAt!="0000-00-00 00:00:00")
                          {
                            $created_at = date("d-m-Y h:i A",strtotime($CreatedAt));
                          }
                          else
                          {
                            $created_at ="";
                          }
                          $login_user_id = Auth::user()->id;
                          if($login_user_id == $project_comment->user_id)
                          {
                            $rightSideClass = "admin_chat";
                            $pull_img = "pull-right";
                            $pull_date = "pull-left";
                            $text_align ="right";
                          }
                          else
                          {
                            $rightSideClass="";
                            $pull_img = "pull-left";
                            $pull_date = "pull-right";
                            $text_align ="left";
                          }
                          $image_path = $project_comment->user_details->image_path;
                          if($image_path!="" && $image_path!="null" )
                          {
                              $image = asset('images/user')."/".$image_path;
                              
                          }
                          else
                          {
                            
                              $image = asset('images/user')."/default.png";
                          }
                          
                        @endphp
                        @if($project_comment->comment!="" && $project_comment->comment!="null")
                        <li class="left clearfix {{$rightSideClass}}">
                          <span class="chat-img1 {{$pull_img}}">
                            <img src="{{$image}}" alt="User Avatar" class="img-circle" style="border-radius: 100%;">
                          </span>
                          <div class="chat-body1 clearfix">
                            <p style="margin-bottom:0px; text-align:{{$text_align}}" >{{$project_comment->comment}}</p>
                            <div class="chat_time {{$pull_date}}" style="color: darkgray;">{{$created_at}}</div>
                          </div>
                        </li>
                        @endif
                      @endforeach
                    </ul>
                  </div>
                  <!--chat_area-->
                  
                  <div class="message_write">
                    <form action="{{ route('project_comment_add') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      <textarea class="form-control" placeholder="type a Comment Hear.." name="comment"></textarea>
                      <input type="hidden" class="form-control" value="{{$project_id}}" name="project_id">

                      <div class="clearfix"></div>
                      <div class="chat_bottom">
                        <a href="#" class="pull-left upload_btn">
                          <i class="fa fa-cloud-upload" aria-hidden="true"></i> Add Files 
                        </a>
                        <button class="pull-right btn btn-success" type="submit" >Send</button>
                      </div>
                    </form>
                  </div>
                  
                </div>
              <!--message_section-->
              <!-- <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                  <div class="justify-content-between align-items-center col-md-12 mt-5" >
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">Broadcast</h4>
                    <form action="{{ route('project_comment_add') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                      <div class="row mt-2">
                        <div class="col-md-9">
                          <input type="text" class="form-control" placeholder="Write Your Comment Hear.." name="comment">
                          <input type="hidden" class="form-control" value="1" name="project_id">

                          <span style="color:red">@error('comment'){{$message}}@enderror</span>
                        </div>
                        <div class="col-md-3">
                          <button class="btn btn-primary profile-button" type="submit" >Send</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class=" rounded bg-white mt-2 mb-2">
                <div class="row">
                  <div class="justify-content-between align-items-center col-md-12 mt-5" >
                    <h4 class="text-center" style="font-size: 40px;color:#404040;">Project's Task List</h4>
                    <table class="table table-striped table-responsive" style="display: inline-table!important;">
                      <thead>
                        <tr>
                          <th style="width:10%">Action</th>
                          <th style="width:5%">Sr. No.</th>
                          <th>Project</th>
                          <th>Task Title</th>
                          <th>Task Description</th>
                          <th>Task Assign To</th>
                          <th>priority</th>
                          <th>Due Date</th>
                          <th>Task Created By</th>
                          <th>Status</th>
                          <th>details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- {{$count=0}} -->
                        <!-- @define $count = 0 -->
                        
                        @php
                        $count = 0
                        
                        @endphp
                        @foreach($tasks as $task)
                          @php
                            $assign_to = $task->assign_to;
                            $assign_to_ids = explode(",",$assign_to); //converted to array
                            if($task->status==0 && $task->priority==1)
                            {
                              $color="#95eb95";
                            }
                            else if($task->status==0 && $task->priority==2)
                            {
                              $color="#83c3db";
                            }
                            else if($task->status==0 && $task->priority==3)
                            {
                              $color="#df9f9f";
                            }
                            else
                            {
                              $color="ivory";
                            }
                            
                          @endphp
                          <tr style="background-color:{{$color}}">
                            <td>
                              @if($task->status==0)
                              <button id="startButton" data-id="{{$task->id}}" title="Start" class="btn btn-sm btn-info" type="button" onClick="task_start({{$task->id}})">
                                  Start</i>
                              </button>
                              @endif
                              @if($task->status==1)
                              <button id="stopButton" data-id="{{$task->id}}" title="Stop" class="btn btn-sm btn-secondary"  type="button" onClick="task_stop({{$task->id}})">
                                  Stop</i>
                              </button>
                              @endif
                              </br></br>
                              @if($task->status!=4 && $task->status!=3 && (Auth::user()->type==1 || Auth::user()->type==2 ))
                              <button id="completeButton" data-id="{{$task->id}}"  title="Complete" class="btn btn-sm btn-success" type="button" onClick="task_complete({{$task->id}})">
                                  Complete</i>
                              </button>
                              @endif
                              @if($task->status!=4 && $task->status!=3 && (Auth::user()->type==1 || Auth::user()->type==2 ))
                              <button id="cancelButton" data-id="{{$task->id}}" title="Cancel" class="btn btn-sm btn-danger" type="button" onClick="task_cancel({{$task->id}})">
                                  Cancel</i>
                              </button>
                              @endif
                            </td>
                            <td>{{++$count}}</td>
                            <td>
                              @if($task->project_id!=0)
                                {{$task->project_name->title}}
                              @endif
                            </td>
                            <td>{{$task->task_title}}</td>
                            <td>{{$task->task_desc}}</td>
                            <td>
                              @php
                                $assign_to_ids = $task->assign_to;
                                $assign_to_ids_arrays = (explode(",",$assign_to_ids));
                              @endphp
                              @foreach($assign_to_ids_arrays as $assign_to_ids_array)
                                @php
                                  $result = app('app\Http\Controllers\DashboardController')->get_assignto_names_from_ids($assign_to_ids_array);
                                  $json_toArray = json_decode($result,true);
                                  $array_names = array_map(function ($array) {return $array['name'];}, $json_toArray);
                                  $assign_to_names = (implode(",",$array_names));
                                @endphp
                                {{$assign_to_names}}<br>
                              @endforeach
                            </td>
                            <td>
                              @php
                                $PriorityArray = array("0"=>"","1"=>"Low","2"=>"Medium","3"=>"High");
                              @endphp
                              {{$PriorityArray[$task->priority]}}
                            </td>
                            <td>
                            @php
                                $duedate=$task->due_date;
                                if($duedate!="" && $duedate!="NULL" && $duedate!="0000-00-00"  && $duedate!="1970-01-01")
                                {
                                  echo date("d-m-Y",strtotime($duedate));
                                }
                                $StatuaArray = array("0"=>"pendding","1"=>"Start","2"=>"Stop","3"=>"Completed","4"=>"Cancel");
                            @endphp
                            </td>
                            <td>{{$task->user_name->name}}</td>
                            <td>{{$StatuaArray[$task->status]}}</td>
                            @php
                              $StartTime=$task->start_time;
                              if($StartTime!="" && $StartTime!="NULL" && $StartTime!="0000-00-00 00:00:00")
                              {
                                $Start_Time = date("d-m-Y h:i A",strtotime($StartTime));
                                $start_t = $StartTime;
                              }
                              else
                              {
                                $Start_Time ="";
                                $start_t ='0';

                              }
                              $StopTime=$task->stop_time;
                              if($StopTime!="" && $StopTime!="NULL" && $StopTime!="0000-00-00 00:00:00")
                              {
                                $Stop_Time = date("d-m-Y h:i A",strtotime($StopTime));
                                $stop_t = $StopTime;
                              }
                              else
                              {
                                $Stop_Time ="";
                                $stop_t ='0';

                              }
                              $start = strtotime($start_t);
                              $end = strtotime($stop_t);
                              $totalSecondsDiff = abs($start-$end);

                              $days = floor($totalSecondsDiff/86400);
                              $hours = floor(($totalSecondsDiff - $days*86400) / 3600);
                              $minutes = floor(($totalSecondsDiff / 60) % 60);
                              $seconds = floor($totalSecondsDiff % 60);
                            @endphp
                            <td>
                              Start : {{$Start_Time}} &nbsp;&nbsp;
                              <br><br>
                              Stop : {{$Stop_Time}} &nbsp;&nbsp;
                              <br><br>
                              @if(($StartTime!="" && $StartTime!="NULL" && $StartTime!="0000-00-00 00:00:00") && ($StopTime!="" && $StopTime!="NULL" && $StopTime!="0000-00-00 00:00:00") )
                              Diff : {{$hours}} Hours {{$minutes}} Minutes {{$seconds}} Seconds &nbsp;&nbsp;
                              @else
                              Diff : &nbsp;&nbsp; - &nbsp;&nbsp;
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <!-- <script src="/js/vendor.bundle.base.js"></script> -->
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- <script src="/chart.js/Chart.min.js"></script> -->
  <!-- <script src="/bootstrap-datepicker/bootstrap-datepicker.min.js"></script> -->
  <!-- <script src="/progressbar.js/progressbar.min.js"></script> -->

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!-- <script src="js/off-canvas.js"></script> -->
  <!-- <script src="js/hoverable-collapse.js"></script> -->
  <!-- <script src="js/template.js"></script> -->
  <!-- <script src="js/settings.js"></script> -->
  <!-- <script src="js/todolist.js"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="js/jquery.cookie.js" type="text/javascript"></script> -->
  <!-- <script src="js/dashboard.js"></script> -->
  <!-- <script src="js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js" integrity="sha512-xIPqqrfvUAc/Cspuj7Bq0UtHNo/5qkdyngx6Vwt+tmbvTLDszzXM0G6c91LXmGrRx8KEPulT+AfOOez+TeVylg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- for chatbox start-->
  <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
  <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
  <!------ Include the above in your HEAD tag ---------->

  <script src="https://use.fontawesome.com/45e03a14ce.js"></script>
  <!-- for chatbox end-->   

</body>

</html>
<script>
  // $("#assign_to").select2();
  // $("#assign_to").fselect();
    $(document).on("click", ".browse", function() {
    var file = $(this).parents().find(".file");
    file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    });
    // $('#startButton').on('click', function(){
    //   console.log("Function called");
    //   var user_id = `{{Auth::user()->id}}`;
    //   let id = $(this).attr('data-id');
    //   task_start(user_id,id);

    // })
    function task_start(id){

      var user_id = `{{Auth::user()->id}}`;
      var tdate = new Date();
      var dd = tdate.getDate(); //yields day
      var MM = tdate.getMonth(); //yields month
      var yyyy = tdate.getFullYear(); //yields year
      var hh = tdate.getHours();
      var ii = tdate.getMinutes();
      var ss = tdate.getSeconds();

      var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

      var url = `{{ route('task_start') }}`;

      // console.log("Function called",date);
      // console.log("Task Id",id);
      const form_data = new FormData();
      form_data.append("id",id);
      form_data.append("user_id",user_id);
      form_data.append("start_time",date);

      axios.post(url,form_data).then(response => {
        
        console.log(response);
        // `{{ route('time_tracker') }}`;
        // window.location.href(`{{ route('time_tracker') }}`);
        location.reload();
      }).catch(error=>{
        // console.log(error);
      });
    }
    function task_stop(id){
      var user_id = `{{Auth::user()->id}}`;
      var tdate = new Date();
      var dd = tdate.getDate(); //yields day
      var MM = tdate.getMonth(); //yields month
      var yyyy = tdate.getFullYear(); //yields year
      var hh = tdate.getHours();
      var ii = tdate.getMinutes();
      var ss = tdate.getSeconds();

      var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

      var url = `{{ route('task_stop') }}`;
      // console.log("Function called",date);
      // console.log("User Id",user_id);
      const form_data = new FormData();
      form_data.append("id",id);
      form_data.append("user_id",user_id);
      form_data.append("stop_time",date);
      axios.post(url,form_data).then(response => {
        // console.log(response);
        // `{{ route('time_tracker') }}`;
        // window.location.href(`{{ route('time_tracker') }}`);
        location.reload();
      }).catch(error=>{
        // console.log(error);
      });
      }

      function task_complete(id){
        var user_id = `{{Auth::user()->id}}`;
        var tdate = new Date();
        var dd = tdate.getDate(); //yields day
        var MM = tdate.getMonth(); //yields month
        var yyyy = tdate.getFullYear(); //yields year
        var hh = tdate.getHours();
        var ii = tdate.getMinutes();
        var ss = tdate.getSeconds();

        var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

        var url = `{{ route('task_complete') }}`;
        // console.log("Function called",date);
        // console.log("User Id",user_id);
        const form_data = new FormData();
        form_data.append("id",id);
        form_data.append("user_id",user_id);
        form_data.append("complete_time",date);
        axios.post(url,form_data).then(response => {
          // console.log(response);
          // `{{ route('time_tracker') }}`;
          // window.location.href(`{{ route('time_tracker') }}`);
          location.reload();
        }).catch(error=>{
          // console.log(error);
        });
      }

      function task_cancel(id)
      {
        var user_id = `{{Auth::user()->id}}`;
        var tdate = new Date();
        var dd = tdate.getDate(); //yields day
        var MM = tdate.getMonth(); //yields month
        var yyyy = tdate.getFullYear(); //yields year
        var hh = tdate.getHours();
        var ii = tdate.getMinutes();
        var ss = tdate.getSeconds();

        var date =yyyy + "-" +( MM+1) + "-" + dd + "-" + hh + "-" + ii + "-" + ss;

        var url = `{{ route('task_cancel') }}`;
        // console.log("Function called",date);
        // console.log("User Id",user_id);
        const form_data = new FormData();
        form_data.append("id",id);
        form_data.append("user_id",user_id);
        form_data.append("cancel_time",date);
        axios.post(url,form_data).then(response => {
          // console.log(response);
          // `{{ route('time_tracker') }}`;
          // window.location.href(`{{ route('time_tracker') }}`);
          location.reload();
        }).catch(error=>{
          // console.log(error);
        });
      }
  $(document).ready(function (){
    // console.log("Page Loaded");
    
    // $('#stopButton').on('click', function(){
    //   var user_id = `{{Auth::user()->id}}`;
    //   task_stop(user_id);
    // })
    // $('#completeButton').on('click', function(){
    //   var user_id = `{{Auth::user()->id}}`;
    //   task_complete(user_id);
    // })
    // $('#cancelButton').on('click', function(){
    //   var user_id = `{{Auth::user()->id}}`;
    //   task_cancel(user_id);
    // })
    
    
  });
</script>

