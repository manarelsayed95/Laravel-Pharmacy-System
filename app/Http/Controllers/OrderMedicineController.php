<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\OrderMedicine;
use App\Order;
use App\User;
use App\Doctor;
use App\Status;
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
        $orders = Order::all();
        $doctors = Doctor::all();
        $statuses =Status::all();
        return view('orders.create',[
            'orders' => $orders,
        ]);
    }
    public function edit(){
        $request= request();

        $orderId=$request->order;
        $orderM = OrderMedicine::find($orderId);
        $orders = Order::find($orderId);
        $users = User::all();
        $doctors = Doctor::all();
        $statuses =Status::all();
        // $pharmacy = Pharmacy::all();
        return view('orders.edit',[
            'orderM'=>$orderM,
            'orders'=>$orders,
            'users'=>$users,
            'doctors'=>$doctors,
            'statuses'=>$statuses
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
            // 'pharmacy_id' => $request->name,
        ]);
        
        OrderMedicine::where('id', $orderMId)->update([
            'quantity'=>$request->quantity,
            'total_price'=>$request->total_price,
            ]);

        return redirect()->route('orders.index');
    }
    public function destroy($id){
        $order = Order::find($id);
        $order -> delete();
        return redirect()->route('orders.index');
    }
}
