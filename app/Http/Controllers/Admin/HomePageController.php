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
use App\Models\HomePage;
use App\Models\AdminPermission;
use App\DataTables\HomePageDataTable;
use App\Helpers\AdminHelper;

class HomePageController extends Controller
{
    //=================================================================

	public function index(HomePageDataTable $dataTable)
	{
		return $dataTable->render('admin/home_page/index');
	}

	//=================================================================

	public function add()
	{
		return view('admin/home_page/add');
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
				'image' => 'required',
				'type' => 'required',
			]);
			if ($validator->fails()) { 
			            return redirect('admin/home_page/add')
			                        ->withErrors($validator)
			                        ->withInput();
			} else {			        
		        $data = new HomePage;
		        //=====================================================
		        $image = $request->file('image');
				if(!empty($image)) {
		        	$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
		        	$destinationPath = public_path('/admin/clip-one/assets/brands/thumbnail');
	        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/brands/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/brands/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/brands/original/'.$imagename;
        			$quality = 40;
        			AdminHelper::compress_image($source_url, $destination_url, $quality);
        		}else{
        			$imagename = '';	
        		}
		        //=====================================================
		        $data->name = $request->name;
		        $data->type = $request->type;
		        $slug_name = Str::slug($request->name, '-');
		        $data->brand_slug = $slug_name;
		        $data->image = $imagename;
		        $data->save();

				session()->flash('message', 'Slider added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/home_page/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Slider');
            Session::flash('alert-type', 'error');
           	return redirect('admin/home_page/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = HomePage::find($id);

		return view('admin/home_page/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'name' => 'required',
			]);
			if ($validator->fails()) { 
			            return redirect('admin/home_page/edit/'.$request->id)
			                        ->withErrors($validator)
			                        ->withInput();
			} else {			        
		        $data = HomePage::find($request->id);
		        //=====================================================
		        $image = $request->file('image');
				if(!empty($image)) {
					$file1 = '/admin/clip-one/assets/brands/thumbnail/'.$data->image;
        			$file2 = '/admin/clip-one/assets/brands/original/'.$data->image;
        			File::delete($file1, $file2);

		        	$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
		        	$destinationPath = public_path('/admin/clip-one/assets/brands/thumbnail');
	        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/brands/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/brands/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/brands/original/'.$imagename;
        			$quality = 40;
        			AdminHelper::compress_image($source_url, $destination_url, $quality);
        		}else{
        			$imagename = $data->image;
        		}
		        //=====================================================
		        $data->name = $request->name;
		        $data->type = $request->type;
		        $slug_name = Str::slug($request->name, '-');
		        $data->brand_slug = $slug_name;
		        $data->image = $imagename;
		        $data->save();

				session()->flash('message', 'Slider updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/home_page/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Brand');
            Session::flash('alert-type', 'error');
           	return redirect('admin/home_page/edit/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = HomePage::find($request->id);
			$file1 = '/admin/clip-one/assets/brands/thumbnail/'.$data->image;
			$file2 = '/admin/clip-one/assets/brands/original/'.$data->image;
			File::delete($file1, $file2);
			
			HomePage::find($id)->delete();
		
			session()->flash('message', 'Slider deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/home_page/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/home_page/index');
        }
    }

    //===================================================
	
	public function status(Request $request, $id){
		
		try {
			
			$data = HomePage::find($id);
			
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
			
		
			session()->flash('message', 'Slider status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/home_page/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/home_page/index');
        }
    }

    //===================================================

}
