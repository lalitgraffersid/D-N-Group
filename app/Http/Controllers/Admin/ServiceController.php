<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Input;
use Auth;
use Cookie;
use Session;
use DB;
use Image;
use File;
use Exception;
use App\Models\Service;
use App\Models\Category;
use App\Models\Serviceimages;
use App\Models\AdminPermission;
use App\DataTables\ServiceDataTable;
use App\Helpers\AdminHelper;

class ServiceController extends Controller
{
    //=================================================================

	public function index(ServiceDataTable $dataTable)
	{
		return $dataTable->render('admin/service/index');
	}

	//=================================================================

	public function add()
	{
        
         $categories=Category::where('status',1)->get();
         
       
		
		return view('admin/service/add',['categories'=>$categories]);
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				'category' => 'required',
				
				'image' => 'required',
			]);
			if ($validator->fails()) { 
	            return redirect('admin/services/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} 
			else {			        
		        $data = new Service;

		        //====== page product=====================================
				$image = $request->file('image');
				//dd($product); die;
				if(!empty($image)) {
		        	$imagename = time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/service/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/service/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/service/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/service/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

				} else {
					$imagename = '';
				}
					
		        //=========================================================
		        $data->title = $request->title;
		        $data->category = $request->category;
		        
		        $data->description = $request->description;
		        $data->image = $imagename;
		        $data->save();
                 $sid=$data->id;
		        $imagess = $request->file('images');

                 

                if(!empty($imagess))
                {

                   foreach($imagess as $imagee){

                   	$imagenamee = rand('1111','9999').time().'.'.$imagee->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/project/thumbnail');
			        
			        $imge = Image::make($imagee->getRealPath());

			        $imge->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagenamee);

					$destinationPath = public_path('/admin/clip-one/assets/project/original');
			        $imagee->move($destinationPath, $imagenamee);

			        $source_url = public_path().'/admin/clip-one/assets/project/original/'.$imagenamee;
        			$destination_url = public_path().'/admin/clip-one/assets/project/original/'.$imagenamee;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);
                      
                     $projectimages = new Serviceimages;
                     $projectimages->service_id = $sid;
                     $projectimages->image = $imagenamee;
                     $projectimages->save();


                   }

               }
				session()->flash('message', 'Service added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/services/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Team');
            Session::flash('alert-type', 'error');
           	return redirect('admin/services/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Service::find($id);
	    $data['multiimage'] = Serviceimages::where('service_id',$id)->get();
	    
	    $data['categories'] = Category::where('status',1)->get();

		return view('admin/service/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				'category' => 'required',
				
							]);
			if ($validator->fails()) { 
	            return redirect('admin/services/edit/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {			        
		        $data = Service::find($request->id);

		        //====== page product=====================================
				$image = $request->file('image');
				//dd($product); die;
				if(!empty($image)) {
					$file1 = public_path().'/admin/clip-one/assets/service/thumbnail/'.$data->image;
        			$file2 = public_path().'/admin/clip-one/assets/service/original/'.$data->image;
        			// echo "<pre>";
        			// print_r($file1);die;

        			File::delete($file1, $file2);

		        	$imagename = time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/service/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/service/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/service/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/service/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

				} else {
					$imagename = $data->image;
				}
					
		        //=========================================================
		        $data->title = $request->title;
		        $data->category = $request->category;
		        $data->description = $request->description;
		        
		        
		        $data->image = $imagename;
		        $data->save();

                $sid=$data->id;
		        $imagess = $request->file('images');

                 

                if(!empty($imagess))
                {

                   foreach($imagess as $imagee){

                   	$imagenamee = rand('1111','9999').time().'.'.$imagee->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/project/thumbnail');
			        
			        $imge = Image::make($imagee->getRealPath());

			        $imge->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagenamee);

					$destinationPath = public_path('/admin/clip-one/assets/project/original');
			        $imagee->move($destinationPath, $imagenamee);

			        $source_url = public_path().'/admin/clip-one/assets/project/original/'.$imagenamee;
        			$destination_url = public_path().'/admin/clip-one/assets/project/original/'.$imagenamee;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);
                      
                     $projectimages = new Serviceimages;
                     $projectimages->service_id = $sid;
                     $projectimages->image = $imagenamee;
                     $projectimages->save();


                   }
 
 
                 }


				session()->flash('message', 'Service updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/services/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Team');
            Session::flash('alert-type', 'error');
           	return redirect('admin/services/edit/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Service::find($id);

			$file1 = public_path().'/admin/clip-one/assets/service/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/service/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = Service::where('id',$id)->delete();
		
			session()->flash('message', 'Service deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/services/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/services/index');
        }
    }
 


 public function imageDelete($id){
		
		try {
			$data = Serviceimages::find($id);

			$file1 = public_path().'/admin/clip-one/assets/project/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/project/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = Serviceimages::where('id',$id)->delete();
		
			session()->flash('message', 'Image deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/services/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/services/index');
        }
    }


    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = Team::find($id);
			
			if($data->status == '1')
			{
				$status = '0';
			} 
			else 
			{
				$status = '1';
			}
			$data->status = $status;
			$data->save();
			
		
			session()->flash('message', 'Team update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/team/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/team/index');
        }
    }

    //===================================================

}
