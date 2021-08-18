<?php

namespace App\Http\Controllers;

use App\Account;
use App\Helper;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Input;
use Illuminate\Support\facades\Auth;
use function PHPSTORM_META\elementType;
use Session;
use Image;
use App\Category;
use App\Vehicle;
use App\User;
use App\VehiclesImage;
use App\Admin;
use DB;

class VehiclesController extends Controller
{
     // Vehicle Info DB te store 
    public function addVehicle(Request $request,$id = null){

                
                //echo "<pre>"; print_r($admins);die;
        		if($request->isMethod('post')){
                $data = $request->all();
    			//echo "<pre>"; print_r($data); die;
    			if(empty($data['category_id'])){
    			return redirect()->back()->with('flash_message_error','Under Category is Missing');
    			}
            
                $vehicle = new Vehicle;
                
    			$vehicle->category_id = $data['category_id'];
                $vehicle->admin_id= Session::get('userid');
                $vehicle-> brand = $data['brand'];
                $vehicle-> model = $data['model'];
                $vehicle-> year = $data['year'];
                $vehicle-> mileage = $data['mileage'];
                $vehicle-> engine_capacity = $data['engine_capacity'];
                $vehicle-> fuel_type = $data['fuel_type'];
                $vehicle-> max_power = $data['max_power'];
                $vehicle-> max_speed = $data['max_speed'];
                $vehicle-> torque = $data['torque'];
                $vehicle-> fuel_consumption = $data['fuel_consumption'];
                $vehicle-> door = $data['door'];
                $vehicle-> drive_type = $data['drive_type'];
                $vehicle-> seats = $data['seats'];
                $vehicle-> wheel_base = $data['wheel_base'];
                $vehicle-> weight = $data['weight'];
                $vehicle-> length = $data['length'];
                $vehicle-> width = $data['width'];
                $vehicle-> height = $data['height'];
                $vehicle-> fuel_tank_capacity = $data['fuel_tank_capacity'];
                $vehicle-> color = $data['color'];
                $vehicle-> no_of_cylinder = $data['no_of_cylinder'];
                $vehicle-> description = $data['description'];
                $vehicle-> price = $data['price'];
                $vehicle-> showroom_name = $data['showroom_name'];
                $vehicle-> address = $data['address'];
                $vehicle-> contact = $data['contact'];
                // $vehicle-> image = $data['image'];
                $vehicle-> purchase = $data['purchase'];
                $vehicle-> selling = $data['selling'];

    			// $vehicle->vehicle_code = $data['vehicle_code'];
    			// $vehicle->vehicle_model = $data['vehicle_model'];
    			// if (!empty($data['description'])){
    			// 	$vehicle->description = $data['description'];
                // }
                // else {
    			// 		$vehicle->description = '';
                // }
    			
    			// $vehicle->sname = $data['sname'];
    			// $vehicle->address = $data['address'];
                // $vehicle->contact = $data['contact'];
    			// $vehicle->price = $data['price'];

				// Image Upload 
    			if($request->hasFile('image')){
    				$image_tmp = $request->file('image');
    				if ($image_tmp->isValid()){
    					$extension = $image_tmp->getClientOriginalExtension();
    					$filename = rand(111,99999).'.'.$extension;
    					$large_image_path = 'images/backend_images/vehicles/large/'.$filename;
    					$medium_image_path = 'images/backend_images/vehicles/medium/'.$filename;
    					$small_image_path = 'images/backend_images/vehicles/small/'.$filename;
    					//Resize Images
    					Image::make($image_tmp)->save($large_image_path);
    					Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
    					Image::make($image_tmp)->resize(300,300)->save($small_image_path);

    					//Store image in vehicles table
    					$vehicle->image = $filename;
    				}
  			 }
    			$vehicle->save();
                //return redirect()->back()->with('flash_message_succes','Vehicle has been added Succesfully');
    			return redirect('/backend/view-vehicles')->with('flash_message_success','Vehicle has been added Succesfully');	
        	}

//Categories Drop Down Start 
    	$categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown ="<option selected disabled>Select</option>";
        foreach($categories as $cat) {
            $categories_dropdown .= "<optgroup label='" . $cat->name . "'>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value='" .$sub_cat->id . "'>" .$sub_cat->name . "</option>";
            }
            $categories_dropdown .= "</optgroup>";
        }

