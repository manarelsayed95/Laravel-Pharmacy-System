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
    //
    public function index(Request $request){
        $userId=Auth::user()->id;
        //dd($userId);
        return OrderResource::collection(
            Order::where('user_id',$userId)->get()
        );
    }

    //show order
    public function show($order){
        //$userId=Auth::user()->id;
        return  Order::find($order)
        ?new OrderResource(
             Order::find($order)
         ) : 'not exist';
    }

}
