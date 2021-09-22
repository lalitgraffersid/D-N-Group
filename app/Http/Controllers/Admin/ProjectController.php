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
use App\Models\Project;
use App\Models\Projectimages;
use App\Models\AdminPermission;
use App\DataTables\ProjectDataTable;
use App\Helpers\AdminHelper;

class ProjectController extends Controller
{
    //=================================================================

	public function index(ProjectDataTable $dataTable)
	{
		return $dataTable->render('admin/project/index');
	}

	//=================================================================

	public function add()
	{
		return view('admin/project/add');
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				
			]);
			if ($validator->fails()) { 
	            return redirect('admin/projects/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {			        
		        $data = new Project;

		        //====== page product=====================================
				$image = $request->file('image');

				
      
                  

				//dd($product); die;
				if(!empty($image)) {
		        	$imagename =  rand('1111','9999').time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/project/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/project/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/project/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/project/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

				} else {
					$imagename = '';
				}
					
		        //=========================================================
		        $data->title = $request->title;
		        $data->short_description = $request->short_description;
		        $data->description = $request->description;
		        $data->image = $imagename;
		        $data->save();

		        $pid=$data->id;


               

                }
                
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
                      
                     $projectimages = new Projectimages;
                     $projectimages->project_id = $pid;
                     $projectimages->image = $imagenamee;
                     $projectimages->save();


                   }

				session()->flash('message', 'Project added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/projects/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Project');
            Session::flash('alert-type', 'error');
           	return redirect('admin/projects/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Project::find($id);
		$data['multiimage'] = Projectimages::where('project_id',$id)->get();

		return view('admin/project/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				
							]);
			if ($validator->fails()) { 
	            return redirect('admin/projects/edit/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {			        
		        $data = Project::find($request->id);

		        //====== page product=====================================
				$image = $request->file('image');
				//dd($product); die;
				if(!empty($image)) {
					$file1 = public_path().'/admin/clip-one/assets/project/thumbnail/'.$data->image;
        			$file2 = public_path().'/admin/clip-one/assets/project/original/'.$data->image;
        			// echo "<pre>";
        			// print_r($file1);die;

        			File::delete($file1, $file2);

		        	$imagename = time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/project/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/project/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/project/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/project/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

				} else {
					$imagename = $data->image;
				}
					
		        //=========================================================
		        $data->title = $request->title;
		        $data->short_description = $request->short_description;
		        
		        $data->description = $request->description;
		        $data->image = $imagename;
		        $data->save();
		        
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
                      
                     $projectimages = new Projectimages;
                     $projectimages->project_id = $data->id;
                     $projectimages->image = $imagenamee;
                     $projectimages->save();


                   }

                }
		        
		        
		        

				session()->flash('message', 'Project updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/projects/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Team');
            Session::flash('alert-type', 'error');
           	return redirect('admin/projects/edit/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Project::find($id);

			$file1 = public_path().'/admin/clip-one/assets/project/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/project/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = Project::where('id',$id)->delete();
		
			session()->flash('message', 'Project deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/projects/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/projects/index');
        }
    }

    
    public function deletemultiimage($id){
		
		try {
			$data = Projectimages::find($id);

			$file1 = public_path().'/admin/clip-one/assets/project/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/project/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = Projectimages::where('id',$id)->delete();
		
			session()->flash('message', 'Image deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/projects/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/projects/index');
        }
    }

    

     


    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = Project::find($id);
			
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
			
		
			session()->flash('message', 'Project update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/projects/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/projects/index');
        }
    }

    //===================================================

}
