<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Medicine;

class MedicineController extends Controller
{
    public function index()
    {

        $medicines = Medicine::paginate(4);
        return view('medicines.index', [
            'medicines' => $medicines,
        ]);
        
    }

    public function show()
    {
        $request = request();
        $medicineId = $request->medicine;

       
        $medicine = Medicine::find($medicineId);
        
        return view('medicines.show',[
            'medicine' => $medicine,
            
        ]);
    }
  
    public function destroy()
    {
        $request=request();
        $medicineId= $request->medicine;
        Medicine::find($medicineId)->delete();
        return redirect('/medicines');
    }
   
}
