<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;
use App\Pharmacy;
use App\Http\Requests\StoreDoctorRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DoctorController extends Controller
{
    public function index()
    {

        $doctors = Doctor::paginate(2);
        // $doctors = Doctor::all();

        return view('doctors.index', [
            'doctors' => $doctors,
        ]);
        
    }

    public function show()
    {
        $request = request();
        $doctorId = $request->doctor;

       
        $doctor = Doctor::find($doctorId);
        
        return view('doctors.show',[
            'doctor' => $doctor,
            
        ]);
    }



    public function create()
    {
        // $doctors = Doctor::all();
        $pharmacies = Pharmacy::all();

        return view('doctors.create', [
            'pharmacies' => $pharmacies,
            // 'doctors' => $doctors
        ]);
    }

    public function store(StoreDoctorRequest $request)
    {
        // $validatedData = $request->validated();
        // $doctor = new Doctor();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            // $file->move('/uploads/doctors/',$filename);
            Storage::disk('public')->put('avatars/'.$filename, File::get($file));
        } 
        else {
            $filename = 'doctor.jpg';
        }

        // $validatedData['image'] = 'avatars/'.$filename;

        Doctor::create(
            [
            'name' => $request->name,
            'email' =>  $request->email,
            'password' =>  $request->password,
            'national_id'=> $request->national_id,
            'pharmacy_id'=> $request->pharmacy_id,
            'image'=>$filename
        ]);

        //redirect to /posts
        return redirect()->route('doctors.index');
    }




    public function edit()
    {
        $request = request();
        $doctorId = $request->doctor;
        $doctor = Doctor::find($doctorId);
        $pharmacies = Pharmacy::all();

        return view('doctors.edit',[
            'doctor'=>$doctor,
            'pharmacies'=>$pharmacies,
        ]);

    }
   

    public function update(StoreDoctorRequest $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name= $request->name;
        $doctor->email = $request->email;
        $doctor->national_id= $request->national_id;
        $doctor->password = $request->password;
        // $doctor->image = $request->image;
        $pharmacies = Pharmacy::all();
       
        $doctor->save();
        return redirect()->route('doctors.index');
    }


    public function destroy(Request $request){
        if ($request->ajax())
        {
            DB::table('doctors') -> where ('id',$request->id)
            ->delete();
        }
       $doctor = Doctor::findOrFail($id);
       $doctor->delete();
      
    //    return redirect()->back();
        // return response()->json([
    
        //     'message' => 'Doctor deleted successfully!'
    
        // ]);
    
    }

   
}



