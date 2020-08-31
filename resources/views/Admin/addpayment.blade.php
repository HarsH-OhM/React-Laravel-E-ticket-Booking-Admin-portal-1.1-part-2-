<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>E-Pass Admin Portal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

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
                        <li >
                            <a href="/showdetails"><i  class="fa fa-ticket"></i> <span>Booking</span></a>
                        </li>
						<li class="active">
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

            <div class="col-lg-8 offset-lg-2">

<form action="/dinvoice" method="POST" >
   {{ csrf_field() }} 
   <!-- <p><strong>NOTE:-</strong> Use this searchbar to Book appointment for old patient.</p> -->
    <div class="form-group form-focus">
   
        <label class="focus-label">Ticket id</label>
        <input type="text" class="form-control floating" name="q">
    </div>

    <button type="submit" class="btn btn-success btn-block">Fetch Details

</button>
</div>
 </form>

 </div>

 @if(isset($details))
 <div class="content">

                <div class="row">
                
                    <div class="col-sm-12">
                        <h4 class="page-title">Add Payment Details</h4>
                    </div>
                </div>
                
                <div class="row">
                
                    <div class="col-sm-12">
                    @foreach( $details as $dinv)
                        <form method="POST" action="{{ url('invoicedetails')}}">
                         @csrf
                         <div class="row">
                         <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ticket Id</label>
                                        <input class="form-control" type="text" name="tid"  value="{{ $dinv->TicketID}}" readonly required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Traveler Name</label>
                                        <input class="form-control" type="text" name="tname"  value="{{ $dinv->fname}} {{ $dinv->lname}}" required>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email" value="{{ $dinv->email}}" required>
                                    </div>
                                </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="taddress" value="{{ $dinv->address}}" required>
                                            </div>
                                        </div>
                                    </div>
                            <div class="row">
                               
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Source</label>
                                        <input type="text" class="form-control" rows="3" name="Source" value="{{ $dinv->Source}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Destination</label>
                                        <input type="text" class="form-control" rows="3" name="Destination"  value="{{ $dinv->Destination}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Date of Visit <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control " type="text" name="vdate" value="{{ $dinv->date}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label> Date of Payment <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" name="pdate" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <select name="tax">
                                            <option>Select Tax</option>
                                            <option>VAT</option>
                                            <option>GST</option>
                                            <option>No Tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">

                                <div class="form-group">
                                        <label> Tax Amount <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="tamount"  required>
                                    </div>
                   
                                    </div>
                                    <div class="col-sm-6 col-md-3">

<div class="form-group">
        <label> Amount per Person  <span class="text-danger">*</span></label>
        <input class="form-control" type="text" name="pamount"  required>
    </div>

    </div>
    <div class="col-sm-6 col-md-3">

<div class="form-group">
        <label> Grand Total <span class="text-danger">*</span></label>
        <input class="form-control" type="text" name="gtotal"  required>
    </div>

    </div>

                                    </div>

                                    
    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Other Information</label>
                                                <textarea class="form-control" name="oinfo"></textarea>
                                            </div>
                                        </div>
                                    </div>
                        
                               
                           
                            <div class="text-center m-t-20">
                                <button class="btn btn-grey submit-btn">Save</button>
                            </div>
                        </form>
                        @endforeach
                    </div>
                    
                  
                </div>
                @endif
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
    <script src="assets/js/jquery-ui.min.html"></script>
    <script src="assets/js/fullcalendar.min.js"></script>
    <script src="assets/js/jquery.fullcalendar.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>