<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\BookAmbulance;
use App\PatientSignup;


class HomeController extends Controller
{   
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // use Helper;
     
    public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();
             
        $favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first(); 
        
        View()->share('logo',$logo);
        View()->share('favicon',$favicon);

    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $banner = DB::table('banners')->where('id', 1)->first();   
        
        $cms1 = DB::table('pages')->where('id', 1)->first();
        $cms2 = DB::table('pages')->where('id', 2)->first();
        $cms3 = DB::table('pages')->where('id', 3)->first();
        $cms4 = DB::table('pages')->where('id', 4)->first();
        $cms5 = DB::table('pages')->where('id', 5)->first();

        //$products = DB::table('products')->get()->take(10);

        return view('welcome', compact('banner', 'cms1', 'cms2', 'cms3', 'cms4', 'cms5'));
    }

    public function bookAmbulance()
    { 
        $inner_banner = DB::table('inner_banners')->where('id', 1)->first();   

        $cms1 = DB::table('pages')->where('id', 6)->first();

        return view('book-ambulance', compact('inner_banner', 'cms1'));
    }

    public function covidTest()
    { 
        $inner_banner = DB::table('inner_banners')->where('id', 2)->first();

        $states=DB::table('states')->get();

        return view('covid-test', compact('inner_banner', 'states'));
    }

    public function patientSignup()
    { 
        $inner_banner = DB::table('inner_banners')->where('id', 3)->first();

        $cms1 = DB::table('pages')->where('id', 7)->first();

        return view('patient-signup', compact('inner_banner', 'cms1'));
    }

    public function ticket()
    { 
         $inner_banner = DB::table('inner_banners')->where('id', 3)->first();
        return view('ticket', compact('inner_banner'));
    }

    public function bookAmbulanceSubmit(Request $request)
    {
         $this->validate($request, [
            'facility_name' => 'required',
            'patient_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'date_of_transport' => 'required',
            'time_of_transport' => 'required',
            
        ]);

        $bookAmbulance = new BookAmbulance;
        $bookAmbulance->facility_name = $request->facility_name;
        $bookAmbulance->patient_name = $request->patient_name;
        $bookAmbulance->address = $request->address;
        $bookAmbulance->city = $request->city;
        $bookAmbulance->state = $request->state;
        $bookAmbulance->zip = $request->zip;
        $bookAmbulance->phone = $request->phone;
        $bookAmbulance->email = $request->email;
        $bookAmbulance->date_of_transport = $request->date_of_transport;
        $bookAmbulance->time_of_transport = $request->time_of_transport;
        $bookAmbulance->save();
            
        Session::flash('message', 'Your ambulance booking request has been received!'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }

    public function patientSignupSubmit(Request $request)
    {

         $this->validate($request, [
            'last_name' => 'required',
            'first_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'date_of_birth' => 'required',
            'phone' => 'required',
            'driver_liscence' => 'required',
        ]);

             $ticket_number = rand(1111111111,9999999999);

        $patientSignup = new PatientSignup;
        $patientSignup->last_name = $request->last_name;
        $patientSignup->first_name = $request->first_name;
        $patientSignup->address = $request->address;
        $patientSignup->city = $request->city;
        $patientSignup->state = $request->state;
        $patientSignup->zip = $request->zip;
        $patientSignup->date_of_birth = $request->date_of_birth;
        $patientSignup->phone = $request->phone;
        $patientSignup->ssn = $request->ssn;
        $patientSignup->insurance_company_name = $request->insurance_company_name;
        $patientSignup->insurance_number = $request->insurance_number;
        $patientSignup->group_number = $request->group_number;
        //$patientSignup->insurance_card = $request->insurance_card;
        //$patientSignup->driver_liscence = $request->driver_liscence;
        $patientSignup->type = $request->type;
        $patientSignup->state_id = $request->state_id;
        $patientSignup->ticket_number = $ticket_number;

        if ($request->hasFile('insurance_card')) {
            
            // New Code
            $file = $request->file('insurance_card');
            $folderName = '/uploads/patientSignup/'.$request->first_name.' '.$request->last_name;
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('insurance_card')->getClientOriginalName();
            $fileExt = $request->file('insurance_card')->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);
            $patientSignup['insurance_card'] = 'uploads/patientSignup/'.$request->first_name.' '.$request->last_name.'/'.$safeName;
            // New Code
            }

            if ($request->hasFile('driver_liscence')) {
            
            // New Code
            $file = $request->file('driver_liscence');
            $folderName = '/uploads/patientSignup/'.$request->first_name.' '.$request->last_name;
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('driver_liscence')->getClientOriginalName();
            $fileExt = $request->file('driver_liscence')->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);
            $patientSignup['driver_liscence'] = 'uploads/patientSignup/'.$request->first_name.' '.$request->last_name.'/'.$safeName;
            // New Code
            }

        $patientSignup->save();
            
        Session::flash('message', 'Your ambulance booking request has been received!'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('ticket')->with(['ticket_number' => $patientSignup->ticket_number]);
    }
    

    public function contactUsSubmit(Request $request)
    {
        $inquiry = new inquiry;
        $inquiry->inquiries_fname = $request->fname;
        $inquiry->inquiries_lname = $request->lname;
        $inquiry->inquiries_email = $request->email;
       // $inquiry->inquiries_phone = $request->phone;
        $inquiry->extra_content = $request->message;
        $inquiry->save();
            
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }

    public function newsletterSubmit(Request $request)
    {
        $is_email = newsletter::where('newsletter_email',$request->email)->count();
        
        if($is_email == 0) {
            
        $inquiry = new newsletter;
        //$inquiry->newsletter_name = $request->name;
        $inquiry->newsletter_email = $request->email;
        //$inquiry->newsletter_message = $request->comment;
        $inquiry->save();
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
        
        } else {
            Session::flash('flash_message', 'email already exists'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/');
        }
        
    }
   
}
