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
use App\Models\Jobs;

use App\Models\AdminPermission;
use App\DataTables\JobDataTable;
use App\Helpers\AdminHelper;

class JobController extends Controller
{
    //=================================================================

	public function index(JobDataTable $dataTable)
	{
		return $dataTable->render('admin/job/index');
	}

	//=================================================================

	public function add()
	{
		return view('admin/job/add');
	}

	//=================================================================

	public function save(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				'description' => 'required',
							
			]);
			if ($validator->fails()) { 
	            return redirect('admin/jobs/add')
	                        ->withErrors($validator)
	                        ->withInput();
			} else {			        
		        $data = new Jobs;

		        //====== page product=====================================
					
		        //=========================================================
		        $data->title = $request->title;
		        
		        $data->description = $request->description;
		        
		        $data->save();
                 
			}
		         

                 

               

				session()->flash('message', 'Job added successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/jobs/index');
			
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Job');
            Session::flash('alert-type', 'error');
           	return redirect('admin/jobs/add');
        }
	}

	//=================================================================

	public function edit($id)
	{
		$data = array();
		$data['result'] = Jobs::find($id);
	   

		return view('admin/job/edit',$data);
	}

	//=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'title' => 'required',
				'description' => 'required',
				
							]);
			if ($validator->fails()) { 
	            return redirect('admin/jobs/edit/'.$request->id)
	                        ->withErrors($validator)
	                        ->withInput();
			} else {			        
		        $data = Jobs::find($request->id);

		        //====== page product=====================================
					
		        //=========================================================
		        $data->title = $request->title;
		        $data->description = $request->description;
		        
		        
		        
		        $data->save();
		        
				session()->flash('message', 'Job updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/jobs/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save Job');
            Session::flash('alert-type', 'error');
           	return redirect('admin/jobs/edit/'.$request->id);
        }
	}

	//=================================================================

	public function delete($id){
		
		try {
			$data = Jobs::find($id);

			
			$delete = Jobs::where('id',$id)->delete();
		
			session()->flash('message', 'Job deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/jobs/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/jobs/index');
        }
    }
 

	public function status(Request $request, $id){
		
		try {
			
			$data = Jobs::find($id);
			
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
			
		
			session()->flash('message', 'Status update successfully');
	        Session::flash('alert-type', 'success');
	        return redirect('admin/jobs/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured during status update');
            Session::flash('alert-type', 'error');
          return redirect('admin/jobs/index');
        }
    }
 
    //===================================================

}
