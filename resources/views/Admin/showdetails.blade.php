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
                <div class="row">
                    <div class="col-sm-6 col-6">
                        <h4 class="page-title">Traveler Details</h4>
                    </div>

                    <div class="col-sm-6 col-6 text-right m-b-30">
                        <a href="/addticket" class="btn btn-secondary btn-rounded"><i class="fa fa-plus"></i>Book Ticket</a>
                    </div>
                </div>
                <div class="row filter-row">
                     <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <form action="/Search1" method="POST" role="search">
                       {{ csrf_field() }} 
                        <div class="form-group form-focus">
                            <label class="focus-label">Ticket ID</label>
                            <input type="text" class="form-control floating" name="q" required/>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <button type="submit" class="btn btn-success btn-block">Search</button>                                                   
                </div>
            </form>
            </div>
        </div>

        <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" >
                                <thead>
                                    <tr>
                                        <th>TicketID</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Soure</th>
                                        <th>Destination</th>
                                        <th>Date Of Visit</th>
                                        <th>Confirmation</th>
                                        <th class="text-right">Action</th>
                                        <!-- <th>Delete Feature</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->TicketID}}</td>
                                        <td>{{$user->fname}} {{$user->lname}}</td>
                                        <td>{{$user->phone}} </td>
                                        <td>{{$user->Source}}</td>
                                        <td>{{$user->Destination}}</td>
                                        <td>{{$user->date}}</td>

                                       
                                        <form action="/Bsearch" method="POST" role="search">
                                       {{ csrf_field() }} 
                                       <td class="nr">
                                        <input type="hidden" name="q" value="{{ $user->TicketID }}" />
                                        <button type="submit" class="btn btn-success btn-block" id="myButton1" onclick="replaceButtonText('myButton1', 'Approved');">Approve</button>
                                        </td>

                                        </form>
                                       
                                       
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="edit/{{ $user->id }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                       
<!-- 
                                        <td>
      <input type="button" value="Delete Row" onclick="SomeDeleteRowFunction(this);">
    </td> -->
                                    </tr>
                                    @endforeach
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="delete_appointment" class="modal fade delete-modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <img src="assets/img/sent.png" alt="" width="50" height="46">
                            <h3>Are you sure want to delete this Appointment?</h3>
                            <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 


            <div class="content">
<h2>Ticket booking details from Main Website.</h2>
<p>please try to add the details in the admin portal's booking form first and than give the confirmation by sending the mail to the traveler from admin databse.</p>
<div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                   
                                        <th>Traveler Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Source</th>
                                        <th>Destination</th>
                                        <th>Date</th>
                                        <!-- <th>Type</th> -->
                                        <th>Approval</th>
                                        <!-- <th>Delete</th> -->
                                        <th class="text-right">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- <form  id ="check" method="post" action="{{ url('amai') }}">
                                @csrf -->
                                @foreach($users2 as $book)
                                    <tr>
                                  
                                        <td class="nr">{{$book->fname}} {{$book->lname}}
                            
                                        </td>
                                        <td class="nr">{{$book->email}}
                                       
                                        </td>
                                        <td class="nr">{{$book->address}}
                                       </td>
                                        <td class="nr">{{$user->Source}}
                                        </td>
                                        <td class="nr">{{$user->Destination}}
                                        </td> 
                                        <td class="nr">{{$book->date}}
                                        </td>
                                     
                                        <!-- <td class="text-center">
                                            <div class="dropdown action-label">
                                                <a class="custom-badge status-purple dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                    New
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">New</a>
                                                    <a class="dropdown-item" href="#">Approved</a>
                                                    <a class="dropdown-item" href="#">Declined</a>
                                                </div>
                                            </div>
                                        </td> -->
                                       
        <!-- <td><button class="btn" id="gid" onclick="tgPanel(this);" >dsee</button></td> -->
                                        
                                  
                                        
                                        <form action="/Bsearch" method="POST" role="search">
                                       {{ csrf_field() }} 
                                       <td class="nr">
                                        <input type="hidden" name="q" value="{{ $book->fname }}" />
                                        <button type="submit" class="btn btn-success btn-block" id="myButton1" onclick="replaceButtonText('myButton1', 'Approved');">Approve</button>
                                        </td>

                                        </form>
                                        
                                        
                                        <!-- <td><button type="submit-btn"  data-id='4' class="myButton1">send</button></td> -->
<!-- <td><button class="use-address">Reserve</button></td> -->
                                        <!-- <td><a href = 'delete/{{ $user->id }}'>Delete</a></td> -->
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5"></i> Details</a>
                                                    <a class="dropdown-item" href='#' data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
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

    //         function SomeDeleteRowFunction(btndel) {
    // if (typeof(btndel) == "object") {
    //     $(btndel).closest("tr").remove();
    // } else {
    //     return false;

    function SomeDeleteRowFunction(o) {
     //no clue what to put here?
     var p=o.parentNode.parentNode;
         p.parentNode.removeChild(p);
    // document.getElementById("myTable").deleteRow(0);
    
    }

     </script>
</body>
</html>