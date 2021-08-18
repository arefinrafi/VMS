<?php


namespace App\Http\Controllers;
use App\Account;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Admin;

use Illuminate\Support\Facades\DB;
use App\admin;
use App\User;
use App\Vehicle;




class AdminController extends Controller
{
    public function signin()
    {
        return view('frontend.pages.signin');
	}


	public function signup()
    {
        return view('frontend.pages.signup');
	}

	public function dashboard()
	{
	    return view('backend.dashboard');
	}

  // signup page er information database a save 
	/*public function save_user(Request $request)
   {
     $data = array();
     $data['name']=$request->name;
     $data['email']=$request->email;
     $data['pass']=$request->pass;
	 $data['re_pass']=$request->re_pass;
	 date_default_timezone_set('Asia/Dhaka');
	 $data['created_at'] = date("Y-m-d H:i:s");
	 $data['updated_at'] = date("Y-m-d H:i:s");

	 // Unique Email
	 $adminsCount = DB::table('admins')->where('email',$data['email'])->count();

	 if($adminsCount>0){
	 	        Session::put('message','   Email Already Exist !!');
	         	return Redirect::to('/signup');
	 }

    DB::table('admins')->insert($data);
    Session::put('message','   Registration Complete !!');
     return redirect::to('/signin');
 	}
*/
 	// database er stored info diye login 

 	public function login_user(Request $request)
 	{
 		 $name = $request->input('name');
 		 $pass = $request->input('pass');
 		
 		 $checkLogin=DB::table('admins')->where(['name'=>$name,'pass'=>md5($pass)])->first();

 		 if(count((array)($checkLogin)) > 0) {
 		     $request->Session()->put('userid',$checkLogin->id);
 		     $request->Session()->put('name',$name);
 		     return Redirect::to('backend/dashboard');
 		 } else {
 		     Session::put('message','   Incorrect Email or Password!!');
 		     return Redirect::to('/signin');
 		 }
 	}


 	public function logout(Request $request){
 		if($request->Session()->has('name')){
 		    $request->Session()->flush();
 		    return Redirect::to('/signin');
 		}
 	}


	   //  public function viewAdmins(){
    // 	$admins = Admin::get();
    // 	$admins = json_decode(json_encode($admins));
    // 	echo "<pre>"; print_r($admins);die;
    // 	return view('backend.vehicles.add-vehicle')->with(compact('admins'));
    // }

	  public function viewAdmins($id=null){
	  	$admins = Admin::get();
	 	$vehicles = DB::table('vehicles')
                    ->join('admins','vehicles.admin_id','=','admins.id')
                    ->where ('admin_id','=', 'id')
                    ->get();

	  	//$admins = json_decode(json_encode($admins));
        //echo "<pre>"; print_r($admins);die;
	  	return view('backend.admins.view-admins')->with(compact("admins","vehicles"));
	  }

	  public function addAdmin(Request $request){
	   	if($request->isMethod('post')){
	   		$data = $request->all();
	   		$adminCount = Admin::where('name', $data['name'])->count();
	   		if($adminCount > 0){
	   			return redirect()->back()->with('flash_message_error','Admin Already Exist! please choose antoher.');
	   		}

            $emailExists = Admin::where('email', $data['email'])->count();
            if( $emailExists > 0){
                return redirect()->back()->with('flash_message_error','Email Already Exist! please choose antoher.');
            }

            if(empty($data['categories_access'])){
	   				$data['categories_access'] = 0;
            }
            if(empty($data['vehicles_access'])){
	   				$data['vehicles_access'] = 0;
            }
            if(empty($data['status'])){
	   				$data['status'] = 0;
            }

            $admin = new Admin;
            $admin->name = $data['name'];
            $admin->name = $data['email'];
            $admin->pass = bcrypt($data['pass']);
            $admin->status = $data['status'];
            if($admin->save()){
                $account = new Account();
                $account->acc_no = $data['acc_no'];
                $account->holder_ref = $admin->id;
                $account->holder_name = $data['acc_holder_name'];
                $account->amount = $data['acc_amount'];
                $account->holder_type ="Admin";
                $account->save();
                return redirect()->back()->with('flash_message_success','Admin Added Successfully.');
            }
	   	}
	  	return view('backend.admins.add-admin');
	  }

	   public function editAdmin(Request $request,$id){

	   	$adminDetails = Admin::where('id',$id)->first();
	   	/*$adminDetails = json_decode(json_encode($adminDetails));
	   	echo "<pre>"; print_r($adminDetails); die;*/
	   	 if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['categories_access'])){
	   				$data['categories_access'] = 0;
	   			}
	   			if(empty($data['vehicles_access'])){
	   				$data['vehicles_access'] = 0;
	   			}
	   			if(empty($data['status'])){
	   				$data['status'] = 0;
	   			}

             Admin::where(['id'=>$id])->update(['name'=>$data['name'],'pass'=>md5($data['pass']),'status'=>$data['status'],'categories_access'=>$data['categories_access'],'vehicles_access'=>$data['vehicles_access']]);
             return redirect()->back()->with('flash_message_success','Admin Updated Successfully.');
              }

	   	     return view('backend.admins.edit-admin')->with(compact("adminDetails"));
	   			}

	   		public function deleteAdmin(Request $request, $id = null){
            if(!empty($id)){
            Admin::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_error','Admin deleted Succesfully');
        }

     }	
     public function viewProfit(){

     	$profits = DB::table('vehicles')
                    ->join('admins','vehicles.admin_id','=','admins.id')
                    ->where ('admin_id','=', Session::get('userid'))
                    ->select('brand','model','selling','purchase')->get();
     	$profits = json_decode(json_encode($profits));

     	$TotalProfit = DB::table('vehicles')
                      ->join('admins','vehicles.admin_id','=','admins.id')
                      ->where ('admin_id','=', Session::get('userid'))
                      ->sum(DB::raw('selling - purchase'));



	  	
	  	return view('backend.profit.profit')->with(compact('profits','TotalProfit'));
	  }
}