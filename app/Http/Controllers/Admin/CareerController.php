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
use App\User;
use App\Models\Contact;
use App\Models\Career;
use App\Models\AdminPermission;
use App\DataTables\CareerDataTable;
use App\Helpers\AdminHelper;

class CareerController extends Controller
{
    //=================================================================



    //===================================================

    public function delete($id){
		
		try {
			$data = Career::find($id)->delete();
		
			session()->flash('message', 'Career deleted successfully');
	        Session::flash('alert-type', 'success');

	        return redirect('admin/career/index');
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    session()->flash('message', 'Some error occured');
            Session::flash('alert-type', 'error');

          	return redirect('admin/career/index');
        }
    }
   
    public function index(CareerDataTable $dataTable)
    {
        return $dataTable->render('admin/career/index');
    }

     public function view($id)
    {
        $data['result'] = Career::find($id);

        return view('admin.career.view',$data);
    }
    

}
