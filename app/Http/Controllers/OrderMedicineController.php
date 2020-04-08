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
        $meds =Medicine::all();
        $users = User::all();
        return view('orders.create',[
            // 'orders' => $orders,
            'orderM'=>$orderM,
            'meds'=>$meds,
            'doctors'=>$doctors,
            'users'=> $users
        ]);
    }
    public function store(Request $request){
        $order_id = DB::table('orders')->max('id');
        Order::create([
            'delivering_address'=>$request->delivering_address,
            'is_insured' => $request->is_insured,
            'action' => $request->action, 
            'user_id'=>$request->user_id,
            // 'doctor_id'=>$request->doctor_id,
        ]);
        OrderMedicine::create([
            'quantity'=>$request->quantity,
            'total_price'=>$request->total_price,
            'medicine_id' => $request->medicine_id,
            'order_id' => $order_id+1
        ]);
        
        return redirect()->route('orders.index');
        
        
    }
    public function edit(){
        $request= request();

        $orderId=$request->order;
        $medId=$request->medicine;
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
    public function update(Request $request, $orderMId){

        $order_id = DB::table('order_medicines')->where('id', $orderMId)->value('order_id');
        Order::where('id', $order_id)->update([
            'delivering_address'=>$request->delivering_address,
            'is_insured' => $request->is_insured,
            'action' => $request->action, 
            'status_id' => $request->status_id,
            'user_id'=>$request->user_id,
            'doctor_id' => $request->doctor_id,
            'pharmacy_id' => $request->pharmacy_id,
            
        ]);
        
        OrderMedicine::where('id', $orderMId)->update([
            'quantity'=>$request->quantity,
            'total_price'=>$request->total_price,
            'medicine_id' => $request->medicine_id
            ]);

        return redirect()->route('orders.index');
    }
    public function destroy($id){
        $order = Order::find($id);
        $order -> delete();
        return redirect()->route('orders.index');
    }
}
