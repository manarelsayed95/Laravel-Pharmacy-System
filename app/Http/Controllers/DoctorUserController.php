<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;
use App\pharmacy;
use App\Order;
use App\Http\Requests\StoreDoctorRequest;
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


    public function show(){
        $user=Auth::guard('doctor')->user()->id;
// dd($user);
        $doctor= Doctor::find($user);
        // dd($doctor->name);
       
        
        return view('doctorUser.show',[
            'doctor'=> $doctor,
        ]);

    }
}
