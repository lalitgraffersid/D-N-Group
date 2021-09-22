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
use App\Models\Sponsorship;
use App\Models\SponsorshipImages;
use App\Models\AdminPermission;
use App\DataTables\SponsorshipDataTable;
use App\Helpers\AdminHelper;

class SponsorshipController extends Controller
{
    //=================================================================

	public function index(SponsorshipDataTable $dataTable)
	{
		
         

		return $dataTable->render('admin/sponsorship/index');
	}

	//=================================================================
   


   public function add(Request $request)
	{
		$data['result'] = Sponsorship::find($request->id);
		return view('admin/sponsorship/add',$data);
	}


	public function edit($id)
	{
		$data = array();
		$data['result'] = Sponsorship::find($id);
		$data['images'] = SponsorshipImages::where('sponsorship_id',$id)->get();

		return view('admin/sponsorship/edit',$data);
	}
    
   //=================================================================

	public function update(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
				'heading' => 'required',
				'description' => 'required'
			]);
			if ($validator->fails()) { 
			            return redirect('admin/sponsorship/edit/'.$request->id)
			                        ->withErrors($validator)
			                        ->withInput();
			} else {			        
		        $data = Sponsorship::find($request->id);
		        //=====================================================
		        
		        //=====================================================
		        $data->heading = $request->heading;
		        $data->description = $request->description;
		        
		        $data->save();

		        

				session()->flash('message', 'Sponsorship updated successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/sponsorship/index');
			}
		} catch (\Exception $e) {
	        Log::error($e->getMessage());
	        session()->flash('message', 'Some error occured during save sponsorship');
            Session::flash('alert-type', 'error');
           	return redirect('admin/sponsorship/edit/'.$request->id);
        }
	}

    //===================================================

    public function imageDelete($id){
		
		try {
			$data = SponsorshipImages::find($id);

			$file1 = public_path().'/admin/clip-one/assets/sponsorship/thumbnail/'.$data->image;
			$file2 = public_path().'/admin/clip-one/assets/sponsorship/original/'.$data->image;
			File::delete($file1, $file2);

			$delete = SponsorshipImages::where('id',$id)->delete();
		
			return response()->json(['msg'=>'success']);
	    } catch (\Exception $e) {
            Log::error($e->getMessage());
		    return response()->json(['msg'=>'error']);
        }
    }







    public function save(Request $request){
                     


                    $id= $request->id;
  
                      $image = $request->file('image');

		        
					$imagename = rand('1111','9999').'_'.time().'.'.$image->getClientOriginalExtension();
			        $destinationPath = public_path('/admin/clip-one/assets/sponsorship/thumbnail');
			        
			        $img = Image::make($image->getRealPath());

			        $img->resize(100, 100, function ($constraint) {
					    $constraint->aspectRatio();
					})->save($destinationPath.'/'.$imagename);

					$destinationPath = public_path('/admin/clip-one/assets/sponsorship/original');
			        $image->move($destinationPath, $imagename);

			        $source_url = public_path().'/admin/clip-one/assets/sponsorship/original/'.$imagename;
        			$destination_url = public_path().'/admin/clip-one/assets/sponsorship/original/'.$imagename;
        			$quality = 40;

        			AdminHelper::compress_image($source_url, $destination_url, $quality);

        			$productImages = new SponsorshipImages;
        			$productImages->sponsorship_id = $id;
        			$productImages->name= $request->name;
        			$productImages->image = $imagename;
        			$productImages->save();
		        

		        session()->flash('message', 'Sponsorship Image Upload successfully');
				Session::flash('alert-type', 'success'); 
				return redirect('admin/sponsorship/index');
		        //=========================================================


 }



}
