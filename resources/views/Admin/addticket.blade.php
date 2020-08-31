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
                        <li class="active">
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
         
       

         <div class="bg-light"> 
         <div class="back"> 
           <br/>
 
 <div class="col-lg-8 offset-lg-2">
 
 <h4>Add Travelers Info.</h4>
 <br/>
 
 <form method="POST" action="{{ url('bookt') }}"  enctype="multipart/form-data">
  @csrf
 
 <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputfname">First Name</label>
      <input type="text" name="fname" class="form-control"   required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputlname">Last Name</label>
      <input type="text" class="form-control" name="lname"  required/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email"  required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone4">Phone</label>
      <input type="tel" class="form-control" name="phone"  required/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" placeholder="1234 Main St"  required/>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="city"  required/>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" class="form-control" name="state"  required/>
     
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" name="zip"  required/>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputsrc">From</label>
      <input type="text" class="form-control"  Placeholder="Source" name="from"  required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputdest">To</label>
      <input type="text" class="form-control" Placeholder="Destination" name="to"  required/>
    </div>
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Total no. of Adultes</label>
      <input type="number" class="form-control" name="ano"  required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Total no. of Children</label>
      <input type="number" class="form-control" name="cno"  required/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Add Adultes Name and Ages</label>
      <textarea type="text" class="form-control" name="aname"  required></textarea>
    </div>
    <div class="form-group col-md-6">
    
      <label for="inputEmail5">Add Children Name and Ages</label>
      <textarea type="text" class="form-control" name="cname"  required></textarea>
    </div> 
  </div>
 
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fileupload">Upload Document</label>
      <input type="File" name="doc"   class="form-control"   multiple required/>
    </div>
    <div class="form-group col-md-6">
      <label for="date">Date Of Visit</label>
      <input type="date" class="form-control" Placeholder="Date Of Visit" name="date"  required/>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" required/>
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Book</button>
 </form>
 <br><br>
 
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
    <script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
</body>
</html>