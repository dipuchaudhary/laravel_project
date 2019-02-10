<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Second;
class SecondController extends Controller
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
    public function empView(){
		// $second = second::get();
		$second= Second::paginate(5);
		return view('forms.form1', compact('second'));
	}
	//view function
	public function view(request $request){
		$second = Second::where('id',$request->id)->first();
		return response()->json($second);
	}


	public function response (Request $request, third $third){
		$this->validate($request, ['response'=>'required|max:2550' ,]);
		second::where('id', $second->id)->update([
			'responses'=>$request['response'],
			'updated_by'=> Auth::User()->user_id,]);
		return redirect('/forms/empView');
	}


	
	public function editEmployee($id){

		$second = second::find($id);
		$second1 = second::get();
		return view('forms.edit',compact('second1','second'));
	}

	

	public function insertEmployeeDetails(Request $request) {
		Second::create([
			'emp_name' => $request['emp_name'],
			'emp_email' => $request['emp_email'],
			'emp_type' => $request['emp_type'],
			'emp_id' => $request['emp_id']
		]);
		return redirect()->back()->withErrors(['Insert Employee Details Successfully!']);
	}
	public function update(Request $request) {
		Second::where('id',$request['id'])->update([
			'emp_name' => $request['emp_name'],
			'emp_email' => $request['emp_email'],
			'emp_type' => $request['emp_type'],
			'emp_id' => $request['emp_id']
		]);
		return redirect()->back();
	}

public function delete(Request $request) {
	$second = Second::where('id',$request->id)->delete();
	return redirect()->back()->withErrors(['Deleted Successfully']);
}
    
}
