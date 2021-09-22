<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Auth;
use Cookie;
use Illuminate\Http\Request;
use Validator;
use Input;
use Session;
use DB;
use Image;
use File;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Career;
use App\Models\Jobs;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\HomePage;
use Mail;

class ContactController extends Controller
{
	//====================================

	public function contact_us()
	{
          $data['setting'] = Setting::first();
		return view('front/contact_us',$data);
	}

	//====================================

	public function contactSave(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name'       => 'required',
				'email'      => 'required',
				'contact_no' => 'required',
				'subject' 	 => 'required',
				'message' 	 => 'required',
				'captcha' => 'required|captcha',
				
       
			]);
			
			if ($validator->fails()) { 	
	            return redirect('contactus')
	                        ->withErrors($validator)
	                        ->withInput();
			} else { 		        
	        	$contact = new Contact;
		        $contact->name = $request->name;
		        $contact->email = $request->email;
		        $contact->contact_no = $request->contact_no;
		        $contact->subject = $request->subject;
		        $contact->message = $request->message;
	        	$contact->save();
	           
	            $setting = Setting::first();
				$data = array(
		            'name' => $request->name,
		            'email' => $request->email,
		            'contact_no' => $request->contact_no,
		            'subject' => $request->subject,
		            'email_message' => $request->message,
		            'title' => 'D&N Contact',
		            'to' => $setting->email
	        	);
			
	      	Mail::send('front.emails.emailContact', $data, function ($message) use ($data) {
		    	$message->from($data['email'], 'D&N Group Contact');
				$message->to($data['to']);
		   		$message->subject('D&N Group::Contact!');
	    		});

      		if (Mail::failures()) {
			       	 session()->flash('message', 'Mail not sent!');
					 Session::flash('alert-type', 'error'); 
					return redirect('contactus');
		     	}

	        	//==== end mail script ======
				session()->flash('message', 'Contact added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('contactus');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during mail sent');
            Session::flash('alert-type', 'error');
           	return redirect('contactus');  
        }
	}
	
	
	
	 public function career()
	{
          $data['job'] = Jobs::get();
          $data['id'] = 'sss';
		return view('front/career',$data);
	}

	//====================================

	public function careerSave(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name'       => 'required',
				'email'      => 'required',
				'contact_no' => 'required',
				
				
				'job' 	 => 'required',
			]);
			if ($validator->fails()) { 	
	            return redirect('job/all')
	                        ->withErrors($validator)
	                        ->withInput();
			} else { 


			    $image = $request->file('cv');
				//dd($product); die;
				if(!empty($image)) {
		        	$imagename = time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/service/thumbnail');
			        
			      
			        $image->move($destinationPath, $imagename);

			        

        		

				 } else {
					$imagename = '';
				 }
						        
	        	$career = new Career;
		        $career->name = $request->name;
		        $career->email = $request->email;
		        $career->contact_no = $request->contact_no;
		        $career->cv = $imagename;
		        $career->message = $request->message;
		        $career->job = $request->job;

                $career->address = $request->address;
                $career->dob = $request->dob;
                $career->experience = $request->experience;
                $career->machine_experience = $request->machine_experience;
                $career->your_self = $request->your_self;

	        	$career->save();
	            $setting = Setting::first();
				$data = array(
		            'name' => $request->name,
		            'email' => $request->email,
		            'contact_no' => $request->contact_no,
		            'subject' => 'Job Application',
		            'job' => $request->job,
		             'address' => $request->address,
		             'dob' => $request->dob,
		             'experience' => $request->experience,
		             'machine_experience' => $request->machine_experience,
		             'your_self' => $request->your_self,
		             
		             'title' => 'Riddles Bros Contact',
		             'to' => $setting->email
	        	);
			
	      	Mail::send('front.emails.emailContact', $data, function ($message) use ($data) {
		    	$message->from($data['email'], 'D&N Group Contact');
				$message->to($data['to']);
		   		$message->subject('D&N Group::Contact!');
	    		});




	      	//mail send to user

           $data = array(
		            'name' => $request->name,
		            'job' => $request->job,
		            'title' => 'Riddles Bros Contact',
		            'email' => $request->email,
		            'to' => $setting->email
	        	);
			
	      	Mail::send('front.emails.emailuser', $data, function ($message) use ($data) {
		    	$message->from($data['to'], 'D&N Group Contact');
				$message->to($data['email']);
		   		$message->subject('DN Group::Job Application Form Submitted!');
	    		});





      		if (Mail::failures()) {
			       	session()->flash('message', 'Mail not sent!');
					 Session::flash('alert-type', 'error'); 
					return redirect('contactus');
		     	}

	        	//==== end mail script ======
				session()->flash('message', 'Job Apply  successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('job/all');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during mail sent');
            Session::flash('alert-type', 'error');
           	return redirect('job/all');  
        }
	}
	


	
	
	
	//====================================
     public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function privacy()
	{
          $data['privacy'] = HomePage::first();
		return view('front/privacy',$data);
	}




}
