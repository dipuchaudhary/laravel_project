<?php

namespace App\Http\Controllers;
use App\Six;

use Illuminate\Http\Request;
use Storage;
use PDF;

class SixController extends Controller
{
					/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function empView4(){
		// $six = six::get();
		$six= six::paginate(5);
		return view('forms.form5', compact('six'));
	}


    //view function
    public function view(request $request){
        $six = six::where('id',$request->id)->first();
        return response()->json($six);
    }


    public function response (Request $request, six $six){
        $this->validate($request, ['response'=>'required|max:2550' ,]);
        six::where('id', $six->id)->update([
            'responses'=>$request['response'],
            'updated_by'=> Auth::User()->user_id,]);
        return redirect('/forms/empView');
    }
    public function editEmployee($id){

        $six = six::find($id);
        $six1 = six::get();
        return view('forms.edit5',compact('six1','six'));
    }




        public function insertEmployeeDetails(Request $request) {


           
            $emp_name=$request['emp_name'];
            $image=$request->file('image');
            echo $image;
            $filename = $emp_name.'.jpg';
            Storage::put('images/'.$filename,file_get_contents($request->file('image')->getRealPath()));

		Six::create([
			'emp_name' => $request['emp_name'],
			'emp_email' => $request['emp_email'],
			'emp_type' => $request['emp_type'],
			'emp_id' => $request['emp_id'],
            'file_upload'=>$filename
		]);
		return redirect()->back()->withErrors(['Insert Employee Details Successfully!']);;
    }

    public function update(Request $request) {
        Six::where('id',$request['id'])->update([
            'emp_name' => $request['emp_name'],
            'emp_email' => $request['emp_email'],
            'emp_type' => $request['emp_type'],
            'emp_id' => $request['emp_id']
            
        ]);
        return redirect()->back();
    }

public function delete(Request $request) {
    $six = six::where('id',$request->id)->delete();
    return redirect()->back()->withErrors(['Deleted Successfully']);
}


public function search(Request $request){
	$this -> validate($request,['searchEmp'=>'']);
	$six = Six::
	where('emp_type','like',"%$request->searchEmp%")
	->orwhere('emp_name','like',"%$request->searchEmp%")
	->paginate(5)
	->appends(['searchEmp'=>$request->searchEmp]);
	return view('forms.form5',compact('six'));
}

//pdf generation
public function downloadPDF($id){
    $six = Six::find($id);
    $pdf = PDF::loadView('forms.PDF',compact('six'));
    return $pdf->download('details.pdf');
}


// to download all files
public function downloadAllPDF(){
    $six = Six::get();
    $pdf = PDF::loadView('forms.Alldetails',compact('six'));
    return $pdf->download('Alldetails.pdf');
}
}
