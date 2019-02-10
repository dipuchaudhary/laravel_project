<?php

namespace App\Http\Controllers;
use App\Third;

use Illuminate\Http\Request;

class ThirdController extends Controller
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
    public function empView1(){
		// $third = third::get();
		$third= third::paginate(5);
		return view('forms.form2', compact('third'));
	}

	//view function
	public function view(request $request){
		$third = third::where('id',$request->id)->first();
		return response()->json($third);
	}


	public function response (Request $request, third $third){
		$this->validate($request, ['response'=>'required|max:2550' ,]);
		third::where('id', $third->id)->update([
			'responses'=>$request['response'],
			'updated_by'=> Auth::User()->user_id,]);
		return redirect('/forms/empView');
	}
	public function editEmployee($id){

		$third = third::find($id);
		$third1 = third::get();
		return view('forms.edit2',compact('third1','third'));
	}


    public function insertEmployeeDetails(Request $request) {
		Third::create([
			'emp_name' => $request['emp_name'],
			'emp_email' => $request['emp_email'],
			'emp_type' => $request['emp_type'],
			'emp_id' => $request['emp_id']
		]);
		return redirect()->back()->withErrors(['Insert Employee Details Successfully!']);;
	}
	public function update(Request $request) {
		Third::where('id',$request['id'])->update([
			'emp_name' => $request['emp_name'],
			'emp_email' => $request['emp_email'],
			'emp_type' => $request['emp_type'],
			'emp_id' => $request['emp_id']
		]);
		return redirect()->back();
	}

public function delete(Request $request) {
	$third = third::where('id',$request->id)->delete();
	return redirect()->back()->withErrors(['Deleted Successfully']);
}
}
