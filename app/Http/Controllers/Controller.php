<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Parking;
use App\Partner;
use App\Zipcode;
use App\Activecase;
use App\User;
use Auth;
use Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function activecase(){
        $activetimeout=strtotime("now");
        $activecase=Activecase::where('activetimeout','>',$activetimeout)->get();
        // $activecase=Activecase::where('city_name','test')->get();
        $lat=array();
        $lng=array();
        foreach($activecase as $activecases){
            array_push($lat,$activecases->lat);
            array_push($lng,$activecases->lng);
        }
        return response()->json(['lat'=> $lat,'lng'=>$lng]);
    }
    public function activecase_show(){
        $activetimeout=strtotime("now");
        // $case_old=Activecase::where('activetimeout','<',$activetimeout)->get();
        // if(!empty($case_old)){
        //     foreach($case_old as $case_olds){
        //         $case_olds->delete();
        //     }
        // }
        $case_show=Activecase::where('activetimeout','>',$activetimeout)->get();
        return view('active',['lat'=>'','lng'=>'','case_show'=>$case_show]);
    }
    public function accept_case($id){
        $activetimeout=strtotime("+1 hour");
        $activecase=Activecase::find($id);
        $activecase->activetimeout=$activetimeout;
        $activecase->save();
        return view('emails.accept');
    } 
    public function display_parking(){
         $parkings = DB::select('select * from parkings');
         return view('custome',['parkings'=>$parkings]);
    }
    public function new_park(Request $request){
       
        $parking=new Parking;
        $parking->firstname=$request->firstname;
        $parking->lastname=$request->lastname;
        $parking->zip_code=$request->zip_code;
        // $parking->street=$request->street;
        // $parking->country=$request->country;
        // $parking->city=$request->city;
        $parking->google=$request->google;
        $parking->phone=$request->phone_number;
        $parking->email=$request->email;
        $parking->valid_license=$request->valid;
        $parking->save();
        return redirect('custome');
    }
    public function display_partner(){
        $partners = DB::select('select * from partners');
        return view('partner',['partners'=>$partners]);
   }
    public function new_part(Request $request){
   
        $Partner=new Partner;
        $Partner->firstname=$request->firstname;
        $Partner->lastname=$request->lastname;
        // $Partner->street=$request->street;
        // $Partner->country=$request->country;
        // $Partner->city=$request->city;
        $Partner->google=$request->google;  
        $Partner->phone=$request->phone_number;
        $Partner->email=$request->email;
        $Partner->save();
        return redirect('part_list');
    }
    public function ticket(){

        $activetimeout=strtotime("-1 hour");
        $ticket=Activecase::where('activetimeout','<',$activetimeout)->get();
        return view('ticket',['ticket'=>$ticket]);
    }
    public function exist(Request $request){
        $firstname=$request->firstname;
        $lastname=$request->lastname;
        // $street=$request->street;
        // $country=$request->country;
        // $city=$request->city;
        $google=$request->google;
        $parknumb=$request->parknumb;
        $phone=$request->phone;
        $email=$request->email;
        $results = DB::select("select * from parkings
             WHERE 
                firstname='".$firstname."' or lastname='".$lastname."' or 
                google='".$google."' or id='".$parknumb."' or
                phone='".$phone."' or email='".$email."'");
        return view('search',['results'=>$results]);
    }
    public function newcase(Request $request){
        $id=$request->select;
        if(!empty($id)){
            $results = DB::select("select * from parkings
            WHERE id='".$id."' ");
            $results['firstname']=$results[0]->firstname;
            $results['lastname']=$results[0]->lastname;
            // $results['country']=$results[0]->country;
            // $results['city']=$results[0]->city;
            // $results['street']=$results[0]->street;
            $results['googleadd']=$results[0]->google;
            $results['zip_code']=$results[0]->zip_code;
            $results['phone']=$results[0]->phone;
            $results['email']=$results[0]->email;
            // var_dump($results);
            return view('newcase',['results'=>$results]);
        }
        $results=array();
        $results['firstname']=$request->firstname;
        $results['lastname']=$request->lastname;
        $results['googleadd']=$request->google;
        // $results['country']=$request->country;
        // $results['city']=$request->city;
        // $results['street']=$request->street;
        $results['zip_code']=$request->zip_code;
        $results['phone']=$request->phone;
        $results['email']=$request->email;
        // dump($results);
        return view('newcase',['results'=>$results]);
       
    }
    public function show_zip(Request $request){
        $partner_id=$request->select;
        if(!empty($partner_id)){
            $partners = DB::select("select * from partners
            WHERE id='".$partner_id."' ");
            // var_dump($results);
            $zip_show = DB::select("select * from zipcodes WHERE partner_id='".$partner_id."'");
            return view('zip_show',['partners'=>$partners,'zip_show'=>$zip_show]);
        }
        
        // return view('zip_show',['zip_show'=>$zip_show]);
        // dump($partner_id);
    }
    public function add_zip(Request $request){
        $partner_id=$request->partner_id;
        $partner_country=$request->partner_country;
        $zip_code=$request->zip_code;
        $zip_show=Zipcode::where('zip_code',$zip_code)->where('partner_id',$partner_id)->first();
        if(empty($zip_show)){
            $Zipcode=new Zipcode;
            $Zipcode->zip_code= $request->zip_code;
            $Zipcode->partner_id= $request->partner_id;
            $Zipcode->country= $request->partner_country;
            $Zipcode->save();

            // return response()->json(['success'=>$request->partner_email]);
            return response()->json(['success'=>'Successfully saved!']);
           
        }else{
            return response()->json(['success'=>'This is Zip code saved for this partner already!']);
        }
        
        
    }
    public function delete_zip(Request $request){
        $partner_id=$request->partner_id;
        $zip_code=$request->zip_code;
        $zip=Zipcode::where('partner_id',$partner_id)->where('zip_code',$zip_code)->first();
        $zip->delete();
        return response()->json(['success'=>'Successfully deleted!']);
    }
    public function city_search(Request $request){
        $city_key=$request->city_search;
        $city = DB::select("select  city from citylists WHERE city_key='".$city_key."'");
        // dump($city);
        if(empty($city)){
            return response()->json(['emptydata'=>'error']);
        }else{
            return response()->json(['city'=>$city[0]->city]);
        }
    }
    public function complete(Request $request){
        // var_dump($request->carpark);
        $city_name=$request->city_name;
        $car_numb=$request->car_numb;
        $car_color=$request->car_color;
        $car_brand=$request->car_brand;
        $google=$request->google;
        $country=explode(",",$google);
        $country=trim(end($country));
        // $country=$request->country;
        // $city=$request->city;
        // $street=$request->street;
        $zip_code=$request->zip_code;
        // $country='Germany';
        // $zip_code="10111";
        // dump($country,$zip_code);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?components=" . urlencode('country:Germany|postal_code:'.$zip_code) ."&sensor=false&key=AIzaSyDL67IIFF0YgSBp95rU_OnzsRogvbqhH6M";
        $result_string = file_get_contents($url);
        $result = json_decode($result_string, true);
        // dump($result);
        if(!empty($result['results'])){
            $zipLat = $result['results'][0]['geometry']['location']['lat'];
            $ziplng = $result['results'][0]['geometry']['location']['lng'];
        }else{
            return view('error',['error'=>'location']);
        }   
        // dump($google,$zip_code);
        $partner_id=Zipcode::where('zip_code',$zip_code)->first();
      
        if(!empty($partner_id)){
            $partner=Partner::where('id',$partner_id->partner_id)->first();
        }else{
            return view('error',['error'=>'partner']);
        }


        $data = array(
            "aparty"=> "4980030090100",
           "bparty"=> $partner->phone,
            "apikey"=> "291ce23e5f1274689a13edf57281d051",
            "speak"=> "Sie haben einen neuen Auftrag. Bitte bestätigen Sie den Auftrag umgehend."
        );
        
        // $payload = json_encode($data);
        // // Prepare new cURL resource
        // $ch = curl_init('https://system.woop.la/scripts/clients/MAX001/alertcall/');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        
        // // Set HTTP Header for POST request 
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //     'Content-Type: application/json',
        //     'Content-Length: ' . strlen($payload))
        // );
        // // Submit the POST request
        // $result = curl_exec($ch);
        // // Close cURL session handle
        // curl_close($ch);
        // var_dump($result);
        $activetimeout=strtotime("+1 hour");
        $activecase=Activecase::where('zip_code',$zip_code)->where('google',$google)
                                ->where('car_number',$car_numb)->where('car_color',$car_color)
                                ->where('car_brand',$car_brand)->first();
        if(!empty($activecase)){
            $activecase->delete();
        }
        $case=new Activecase;
        // $case->country=$country;
        // $case->city=$city;
        // $case->street=$street;
        $case->google=$google;
        $case->zip_code=$zip_code;
        $case->city_name=$city_name;
        $case->car_number=$car_numb;
        $case->car_color=$car_color;
        $case->car_brand=$car_brand;
        $case->lng=$ziplng;
        $case->lat=$zipLat;
        $case->partner_name=$partner->lastname;
        $case->user_name=Auth::user()->name;
        if($request->carpark){
            $case->carpark='yes';
        }else{
            $case->carpark='no';
        }
        
        // var_dump(Auth::user()->name);
        $case->save();
        // $case_show=Activecase::where('zip_code',$zip_code)->where('google',$google)
        //                         ->where('car_number',$car_numb)->where('car_color',$car_color)
        //                         ->where('car_brand',$car_brand)
        //                         ->get();
        
        // $mail = DB::select("select email from partners
        //     WHERE id='".$zip_code."' ");
       
            // dump($mail->email);
        // $details = [
        //     //'country' => $country,
        //     //'city' => $city,
        //     //'street'=>$street,
        //     'google'=>$google,
        //     'zip_code'=>$zip_code,
        //     'city_name'=>$city_name,
        //     'car_number'=>$car_numb,
        //     'car_color'=>$car_color,
        //     'car_brand'=>$car_brand,
        //     'firstname'=>$partner->firstname,
        //     'lastname'=>$partner->lastname,
        //     'order_id'=>$case_show[0]->id,
        //      'carpark'=>$case_show[0]->carpark
        // ];
        
        // Mail::to($partner->email)->send(new SendMail($details));
        
      //  return view('active',['lat'=>$zipLat,'lng'=>$ziplng,'case_show'=>$case_show]);
    }
    public function team(){
        if(Auth::user()->admin=="admin"){
            $users=User::all();
            return view('team',compact('users'));
        }
    }
    public function comfirm(Request $request){
        $comfirm=$request->get('comfirm');
        $userid=$request->get('userid');
        // var_dump($comfirm,$userid);   
        $users = User::find($userid); 
        $users->approved=$comfirm;
        $users->save();  
    }
    public function menu(){
        return view('menu');
    }

    public function test(Request $request){
        $data=$request->data;
        return response()->json(['data'=>$data]);
    }
    public function pending(){
        $case_show=Activecase::where('activetimeout',null)->get();
        return view('active',['lat'=>'','lng'=>'','case_show'=>$case_show]);
    }
    
}
