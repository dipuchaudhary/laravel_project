<?php

namespace App\Http\Controllers;
use App\Fourth;

use Illuminate\Http\Request;

class FourthController extends Controller
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
    public function empView2(){
		// $fourth = fourth::get();
        $fourth= fourth::paginate(5);
		return view('forms.form3', compact('fourth'));
	}


    //view function
    public function view(request $request){
        $fourth = fourth::where('id',$request->id)->first();
        return response()->json($fourth);
    }


    public function response (Request $request, fourth $fourth){
        $this->validate($request, ['response'=>'required|max:2550' ,]);
        fourth::where('id', $fourth->id)->update([
            'responses'=>$request['response'],
            'updated_by'=> Auth::User()->user_id,]);
        return redirect('/forms/empView');
    }
    public function editEmployee($id){

        $fourth = fourth::find($id);
        $fourth1 = fourth::get();
        return view('forms.edit3',compact('fourth1','fourth'));
    }


    public function insertEmployeeDetails(Request $request){
    	Fourth::create([
    		'emp_name'=>$request['emp_name'],
    		'emp_email'=>$request['emp_email'],
    		'emp_type'=>$request['emp_type'],
    		'emp_id'=>$request['emp_id']

    	]);
    	return redirect()->back()->withErrors(['Insert Employee Details Successfully!']);;
    }
    public function update(Request $request) {
        Fourth::where('id',$request['id'])->update([
            'emp_name' => $request['emp_name'],
            'emp_email' => $request['emp_email'],
            'emp_type' => $request['emp_type'],
            'emp_id' => $request['emp_id']
        ]);
        return redirect()->back();
    }

public function delete(Request $request) {
    $fourth = fourth::where('id',$request->id)->delete();
    return redirect()->back()->withErrors(['Deleted Successfully']);
}
}