    	return view('backend.vehicles.add-vehicle')->with(compact('categories_dropdown'));
    }

    public function booking($id= null){
        if(intval($id) > 0) {
            $vehicleDetails = Vehicle::where('id', intval($id))->first();
            if ($vehicleDetails !== null) {
                $amountForBooking = ($vehicleDetails->price * ($vehicleDetails ->booking_rate / 100));
                return view('vehicles.booking')->with(compact('vehicleDetails', 'amountForBooking'));
            }else{
                return redirect()->back()->with(["flash_message_error" => "vehicle not found"]);
            }
        }else{
            return redirect()->back()->with(["flash_message_error" => "Invalid Params supplied"]);
        }
    }

    public function bookingConfirm(Request  $request){
        if($request->isMethod('POST')) {
            $vid = intval($request->v_id);
            if($vid < 0) {
                return redirect()->back()->with(["flash_message_error" => "Invalid Params supplied"]);
            }

            $bookingAmount = floatval($request->booking_amount);
            if($bookingAmount < 0) {
                return redirect()->back()->with(["flash_message_error" => "Invalid Amount supplied"]);
            }

            $vehicleDetails = Vehicle::where('id', intval($vid))->first();
            if ($vehicleDetails === null) {
                return redirect()->back()->with(["flash_message_error" => "vehicle not found"]);
            }

            $vehiclePrice = $vehicleDetails->price;
            $amountForBooking = round(($vehiclePrice * ($vehicleDetails ->booking_rate / 100)));
            if($bookingAmount >= $amountForBooking){
                $bookerId = 2;
                $bookerAccount = Account::where(['holder_ref' =>  $bookerId, 'holder_type' => "User"])->first();
                if($bookerAccount->amount > 0  && $bookerAccount->amount  - $bookingAmount >= 0){
                    $tax = Helper::calculateTax($bookingAmount);
                    $taxAmount = round(($bookingAmount * ($tax / 100)));
                    $netAmount = ($bookingAmount - $taxAmount);
                    //dd($taxAmount);
                    $brandAccount = Account::where(['holder_ref' =>  $vehicleDetails->admin_id, 'holder_type' => "Admin"])->first();
                    $brandAccount->amount += $netAmount;
                    $brandAccount->save();

                    $bookerAccount->amount -= $bookingAmount;
                    $bookerAccount->save();

                    //Vehicle owner transaction
                    $brandTransaction =  new Transaction();
                    $brandTransaction->from_account = $bookerAccount->acc_no;
                    $brandTransaction->to_account = $brandAccount->acc_no;
                    $brandTransaction->booking_amount = $bookingAmount;
                    $brandTransaction->tax = $tax;
                    $brandTransaction->tax_amount = $taxAmount;
                    $brandTransaction->net_amount = $netAmount;
                    $brandTransaction->trans_type = "deposit";
                    $brandTransaction->amount_type = "cash";
                    $brandTransaction->note = "Amount deposit from: ". $bookerAccount->acc_no." To My account: ". $brandAccount->acc_no." for Booking. Booking Amount:".$bookingAmount."Tk  Tax:". $tax."% TaxAmount:". $taxAmount."Tk  You paid amount: ". $netAmount."Tk"." Admin cut: ". $taxAmount." Tk";
                    $brandTransaction->save();


                    //booker transaction
                    $bookerTransaction =  new Transaction();
                    $bookerTransaction->from_account = $bookerAccount->acc_no;
                    $bookerTransaction->to_account = $brandAccount->acc_no;
                    $bookerTransaction->booking_amount = $bookingAmount;
                    $bookerTransaction->tax = "0";
                    $bookerTransaction->tax_amount = "0";
                    $bookerTransaction->net_amount = $bookingAmount;
                    $bookerTransaction->trans_type = "withdraw";
                    $bookerTransaction->amount_type = "cash";
                    $bookerTransaction->note = "Amount withdraw from My account: ". $bookerAccount->acc_no." Transfer To Brand account: ". $brandAccount->acc_no." for Booking amount: ". $bookingAmount."Tk";
                    $bookerTransaction->save();


                    //site owner transaction
                    $siteAccount = Account::where(['holder_ref' => 2, 'holder_type' => 'Super Admin'])->first();
                    $siteAccount->amount += $taxAmount;
                    $siteAccount->save();

                    $siteOwnerTransaction =  new Transaction();
                    $siteOwnerTransaction->from_account = $brandAccount->acc_no;
                    $siteOwnerTransaction->to_account = $siteAccount->acc_no;
                    $siteOwnerTransaction->booking_amount = 0;
                    $siteOwnerTransaction->tax = "0";
                    $siteOwnerTransaction->tax_amount = "0";
                    $siteOwnerTransaction->net_amount = $taxAmount;
                    $siteOwnerTransaction->trans_type = "tax";
                    $siteOwnerTransaction->amount_type = "cash";
                    $siteOwnerTransaction->note = "Amount deposit from: ". $bookerAccount->acc_no." To My account: ". $siteAccount->acc_no." for Booking amount: ".$bookingAmount."Tk Tax:". $tax."% TaxAmount:". $taxAmount."Tk Your paid amount: ". $taxAmount."Tk";
                    $siteOwnerTransaction->save();
                    $vehicleDetails->booking_status = "booked";
                    $vehicleDetails->save();
                    return redirect()->back()->with(["flash_message_success" => "Booking placed success"]);
                    //dd($vehicleDetails);
                }else{
                    return redirect()->back()->with(["flash_message_error" => "Not sufficient amount for booking"]);
                }
            }else{
                return redirect()->back()->with(["flash_message_error" => "You must be required ".$vehicleDetails ->booking_rate." % of price"]);
            }

        }

    }



    
    public function viewVehicles(){
    	$vehicles = DB::table('vehicles')
                    ->join('admins','vehicles.admin_id','=','admins.id')
                    ->where ('admin_id','=', Session::get('userid'))
                    ->select('vehicles.*')
                    ->get();
    	$vehicles = json_decode(json_encode($vehicles));
    	foreach ($vehicles as $key => $val) {
    		$category_name = Category::where(['id'=>$val->category_id])->first();
    		$vehicles[$key]->category_name = $category_name->name;
    	}
    	return view('backend.vehicles.view-vehicles')->with(compact('vehicles'));
    }

    public function editVehicle(Request $request, $id=null){

    	if ($request->isMethod('post')) {
    		$data = $request->all();
    		//echo "<pre>"; print_r($data);die;

    		// Image Upload
    			if($request->hasFile('image')){
    				$image_tmp = $request->file('image');
    				if ($image_tmp->isValid()){
    					$extension = $image_tmp->getClientOriginalExtension();
    					$filename = rand(111,99999).'.'.$extension;
    					$large_image_path = 'images/backend_images/vehicles/large/'.$filename;
    					$medium_image_path = 'images/backend_images/vehicles/medium/'.$filename;
    					$small_image_path = 'images/backend_images/vehicles/small/'.$filename;
    					//Resize Images
    					Image::make($image_tmp)->save($large_image_path);
    					Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
    					Image::make($image_tmp)->resize(300,300)->save($small_image_path);

    				
    				}
    			}else {
    				$filename = $data['current_image'];
    			}

                // DB info UPDATE QUERY

            Vehicle::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'brand'=>$data['brand'],'model'=>$data['model'],
                'year'=>$data['year'],'mileage'=>$data['mileage'],'engine_capacity'=>$data['engine_capacity'],'fuel_type'=>$data['fuel_type'],
                'max_power'=>$data['max_power'],'max_speed'=>$data['max_speed'],'torque'=>$data['torque'],'door'=>$data['door'],
                'fuel_consumption'=>$data['fuel_consumption'],'drive_type'=>$data['drive_type'],'seats'=>$data['seats'],
                'wheel_base'=>$data['wheel_base'],'weight'=>$data['weight'],'length'=>$data['length'],'width'=>$data['width'],
                'height'=>$data['height'],'fuel_tank_capacity'=>$data['fuel_tank_capacity'],'color'=>$data['color'],
                'no_of_cylinder'=>$data['no_of_cylinder'],'description'=>$data['description'],'price'=>$data['price'],
                'showroom_name'=>$data['showroom_name'],'address'=>$data['address'],'contact'=>$data['contact'],'purchase'=>$data['purchase'],
                'selling'=>$data['selling'],'image'=>$filename]);
    		 return redirect('/backend/view-vehicles')->with('flash_message_success','Vehicle has been Edited Succesfully');
    	}
    	$vehicleDetails = Vehicle::where(['id'=>$id])->first();

    	//Categories Drop Down Start 
    	$categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown ="<option selected disabled>Select</option>";
        foreach($categories as $cat) {
        	if($cat->id==$vehicleDetails->category_id){
        		$selected = "selected";
        	}else{
        		$selected = "";
        	}
            $categories_dropdown .= "<optgroup label='" . $cat->name . "' ".$selected.">";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();
            foreach ($sub_categories as $sub_cat) {
            	if($sub_cat->id==$vehicleDetails->category_id){
        		$selected = "selected";
        		}else{
        		$selected = "";
        		}
                $categories_dropdown .= "<option value='" .$sub_cat->id . "' ".$selected.">" .$sub_cat->name . "</option>";
            }
            $categories_dropdown .= "</optgroup>";
        }

