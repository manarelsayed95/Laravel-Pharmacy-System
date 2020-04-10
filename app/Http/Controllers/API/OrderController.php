<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Order;
use Auth;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    //get all user orders
    public function index(Request $request){
        $userId=Auth::user()->id;
        //dd($userId);
        return OrderResource::collection(
            Order::where('user_id',$userId)->get()
        );
    }

    //show order
    public function show($order){
        $userId=Auth::user()->id;
        // return  Order::find($order)
        // ?new OrderResource(
        //      Order::find($order)
        //  ) : 'not exist';

        return  Order::where(['user_id'=>$userId,'id'=>$order])->get()
          ?  OrderResource::collection(
            Order::where(['user_id'=>$userId,'id'=>$order])->get()
        ): 'not exist';
    }

    public function store(Request $request)
    {
        $request->validate([
            'Is_insured' => 'required',
            'image' => 'required',
            'delivering_address_id' => 'required',
        ]);

        // dd($userData[0]->id);
        $order= UserOrder::create([
            'Is_insured' => $request->Is_insured,
            'image' =>  $request->image,
            'address_id' =>  $request->delivering_address_id,
        ]);
        return new UserOrderResource($order);
    }
}
