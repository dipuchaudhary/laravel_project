<?php

namespace App\Http\Controllers;
use App\Fifth;

use Illuminate\Http\Request;

class FifthController extends Controller
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
    public function empView3(){
		// $fifth = fifth::get();
		 $fifth= fifth::paginate(5);
		return view('forms.form4', compact('fifth'));
	}


    //view function
    public function view(request $request){
        $fifth = fifth::where('id',$request->id)->first();
        return response()->json($fifth);
    }


    public function response (Request $request, fifth $fifth){
        $this->validate($request, ['response'=>'required|max:2550' ,]);
        fifth::where('id', $fifth->id)->update([
            'responses'=>$request['response'],
            'updated_by'=> Auth::User()->user_id,]);
        return redirect('/forms/empView');
    }
    public function editEmployee($id){

        $fifth = fifth::find($id);
        $fifth1 = fifth::get();
        return view('forms.edit4',compact('fifth1','fifth'));
    }




    public function insertEmployeeDetails(Request $request) {
		Fifth::create([
			'emp_name' => $request['emp_name'],
			'emp_email' => $request['emp_email'],
			'emp_type' => $request['emp_type'],
			'emp_id' => $request['emp_id']
		]);
		return redirect()->back()->withErrors(['Insert Employee Details Successfully!']);;
    }
    public function update(Request $request) {
        Fifth::where('id',$request['id'])->update([
            'emp_name' => $request['emp_name'],
            'emp_email' => $request['emp_email'],
            'emp_type' => $request['emp_type'],
            'emp_id' => $request['emp_id']
        ]);
        return redirect()->back();
    }

public function delete(Request $request) {
    $fifth = fifth::where('id',$request->id)->delete();
    return redirect()->back()->withErrors(['Deleted Successfully']);
}
}
