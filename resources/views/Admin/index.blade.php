<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title> Admin Portal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
                        <li class="active">
                            <a href="/index"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li >
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
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card member-panel">
                            <div class="card-header table-white">
                                <h4 class="card-title d-inline-block">Booked Ticket List </h4>
                                <a href="#" class="btn btn-secondary btn-rounded float-right">Save Changes</a>
                            </div>
                            <div class="card-body">
                   
                                <div class="table-responsive">

                              
                            
                                    <table class="table mb-0 new-patient-table">
                                    
                                        <tbody>
                                       
                                            <tr>
                                                <th> Name</th>
                                                <th>Ticket ID</th>
                                                <th>Source</th>
                                                <th>Destination</th>
                                                <th>Date</th>
                                            </tr>
                                            @if(isset($users))
                                            @foreach($users as $user)
                                            <tr>
                                                <td>
                                                    <h2>{{$user->fname}} {{$user->lname}}</h2>
                                                </td>
                                                <td>{{$user->TicketID}}</td>
                                                <td>{{$user->Source}}</td>
                                                <td>{{$user->Destination}}</td>
                                                <td>{{$user->date}}</td>
                                               
                                                <td><input type="checkbox" id="checkbox" name="status-checkbox" value="status"></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            
                                          
                                           
                                        </tbody>
                                       
                                    </table>
                                 
                                  
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Total Progress</h4>
                                    <!-- <span class="float-right">
                                        <ul class="chat-user-total">
                                            <li><i class="fa fa-circle current-users" aria-hidden="true"></i>Patient</li>
                                            <li><i class="fa fa-circle old-users" aria-hidden="true"></i>Appointment</li>
                                        </ul>
                                    </span> -->
                                </div>  
                                

<div class="container">
    <!-- <h1 style="text-align: center;">Charts with Laravel</h1> -->

    <br>
    {!! $chart2->html() !!}
</div>

{!! Charts::scripts() !!}
{!! $chart2->script() !!}
    
    
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Notifications</h4>
                            </div>
                            <div class="card-body">     
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="/doctors" class="text-muted">View all Notifications</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Bar Chart Representation of Total Bookings per Month </h4>
                                    <span class="float-right">
                                        <ul class="chat-user-total">
                                            <!-- <li><i class="fa fa-circle revisit" aria-hidden="true"></i>Revisit</li>
                                            <li><i class="fa fa-circle fresh" aria-hidden="true"></i>Fresh</li> -->
                                        </ul>
                                    </span>
                                </div>  
                                <br>
    {!! $chart3->html() !!}
</div>

{!! Charts::scripts() !!}
{!! $chart3->script() !!}
    
                               
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Day wise Booking Count :: Chart Representation </h4>
                                    <span class="float-right">
                                        <ul class="chat-user-total">
                                            <!-- <li><i class="fa fa-circle revisit" aria-hidden="true"></i>Revisit</li>
                                            <li><i class="fa fa-circle fresh" aria-hidden="true"></i>Fresh</li> -->
                                        </ul>
                                    </span>
                                </div>

                                <canvas id="pie-chart2" width="200" height="150px"></canvas>  
  
                            </div>
                            </div>
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
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
     <!-- javascript -->
<!--  
      <script>

     

    // first pie chart script
  $(function(){
      //get the pie chart canvas
    // chart data line would be added
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Users Count",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "New Registered Patient -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "doughnut",
        data: data,
        options: options
      });
 
  });


  
 </script> -->

 <script>

     

// 3rd pie chart script
$(function(){
  //get the pie chart canvas
  var cData = JSON.parse(`<?php echo $chart_data2; ?>`);
  var ctx = $("#pie-chart2");

  //pie chart data
  var data = {
    labels: cData.label,
    datasets: [
      {
        label: "Ticket Count",
        data: cData.data,
        backgroundColor: [
          "#DEB887",
          "#A9A9A9",
          "#DC143C",
          "#F4A460",
          "#2E8B57",
          "#1D7A46",
          "#CDA776",
        ],
        borderColor: [
          "#CDA776",
          "#989898",
          "#CB252B",
          "#E39371",
          "#1D7A46",
          "#F4A460",
          "#CDA776",
        ],
        borderWidth: [1, 1, 1, 1, 1,1,1]
      }
    ]
  };

  //options
  var options = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: " Total Booking",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    }
  };

  //create Pie Chart class object
  var chart2 = new Chart(ctx, {
    type: "doughnut",
    data: data,
    options: options
  });

});



</script>

<!-- 
<script type="text/javascript">

//

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Percentage of Old and New Patients'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>

<script type="text/javascript">

//

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Count  of Old and New Patients'
    };
    var chart = new google.visualization.BarChart(document.getElementById('pie_chart2'));
    chart.draw(data, options);
   }
  </script> --> 
</body>
</html>