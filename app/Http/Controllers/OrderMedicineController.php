<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OrderMedicine;
use App\Order;
use App\User;
use App\Doctor;
use App\Status;
use App\pharmacy;
use App\Medicine;
class OrderMedicineController extends Controller
{
    public function index(){
        $orders = OrderMedicine::all();
        return view('orders.index',[
            'orders'=> $orders,
        ]);
    } 
    public function create(){
        $orderM = OrderMedicine::all();
        // $orders = Order::all();
        // $doctors = Doctor::all();
        $total_price =0;
        $meds =Medicine::all();
        $users = User::all();
        return view('orders.create',[
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
            
            // $request->validate([
            //     'name' => 'required|unique:medicines|max:255',
            //     'price' => 'required',
            //     'type' => 'required',
            //     'quantity' => 'required',
            // ]);
            // foreach($request->input(['quantity']) as $key => $value) {
                // $rules["name.{$key}"] = 'required';
                // $quantity="quantity.{$key}";
            //     $quantity=$request->input('quantity.'.$key);
            //     dd($quantity);
            //     OrderMedicine::create([
            //         'quantity'=>$request->quantity,
                    
            //         'medicine_id' => $med_id,
            //         'order_id' =>$order_id
            //     ]);
            // }  
            
            // $arr = [
            //     $request->input(['name']),
            //     $request->input(['quantity']),
            //     $request->input(['type']),
            //     $request->input(['price']),
            // ];
            
            // for ($i=0; $i < 4; $i++) { 
            //     $med = [
            //         $request->input('name.'.$i),
            //         $request->input('quantity.'.$i),
            //         $request->input('type.'.$i),
            //         $request->input('price.'.$i),
            //     ];
            // }
            // dd($request->input(['name']));
            // foreach ($request->input() as $key => $value) {

            // $data = array(
            //     'goodsreceiveheader_id'=>$id,
            //     'itemid'=>$request->itemid [$key],
            //     'quantity'=>$request->quantity [$key],
            //     'costprice'=>$request->costprice [$key],
            // );
            // Medicine::create([
                //     'name'=> $med[0],
                //     'quantity'=> $med[1],
                //     'type'=> $med[2],
                //     'price'=> $med[3],
                // ]);

            // }
            // foreach($request->input(['type']) as $key => $value) {
            //     Medicine::create([
            //         'type'=> $value,
            //     ]);
                
            // }
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
        

        return redirect()->route('orders.index');
        
        
    }
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
            return view('orders.edit',[
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
        return redirect()->route('orders.index');
    }
    public function destroy($id){
        $order = Order::find($id);
        $order -> delete();
        return redirect()->route('orders.index');
    }
    public function show(OrderMedicine $order){
        return view('orders.show',[
            'order'=>$order,
        ]);
    }

}
