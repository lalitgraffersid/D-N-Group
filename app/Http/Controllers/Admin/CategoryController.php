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
use App\Models\Category;
use App\Models\Projectimages;
use App\Models\AdminPermission;
use App\DataTables\CategoryDataTable;
use App\Helpers\AdminHelper;

class CategoryController extends Controller
{
    //=================================================================

	public function index(CategoryDataTable $dataTable)
	{
		return $dataTable->render('admin/category/index');
	}

	//=================================================================

	public function add()
	{
		return view('admin/category/add');
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				
			]);
			if ($validator->fails()) { 
	            return redirect('admin/category/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {			        
		        $data = new Category;

		        //====== page product=====================================
				$image = $request->file('image');

				
      
                  

				//dd($product); die;
				if(!empty($image)) {
		        	$imagename =  rand('1111','9999').time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/category/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/category/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/category/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/category/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

				} else {
					$imagename = '';
				}
					
		        //=========================================================
		        $data->title = $request->title;
		        
		        $data->image = $imagename;
		        $data->save();

		        session()->flash('message', 'Project added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/category/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Project');
            Session::flash('alert-type', 'error');
           	return redirect('admin/category/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Category::find($id);
		

		return view('admin/category/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				
							]);
			if ($validator->fails()) { 
	            return redirect('admin/category/edit/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {			        
		        $data = Category::find($request->id);

		        //====== page product=====================================
				$image = $request->file('image');
				//dd($product); die;
				if(!empty($image)) {
					$file1 = public_path().'/admin/clip-one/assets/category/thumbnail/'.$data->image;
        			$file2 = public_path().'/admin/clip-one/assets/category/original/'.$data->image;
        			// echo "<pre>";
        			// print_r($file1);die;

        			File::delete($file1, $file2);

		        	$imagename = time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/category/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/category/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/category/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/category/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

				} else {
					$imagename = $data->image;
				}
					
		        //=========================================================
		        $data->title = $request->title;
		        
		        $data->image = $imagename;
		        $data->save();

				session()->flash('message', 'Category updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/category/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Team');
            Session::flash('alert-type', 'error');
           	return redirect('admin/category/edit/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Project::find($id);

			$file1 = public_path().'/admin/clip-one/assets/category/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/category/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = Category::where('id',$id)->delete();
		
			session()->flash('message', 'Category deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/category/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/category/index');
        }
    }

    
    
    

     


    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = Category::find($id);
			
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
			
		
			session()->flash('message', 'Category update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/category/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/category/index');
        }
    }

    //===================================================

}
