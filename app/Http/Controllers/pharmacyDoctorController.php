<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pharmacy;
use App\Doctor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth; 



class pharmacyDoctorController extends Controller
{
  

    // public function indexx()
    // {
    //     $user = auth()->user();
    //     //$pharmacies=pharmacy::all();
    //     //dd($pharmacies);
    //     if($user) {
    //      $pharmacies=pharmacy::find($user->id);
    //     return view('pharmacydoctors.indexx',[
    //         'pharmacies'=>$pharmacies,
           
    //     ]); }

    //     return  "There is no data ";;
    // }


    // public function index()
    // {
   
    //     $doctors=doctor::all();
       
    //     return view('pharmacydoctors.index',[
    //         'doctors'=>$doctors,
           
        
    //     ]);
       
    // }


    public function index(){
    $current_pharmacy=Auth::guard('pharmacy')->user()->id;
    //  dd($current_pharmacy);
    // $curr_doctor=Auth::guard('doctor')->user()->hasrole('doctor');
    // dd($curr_doctor);
    
    $doctors= Doctor::where('pharmacy_id',$current_pharmacy)->get();
    // dd($doctors);
    
    return view('pharmacydoctors.index',[
    'doctors'=> $doctors,
    
    ]);
    } 


    public function create()
    {
        $pharmacies = pharmacy::all();

        return view('pharmacydoctors.create', [
            'pharmacies' => $pharmacies,
        ]);
    }

    public function show(){

        $request = request();//global function return request object
		//dd($request->post);
		$doctorId=$request->doctor;

		$doctor=doctor::find($doctorId);
	

		return view('pharmacydoctors.show',['doctor'=>$doctor]);
    }




    public function store(Request $request){
      

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('doctors/'.$filename, File::get($file));
        } else {
            $filename = 'doctor.jpg';
        }


        doctor::create([
          
            'name' => $request->name,
            'email' =>  $request->email,
            'password' =>  $request->password,
            'national_id'=> $request->national_id,
            'pharmacy_id'=> $request->pharmacy_id,
            'image'=>$filename,
        
        ]);

        return redirect()->route('pharmacydoctors.index');

    }


    public function destroy(){
        $request=request();
        $doctorId=$request->doctor;
        $doctor=doctor::find($doctorId);
        $doctor->delete();
        return redirect()->route('pharmacydoctors.index');
    }




    public function edit()
    {   
        $request=request();
        $doctorId= $request->doctor;
        $doctor=pharmacy::find($doctorId);
        return view('pharmacydoctors.edit',[
            'doctor'=>$doctor,  
        ]);
}

}