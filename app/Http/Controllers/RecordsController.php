<?php

namespace App\Http\Controllers;

use App\Records;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only' => 'show']);
    }

    public function index()
    {
        $records = Records::orderBy('id')->paginate(1);
        return view('records')->with('records', $records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['actionType'] == 'Create') {
            $request->validate([
                'name' => 'required|max:25',
                'father_name' => 'required',
                'phone_number' => 'required|max:11',
                'dob' => 'required|date_format:Y-m-d',
                'gender' => 'required',
                'religion' => 'required',
                'blood_group' => 'required',
                'sec' => 'required',
                'doa' => 'required|date_format:Y-m-d',
                'cnic' => 'required|max:13'
            ]);

            $records = new Records;

            $records->fill($request->except('actionType'));
            $records->save();
            $request->session()->flash('message', 'Student Created Successfully');
            return response()->json(['success' => true, 'result' => 'Student Created Successfully', 'records' => $records]);
        }
        else if($request['actionType'] == 'Res'){
            return $this->edit($request, Records::findOrFail($request['id']));
        }
        else if($request['actionType'] == 'Atd'){
            return $this->show($request, Records::findOrFail($request['id']));
        }
        else if($request['actionType'] == 'Cmt'){
            return $this->mnt($request, Records::findOrFail($request['id']));
        }
        else {
            return $this->update($request, Records::findOrFail($request['id']));
        }
    }
    public function mnt(Request $request,Records $records)
    {
        $request->validate([
            'comments' => 'required'
        ]);

        $records->fill($request->except('actionType'));
        $records->save();
        $request->session()->flash('message', 'Attendance Updated Successfully');
        return response()->json(['success' => true, 'result' => 'Attendance Updated Successfully', 'records' => $records]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Records $records)
    {
        $request->validate([
            'attendance' => 'required'
        ]);

        $records->fill($request->except('actionType'));
        $records->save();
        $request->session()->flash('message', 'Attendance Updated Successfully');
        return response()->json(['success' => true, 'result' => 'Attendance Updated Successfully', 'records' => $records]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Records $records)
    {   
        $request->validate([
            'eng' => 'required',
            'urdu' => 'required',
            'maths' => 'required',
            'cptr' => 'required',
            'isl' => 'required',
            'pakstd' => 'required',
            'phy' => 'required',
            'chem' => 'required'
        ]);

        $records->fill($request->except('actionType'));
        $records->save();
        $request->session()->flash('message', 'Result Updated Successfully');
        return response()->json(['success' => true, 'result' => 'Result Updated Successfully', 'records' => $records]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Records $records)
    {
        $request->validate([
            'name' => 'required|max:25',
            'father_name' => 'required',
            'phone_number' => 'required|max:11',
            'dob' => 'required|date_format:Y-m-d',
            'gender' => 'required',
            'religion' => 'required',
            'blood_group' => 'required',
            'sec' => 'required',
            'doa' => 'required|date_format:Y-m-d',
            'cnic' => 'required|max:13'
        ]);

        $records->fill($request->except('actionType'));
        $records->save();
        $request->session()->flash('message', 'Student Updated Successfully');
        return response()->json(['success' => true, 'result' => 'Student Updated Successfully', 'records' => $records]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Records $records)
    {
        $records->delete();

        $request->session()->flash('message', 'Student Deleted Successfully');
        return redirect()->intended('/records');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ]);
        $str = $request->input('search');
        $records = Records::where('name', 'LIKE', '%' . $str . '%')
            ->orwhere('sec', 'LIKE', '%' . $str . '%')->paginate(4);
        return view('records')->with(['records' => $records, 'search' => true]);
    }

    public function psend(Request $request)
    {
        $this->validate($request, [
            'send' => 'required'
        ]);
        $send = $request->input('send');
        $data = Records::where('cnic', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('parentsview.outputrec')->with('data', $data);
    }

    public function t9(Request $request)
    {
        $this->validate($request, [
            'nine' => 'required'
        ]);
        $data = DB::table('table9')
            ->select('*')
            ->get();
        return view('9thtable')->with('data', $data);
    }

    public function t10(Request $request)
    {
        $this->validate($request, [
            '10th' => 'required'
        ]);
        $data = DB::table('table10')
            ->select('*')
            ->get();
        return view('10thtable')->with('data', $data);
    }

    public function stdrf(Request $request)
    {
        $this->validate($request, [

            'id' => 'required',
            'name' => 'required',
            'cnic' => 'required|max:13'
        ]);
        $this->validate($request, [
            'submit' => 'required',
            'id' => 'required',
            'name' => 'required',
            'cnic' => 'required|max:13'
        ]);
        $submit = $request->input('id');
        $data = Records::where('id', 'LIKE', '%' . $submit . '%')->paginate(20);
        return view('stdview.outputr')->with('data', $data);
    }
    public function patd(Request $request)
    {
        $this->validate($request, [
            'patd' => 'required'
        ]);
        $send = $request->input('patd');
        $data = Records::where('cnic', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('parentsview.outattend')->with('data', $data);
    }
    public function prcmt(Request $request)
    {
        $this->validate($request, [
            'prcmt' => 'required'
        ]);
        $send = $request->input('prcmt');
        $data = Records::where('cnic', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('parentsview.outcmt')->with('data', $data);
    }
    public function stdres(Request $request)
    {
        $this->validate($request, [
            'stdres' => 'required'
        ]);
        $send = $request->input('stdres');
        $data = Records::where('kpass', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('stdview.outres')->with('data', $data);
    }
    public function t9r(Request $request)
    {
        $this->validate($request, [
            '9th' => 'required'
        ]);
        $send = $request->input('9th');
        $records = Records::where('sec', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('adtec9')->with('records', $records);
    }
    public function t10r(Request $request)
    {
        $this->validate($request, [
            '10th' => 'required'
        ]);
        $send = $request->input('10th');
        $records = Records::where('sec', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('adtec10')->with('records', $records);
    }
    public function t9rr()
    {
        $records = Records::where('sec', 'LIKE', '9th')->paginate(20);
        return view('adtec9')->with('records', $records);
    }
    public function t10rr()
    {
        $records = Records::where('sec', 'LIKE', '10th')->paginate(20);
        return view('adtec10')->with('records', $records);
    }
    public function t9a(Request $request)
    {
        $this->validate($request, [
            '9th' => 'required'
        ]);
        $send = $request->input('9th');
        $records = Records::where('sec', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('attendance.atd9')->with('records', $records);
    }
    public function t10a(Request $request)
    {
        $this->validate($request, [
            '10th' => 'required'
        ]);
        $send = $request->input('10th');
        $records = Records::where('sec', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('attendance.atd10')->with('records', $records);
    }
    public function t9aa()
    {
        $records = Records::where('sec', 'LIKE', '9th')->paginate(20);
        return view('attendance.atd9')->with('records', $records);
    }
    public function t10aa()
    {
        $records = Records::where('sec', 'LIKE', '10th')->paginate(20);
        return view('attendance.atd10')->with('records', $records);
    }
    public function cmt9(Request $request)
    {
        $this->validate($request, [
            '9th' => 'required'
        ]);
        $send = $request->input('9th');
        $records = Records::where('sec', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('cmt.cmt9')->with('records', $records);
    }
    public function cmt10(Request $request)
    {
        $this->validate($request, [
            '10th' => 'required'
        ]);
        $send = $request->input('10th');
        $records = Records::where('sec', 'LIKE', '%' . $send . '%')->paginate(20);
        return view('cmt.cmt10')->with('records', $records);
    }
    public function cmtt9()
    {
        $records = Records::where('sec', 'LIKE', '9th')->paginate(20);
        return view('cmt.cmt9')->with('records', $records);
    }
    public function cmtt10()
    {
        $records = Records::where('sec', 'LIKE', '10th')->paginate(20);
        return view('cmt.cmt10')->with('records', $records);
    }



}
