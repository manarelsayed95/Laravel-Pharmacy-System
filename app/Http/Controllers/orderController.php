<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class orderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('orders.index',[
            'orders'=> $orders
        ]);
    } 
}
