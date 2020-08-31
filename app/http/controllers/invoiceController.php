<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\facades\URL;
use Illuminate\Support\facades\DB;

class invoiceController extends Controller
{
    //
    public function invoicedetails(request $request){

        // $input = $request->all(); 

        
        $numrow = DB::table('invoice')->count(); 
        $numrow++;

        $Invoice_Id = "TIC".'-'.date('Y').'-'."#INV0". $numrow;

        
        $Traveler_name = $request->input('tname');
        $TicketID = $request->input('tid');
        
        
       
        $Email = $request->input('email');
        $Tax = $request->input('tax');
        $Address = $request->input('taddress');
        $Visitdate = $request->input('vdate');
        $Paydate = $request->input('pdate');
        $Source = $request->input('Source');
        $Destination = $request->input('Destination');
     
        $Tamount = $request->input('tamount');
        $Pamount = $request->input('pamount');
      
        $Grand_total = $request->input('gtotal');
        $Other_info = $request->input('oinfo');
        
        $save = DB::insert('insert into invoice(Invoice_Id,Traveler_name,TicketID,Email,Tax,Address,Visitdate,Paydate,Source,Destination,Tamount,Pamount,Grand_total,Other_info) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$Invoice_Id,$Traveler_name,$TicketID,$Email,$Tax,$Address,$Visitdate,$Paydate,$Source,$Destination,$Tamount,$Pamount,$Grand_total,$Other_info]);
       
        if(count($save)){
            echo "<div class='form'>
            <h3>Payment details are added successfully.</h3><br/>
            <p class='link'> go back to <a href='/payment'>payment page</a></p>
            </div>";

        }else {
            "<div class='form'>
                <h3>Incorrect Details</h3><br/>
                <p class='link'>Click here to <a href='/addpayment'>try</a> again.</p>
                </div>";
        }

         


    }


    public function Invoiceshow(){

        

        $users = DB::select('select * from invoice');
        return view('Admin.payment',['users'=>$users]);
    }
}
