<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;
use App\pharmacy;
use App\Order;
use App\OrderMedicine;
use App\User;
use App\Status;
use App\Medicine;
// use App\Http\Requests\StoreDoctorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Hash;
use Auth;




class DoctorUserController extends Controller
{
########### to show orders of a certain doctor############

    public function index(){
        $current_doctor=Auth::guard('doctor')->user()->id;
        // $curr_doctor=Auth::guard('doctor')->user()->hasrole('doctor');
        // dd($curr_doctor);
        
        $orders= Order::where('doctor_id',$current_doctor)->get();
        // dd($orders);
       
        return view('doctorUser.index',[
            'orders'=> $orders,

        ]);
    } 

########### to show profile of a certain doctor############
    public function profile(){
        $user=Auth::guard('doctor')->user()->id;
// dd($user);
        $doctor= Doctor::find($user);
        // dd($doctor->name);
       
        
        return view('doctorUser.profile',[
            'doctor'=> $doctor,
        ]);

    }

################ to create order ######################
    public function create(){
        $orderM = OrderMedicine::all();
        // $orders = Order::all();
        // $doctors = Doctor::all();
        $total_price =0;
        $meds =Medicine::all();
        $users = User::all();
        return view('doctorUser.create',[
            // 'orders' => $orders,
            'orderM'=>$orderM,
            'meds'=>$meds,
            'total_price'=>$total_price,
            // 'doctors'=>$doctors,
            'users'=> $users
        ]);
    }
    public function store(Request $request){
        $order_id = DB::table('orders')->max('id')+1;
        $medicine = $request->medicine_name;
        $med_id =DB::table('medicines')->where('name',$medicine)->value('id');
        if(is_null($med_id)){
            $med_id_new = DB::table('medicines')->max('id')+1;


            Medicine::create([
                'name'=> $request->name,
                'quantity'=> $request->quantity,
                'type'=> $request->type,
                'price'=> $request->price,
            ]);
            Order::create([
                'delivering_address'=>$request->delivering_address,
                'is_insured' => $request->is_insured,
                'action' => $request->action, 
                'total_price'=>$request->total_price,
                'user_id'=>$request->user_id,
                // 'doctor_id'=>$request->doctor_id,
            ]);
            OrderMedicine::create([
                'quantity'=>$request->quantity,
                'medicine_id' => $med_id_new,
                'order_id' =>$order_id
            ]);
        }
        else{
            Order::create([
                'delivering_address'=>$request->delivering_address,
                'is_insured' => $request->is_insured,
                'action' => $request->action, 
                'user_id'=>$request->user_id,
                'total_price'=>$request->total_price,
                // 'doctor_id'=>$request->doctor_id,
            ]);
            
            OrderMedicine::create([
                'quantity'=>$request->quantity,
                'medicine_id' => $med_id,
                'order_id' =>$order_id
            ]);
        }
        

        return redirect()->route('doctororders.index');
        
        
    }

    ######################## edit an order  #######################
    public function edit(){
        $request= request();
        $stId =DB::table('statuses')->where('status','WaitingForUserConfirmation')->value('id');
        
        $orderId=$request->order;
        
        $medId=$request->medicine;
        $status_id =DB::table('orders')->where('id',$orderId)->value('status_id');
        
        if($status_id<$stId){
            $orderM = OrderMedicine::find($orderId);
            $orders = Order::find($orderId);
            $meds = Medicine::all();
            $users = User::all();
            $doctors = Doctor::all();
            $statuses =Status::all();
            $pharmacies = pharmacy::all();
            return view('doctorUser.edit',[
                'orderM'=>$orderM,
                'orders'=>$orders,
                'users'=>$users,
                'doctors'=>$doctors,
                'statuses'=>$statuses,
                'meds'=>$meds,
                'pharmacies'=>$pharmacies,
            ]);
        }
        else{
            return redirect()->back()->with(['alert','Sorry order cannot be edited it is waiting for user confirmation']);
        }
        
    }

    ################## update an order ##################################
    public function update(Request $request, $orderMId){

        $order_id = DB::table('order_medicines')->where('id', $orderMId)->value('order_id');
        Order::where('id', $order_id)->update([
            'delivering_address'=>$request->delivering_address,
            'is_insured' => $request->is_insured,
            'action' => $request->action, 
            'total_price'=>$request->total_price,
            'status_id' => $request->status_id,
            'user_id'=>$request->user_id,
            'doctor_id' => $request->doctor_id,
            'pharmacy_id' => $request->pharmacy_id,
            
        ]);
        
        OrderMedicine::where('id', $orderMId)->update([
            'quantity'=>$request->quantity,
            'medicine_id' => $request->medicine_id
            ]);
        return redirect()->route('doctororders.index');
    }

    ###################### Delete #####################
    public function destroy($id){
        $order = Order::find($id);
        $order -> delete();
        return redirect()->route('doctororders.index');
    }
    ###############Show an order ######################
    public function show(OrderMedicine $order){
        return view('doctorUser.show',[
            'order'=>$order,
        ]);
    }

            
}
