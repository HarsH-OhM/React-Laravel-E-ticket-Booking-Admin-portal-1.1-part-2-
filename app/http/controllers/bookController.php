<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

use App\Bookt22;


use Illuminate\Support\Facades\Input;

use Illuminate\Support\facades\URL;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Validator;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\Mail;
use Session;

use Response;
use Carbon\Carbon;



use App\Charts\SampleChart;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class bookController extends Controller
{

    protected function storeImage(Request $request) {
        $path = $request->file('doc')->store('public/images');
        return substr($path, strlen('public/'));
      }
        
    

    public function index(request $request){


        // $cover = $request->file('doc');
        // $extension = $cover->getClientOriginalExtension();

            //    $extension = $cover->getClientOriginalExtension(); 
            //  Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
            //  $document->filename = $cover->getFilename().'.'.$extension;


        // if ($cover !== null) {
        //     echo $extension = $cover->getClientOriginalExtension(); 
        //     echo Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        //     echo $document->filename = $cover->getFilename().'.'.$extension;
        // }
       
    

        // $document = new Book();
        // $book->name = $request->name;
        // // $book->author = $request->author;
        // $documenyt->mime = $cover->getClientMimeType();
        // $document->original_filename = $cover->getClientOriginalName();
        // $document->filename = $cover->getFilename().'.'.$extension;
      

     


//         $document = Input::file('doc');
// if ($document !== null) {
//     echo $document->getClientOriginalExtension();  
// }


        $request->file('doc')->store('images');
        $request->file('doc')->extension();

        $document = $request->get('fname') . '.' . $request->file('doc')->extension();        
        $request->file('doc')->storeAs('images', $document);



    
        $numrow = DB::table('bookt1')->count(); 
        $numrow++;

        $TicketID = "TIC".'-'.date('Y').'-'."T0". $numrow;
     

        
        
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $zipcode = $request->input('zip');
        $Source = $request->input('from');
        $Destination = $request->input('to');
        $adults_no = $request->input('ano');
        $child_no = $request->input('cno');
        $aname = $request->input('aname');
        $cname = $request->input('cname');
        // $document = $request->input('doc');  
        $date = $request->input('date');

        $save = DB::insert('insert into bookt1(TicketID,fname,lname,email,phone,address,city,state,zipcode,Source,Destination,adults_no,child_no,aname,cname,document,date) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$TicketID,$fname,$lname,$email,$phone,$address,$city,$state,$zipcode,$Source,$Destination,$adults_no,$child_no,$aname,$cname,$document,$date]);
    
        if(count($save)){
            echo "<div class='form'>
            <h3> Your details are added successfully. <br>soon we will contact you with confirmation.</h3><br/>
            <p class='link'>Click here to <a href='/showdetails'>go back </a> </p>
            </div>";
        }else {
            "<div class='form'>
                <h3>Incorrect Details</h3><br/>
                <p class='link'>Click here to <a href='/addticket'>try again </a> </p>
                </div>";
        }
    }


    public function bookshow(){
        $users = DB::select('select * from bookt1');
        $users2 = DB::select('select * from bookt22');
        // return view('Admin.showdetails',['users'=>$users]);


        return View('Admin.showdetails')
        ->with(['users'=>$users], Book::all())
        ->with(['users2'=>$users2], Bookt22::all());
        }

//         public function about() {
//             return view('js.view.About');
//         }


public function mail(Request $request){

    

    Mail::send('emails.sendticket', ['request' => $request], function($data) use ($request){
        $data->from('Admin@gmail.com');
        
        $data->to($request->get('email'));
        $data->subject('Booking Details:');
        // $data->subject('Appointment Details:' . $request->date);
    });

    return response()->json(['success' => 'Your E-mail was sent! Allegedly.'], 200);

}


//index ----chart 
public function Ashow(){

    $users = DB::select('select * from bookt1');

$products2 = Book::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
$chart2 = Charts::database($products2, 'donut', 'highcharts')
            ->title('Booking Progress')
            ->elementLabel('Total Booked Tickets')
            ->dimensions(1000, 500)
            ->groupByMonth(date('Y'), true);

            
$products3 = Book::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
$chart3 = Charts::database($products3, 'bar', 'highcharts')
            ->title('Booking Progress')
            ->elementLabel('Total Booked Tickets')
            ->dimensions(1000, 500)
            ->groupByMonth(date('Y'), true);



            
//3rd  pie chart

    $record2 =  DB::table('bookt1')->select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
    ->where('created_at', '>', Carbon::today()->subDay(6))
    ->groupBy('day_name','day')
    ->orderBy('day')
    ->get();
   
       
     
        $data3 = [];
    
        foreach($record2 as $row) {
           $data3['label'][] = $row->day_name;
           $data3['data'][] = (int) $row->count;
         }
    
       $data3['chart_data2'] = json_encode($data3);


            return View('Admin.index')
            ->with(['users'=>$users], Book::all())
            ->with(['chart2' => $chart2], Book::all())
            ->with(['chart3' => $chart3], Book::all())
            ->with($data3, Book::all());


}
           

 }

