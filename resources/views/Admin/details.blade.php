<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>E-pass Admin Portal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<style>
      /* body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 500px;
      } */
      .card {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 300px;
        padding: 50px 0;
      }
      .card-img-top {
        width: 200px;
        height: 200px;
        border-radius: 50%;
      }
    </style>

<body>
<div class="main-wrapper">
        <div class="header">
			<div class="header-left">
				<a href="/index" class="logo">
					<img src="assets/img/bookinglogo.png" width="35" height="35" alt=""> <span>E-Pass Admin Portal</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="/Doctorprofile">My Profile</a>
                        <a class="dropdown-item" href="/editprofile">Edit Profile</a> -->
                        <!-- <a class="dropdown-item" href="/login">Logout</a> -->

                        @if(Auth::user())
                        <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        @endif
                    </div>
                </li>
            </ul> 
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main Navigation</li>
                        <li >
                            <a href="/index"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="active" >
                            <a href="/showdetails"><i  class="fa fa-ticket"></i> <span>Booking</span></a>
                        </li>
						<li>
                        <a href="/payment"><i class="fa fa-user"></i> <span>Payment</span></a>
                        </li>

                        <!-- <li class="submenu">
                            <a href="#"><i class="fa fa-calendar-check-o"></i><span>Appointments</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="/addappointment">Add Appointments</a></li>
                                <li><a href="/updateappointment">Update Appointments</a></li>
                            </ul>
                        </li> -->
                        
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Traveler Details</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                        @if(isset($details))
                            <div class="row">
                                <div class="col-md-6">
                                @foreach($details as $user)

                                    <ul class="personal-info">

                                    <li>
                                            <span class="title">Ticket ID:</span>
                                            <span class="text">{{ $user->TicketID }} </span>
                                        </li>
                                   
                                        <li>
                                            <span class="title">Name:</span>
                                            <span class="text">{{ $user->fname }} {{ $user->lname }}</span>
                                        </li>

        
                                        <li>
                                            <span class="title">Contact Number:</span>
                                            <span class="text">{{ $user->phone }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text">{{$user->email}}</span>
                                        </li>


                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{$user->address}} ,{{$user->city}},{{$user->state}}, {{$user->zipcode}}</span>
                                        </li>

                                        <li>
                                            <span class="title">Date of Visit:</span>
                                            <span class="text">{{ $user->date }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Document:</span>
                                            <span class="text">{{ $user->document }}</span>
                                        </li>

                                        </div>

                                        <div class="col-md-6">
                 

                                    <ul class="personal-info">

                                        <li>
                                            <span class="title">Source:</span>
                                            <span class="text">{{ $user->Source }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Destination:</span>
                                            <span class="text">{{ $user->Destination }}</span>
                                        </li>
                                        <li>
                                            <span class="title">No. of Adults:</span>
                                            <span class="text">{{ $user->adults_no }}</span>
                                        </li>
                                        <li>
                                            <span class="title">No. of children:</span>
                                            <span class="text">{{ $user->child_no }}</span>
                                        </li>

                                        <li>
                                            <span class="title">Adults Details:</span>
                                            <span class="text">{{ $user->aname }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Child details:</span>
                                            <span class="text">{{ $user->cname }}</span>
                                        </li>

                                        
                                    </ul>
                                </div>
<!-- 
                                //for image -->

                                <br><br>

<!-- 
                                <img src="{{asset('storage/'.$user->document)}}" class="card-img-top" alt="..."> -->
                                <img class="card-img-top" src="{{asset('storage/app/public/images'.$user->document)}}" alt="{{$user->document}}">
                                
                                <!-- <img class="card-img-top" src="images/{{$user->document}}" alt="{{$user->document}}"> -->
<!-- 
                                <img src="{{ asset('img')}}/{{ $user->document }}" /> -->

                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>