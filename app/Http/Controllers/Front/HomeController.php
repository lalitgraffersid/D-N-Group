<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Auth;
use Cookie;
use Illuminate\Http\Request;
use Validator;
use Input;
use App\Models\User;
use App\Models\Setting;
use Session;
use DB;
use Image;
use File;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\Service;

use App\Models\Category;

use App\Models\Serviceimages;

use App\Models\Project;

use App\Models\Jobs;
use App\Models\Projectimages;
use App\Models\AboutUs;
use App\Models\AboutUsImages;

use App\Models\HomePage;

use App\Models\Team;
use App\Models\Gallery;

use App\Models\Sponsorship;
use App\Models\SponsorshipImages;

class HomeController extends Controller
{
    //====================================

	public function index()
	{

		$data['category'] = Category::get();

		$data['about'] = AboutUs::first();
	   
	    $data['slider'] = HomePage::where('type',1)->get();

	    $data['clintlogo'] = HomePage::where('type',2)->get();
	    
	   
    
	    return view('front/home/index',$data);
	}
	
	public function allservices()
	{

		$data['service'] = Category::get();
	   
	   return view('front/service/index',$data);
	}
	
	public function allproject()
	{

		$data['project'] = Project::get();
	   
	   return view('front/project/index',$data);
	}
	public function about()
	{

		$data['about'] = AboutUs::first();

		$data['aboutimages'] = AboutUsImages::get();

		
	   
	   return view('front/about/index',$data);
	}

	public function sponsorship()
	{

		
        

		$data['sponsorship'] = Sponsorship::first();

		$data['sponsorshipimages'] = SponsorshipImages::get();

		
	   
	   return view('front/sponsorship/index',$data);
	}


   

	public function team()
	{

		$data['team'] = Team::get();
	   
	   return view('front/team/index',$data);
	}
   
    	public function projectdetail($id)
	{

		$data['project'] = Project::where('id',$id)->first();

		$data['projectdetailes'] = Projectimages::where('project_id',$id)->get();
	   
	   
	      return view('front/project/details',$data);
	}
  
   	public function servicedetail($id)
	{
        
        
		$data['project'] = Service::where('category',$id)->get();
	
	     
	    
	   
	   
	      return view('front/service/details',$data);
	  }

	

    	public function gallery()
	 {

		$data['gallery'] = Gallery::get();
	   
	   return view('front/gallery/index',$data);
	 }


	 	public function alljob()
	{

		$data['job'] = Jobs::where('status',1)->orderBy('id', 'desc')->get();
	   
	   return view('front/job/index',$data);
	}


      	public function careerapply($id)
	{

     	 $data['job'] = Jobs::get();
     	 $data['id'] = $id;
     	 
	   
	   return view('front/career',$data);
	}

  

}
