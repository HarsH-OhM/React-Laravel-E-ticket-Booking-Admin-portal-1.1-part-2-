<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUS;
use Illuminate\Support\Facades\Validator;




use Mail;
use Session;
 
class ContactUSController extends Controller
{
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function contactUS()
   {
       return view('contact-us');
   }
 
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function contactSaveData(Request $request)
   {


      

       $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required'
        ]);
 
        $user           =  ContactUS::create($request->all()); 
   
    \Mail::send('emails.contact-us',
       array(
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'phone' => $request->get('phone'),
           'user_message' => $request->get('message')
       ), function($message) use ($request)
   {

    $email = $request->input('email');
      $message->from($email);
      $message->to('gurjarhariom3114@gmail.com', 'Admin');
      $message->subject('Contact Details:');
   });
 
    // return back()->with('success', 'Thanks for contacting us!'); 

    // if(!is_null($user)) {
    //     return back()->with('success', 'Thanks for contacting us!');
    // }

    // // else return with error message
    // else {
    //     return back()->with('error', 'Whoops! some error encountered. Please try again.');
    // }

    
    return response()->json(['success' => 'Your E-mail was sent! Allegedly.'], 200);
   }

}