//Categories Drop Down Ends

    	return view ('backend.vehicles.edit-vehicle')->with(compact('vehicleDetails','categories_dropdown'));
    }

    public function deleteVehicle(Request $request, $id = null){
        if(!empty($id)){

            //Get Vehicle Image
            $vehicleImage = Vehicle::where(['id'=>$id])->first();
            //Get Vehicle Image Paths
            $large_image_path = 'images/backend_images/vehicles/large/';
            $medium_image_path = 'images/backend_images/vehicles/medium/';
            $small_image_path = 'images/backend_images/vehicles/small/';

            //Delete Large Image 
            if(file_exists($large_image_path.$vehicleImage->image)){
                unlink($large_image_path.$vehicleImage->image);
            }

            //Delete medium Image 
            if(file_exists($medium_image_path.$vehicleImage->image)){
                unlink($medium_image_path.$vehicleImage->image);
            }


            //Delete small Image 
            if(file_exists($small_image_path.$vehicleImage->image)){
                unlink($small_image_path.$vehicleImage->image);
            }


            Vehicle::where(['id'=>$id])->delete();

            return redirect()->back()->with('flash_message_error','Vehicle deleted Succesfully');
        }

     }

    public function vehicles($url = null){

        //show 404 page if category Url doesn't exist

     $countCategory = Category::where(['url'=>$url])->count();
     if($countCategory==0){
        abort(404);
     }

        //Get all categories and sub categories 
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();

        $categoryDetails = Category::where(['url' => $url])->first();

        if($categoryDetails->parent_id==0){
    //If url is main category url
          $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
         foreach($subCategories as $subcat){
        $cat_ids[] = $subcat->id;
    }
    //print_r($cat_ids); die;
        $vehiclesAll = Vehicle::whereIn('category_id',$cat_ids)->paginate(3);
        // $vehiclesAll = json_decode(json_encode($vehiclesAll));
    //echo "<pre>"; print_r($vehiclesAll);
    }else{
    // if url is subcategory url
        $vehiclesAll = Vehicle::where(['category_id' => $categoryDetails->id])->paginate(3);
}   
    return view('vehicles.listing')->with(compact('categories','categoryDetails','vehiclesAll'));
     }

    public function vehicle($id= null){

        //Get Vehicle Details
        $vehicleDetails = Vehicle::where('id',$id)->first();
        $vehicleDetails = json_decode(json_encode($vehicleDetails));
        //dd($vehicleDetails);
        $relatedVehicles = Vehicle::where('id','!=',$id)->where(['category_id'=>$vehicleDetails->category_id])->get();

        // $relatedVehicles = json_decode(json_encode($relatedVehicles));

        // foreach($relatedVehicles->chunk(3) as $chunk){
        //     foreach($chunk as $item){
        //         echo $item; echo "<br>";
        //     }
        //     echo "<br><br><br>";
        // }    
        // die;
        // echo "<pre>"; print_r($relatedVehicles); die;

        //Get all categories and subcategories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        //get vehicle Alternate Images
        $vehicleAltImages = VehiclesImage::where('vehicle_id',$id)->get();
        // $vehicleAltImages = json_decode(json_encode($vehicleAltImages));
        // echo "<pre>"; print_r($vehicleAltImages); die;

        return view('vehicles.detail')->with(compact('vehicleDetails','categories','vehicleAltImages','relatedVehicles'));

     }

     // Add admin Alternate images
    public function addImages(Request $request,$id=null){
        // echo "test"; die;

              $vehicleDetails = Vehicle::where(['id'=>$id])->first();

            if($request->isMethod('post')){
                $data = $request->all();
                //echo "<pre>"; print_r($data); die;
                if($request->hasFile('image')){
                        $files = $request->file('image');
                    foreach ($files as $file) {
                        $image = new VehiclesImage;
                        $extension = $file->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extension;
                        $large_image_path = 'images/backend_images/vehicles/large/'.$filename;
                        $medium_image_path = 'images/backend_images/vehicles/medium/'.$filename;
                        $small_image_path = 'images/backend_images/vehicles/small/'.$filename;
                        //Resize Images
                        Image::make($file)->save($large_image_path);
                        Image::make($file)->resize(600,600)->save($medium_image_path);
                        Image::make($file)->resize(300,300)->save($small_image_path);

                        //Store image in vehicles table
                        $image->image = $filename;
                        $image->vehicle_id = $data['vehicle_id'];
                        $image->save();
                       
                    }
                    
                    }

            return redirect('/backend/add-images/'.$id)->with('flash_message_success','Vehicle Images has been added Succesfully');
           }
            $vehiclesImages = VehiclesImage::where(['vehicle_id'=>$id])->get();
            // $vehiclesImages = json_decode(json_encode($vehiclesImages));
            return view('backend.vehicles.add-images')->with(compact('vehicleDetails','vehiclesImages'));
     }

     //  Delete admin Alternare image
    public function deleteAltImage(Request $request, $id = null){

            //Get Vehicle Image
            $vehicleImage = VehiclesImage::where(['id'=>$id])->first();
            //Get Vehicle Image Paths
            $large_image_path = 'images/backend_images/vehicles/large/';
            $medium_image_path = 'images/backend_images/vehicles/medium/';
            $small_image_path = 'images/backend_images/vehicles/small/';

            //Delete Large Image 
            if(file_exists($large_image_path.$vehicleImage->image)){
                unlink($large_image_path.$vehicleImage->image);
            }

            //Delete medium Image 
            if(file_exists($medium_image_path.$vehicleImage->image)){
                unlink($medium_image_path.$vehicleImage->image);
            }


            //Delete small Image 
            if(file_exists($small_image_path.$vehicleImage->image)){
                unlink($small_image_path.$vehicleImage->image);
            }


            VehiclesImage::where(['id'=>$id])->delete();

            return redirect()->back()->with('flash_message_error','Vehicle Alternare Image(s) has been deleted Succesfully');
    

     }

    public function searchVehicles(Request $request){
        if($request->isMethod('get')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $categories = Category::with('categories')->where(['parent_id' => 0])->get();

            $search_vehicle = $data['vehicle'];
            $vehiclesAll = Vehicle::where('brand','like','%'.$search_vehicle.'%')->orwhere('model',$search_vehicle)->orwhere('year',$search_vehicle)->orwhere('showroom_name',$search_vehicle)->paginate(3);

            return view('vehicles.listing')->with(compact('categories','search_vehicle','vehiclesAll'));
        }
     }

    public function PriceRange1(Request $request){

        $vehiclesAll =DB::table('vehicles')
                    ->where('price','=>','500000')
                    ->get();

        $vehiclesAll =DB::table('vehicles')
                    ->where('price','<=','1000000')
                    ->get();

        /*//In descending Order
        $vehiclesAll = Vehicle::orderBy('id','DESC')->get();
        
        //In random order
        $vehiclesAll = Vehicle::inRandomOrder()->paginate(3);*/

        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        //$categories = json_encode(json_encode($categories));

        return view('vehicles.PriceRange1')->with(compact('vehiclesAll','categories'));
    }

    public function PriceRange2(Request $request){

        $vehiclesAll =DB::table('vehicles')
                    ->where('price','=>','1000000')
                    ->get();

        $vehiclesAll =DB::table('vehicles')
                    ->where('price','<=','2000000')
                    ->get();

        //In descending Order
       /* $vehiclesAll = Vehicle::orderBy('id','DESC')->get();
        
        //In random order
        $vehiclesAll = Vehicle::inRandomOrder()->paginate(3);
*/
        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        //$categories = json_encode(json_encode($categories));

        return view('vehicles.PriceRange2')->with(compact('vehiclesAll','categories'));
    }

    public function PriceRange3(Request $request){

        $vehiclesAll =DB::table('vehicles')
                    ->where('price','=>','2000000')
                    ->get();

        $vehiclesAll =DB::table('vehicles')
                    ->where('price','<=','3000000')
                    ->get();

        //In descending Order
       /* $vehiclesAll = Vehicle::orderBy('id','DESC')->get();
        
        //In random order
        $vehiclesAll = Vehicle::inRandomOrder()->paginate(3);*/

        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        //$categories = json_encode(json_encode($categories));

        return view('vehicles.PriceRange3')->with(compact('vehiclesAll','categories'));
    }

    public function PriceRange4(Request $request){

        $vehiclesAll =DB::table('vehicles')
                    ->where('price','>=','3000000')
                    ->get();
        $vehiclesAll =DB::table('vehicles')
                    ->where('price','<=','5000000')
                    ->get();

       

        //In descending Order
       /* $vehiclesAll = Vehicle::orderBy('id','DESC')->get();
        
        //In random order
        $vehiclesAll = Vehicle::inRandomOrder()->paginate(3);*/

        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        //$categories = json_encode(json_encode($categories));

        return view('vehicles.PriceRange4')->with(compact('vehiclesAll','categories'));
    }

    public function PriceRange5(Request $request){

        $vehiclesAll =DB::table('vehicles')
                    ->where('price','>=','5000000')
                    ->get();
    

       

        //In descending Order
       /* $vehiclesAll = Vehicle::orderBy('id','DESC')->get();
        
        //In random order
        $vehiclesAll = Vehicle::inRandomOrder()->paginate(3);*/

        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        //$categories = json_encode(json_encode($categories));

        return view('vehicles.PriceRange5')->with(compact('vehiclesAll','categories'));
    }

}
