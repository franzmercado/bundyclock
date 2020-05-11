<?php

namespace App\Http\Controllers\API;

use DB;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Employee::latest()->paginate(10);
        return DB::table('employees')
                  ->join('departments', 'employees.department', '=', 'departments.id')
                  ->orderBy('employees.created_at', 'DESC')
                  ->select('employees.*', 'departments.id as dept_id','departments.dept_name')
                  ->whereNull('deleted_at')
                  ->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request['suffix'] ==1){
        $suf = $request['specify'];
      }else {
        $suf = $request['suffix'];
      }

      $this->validate($request,[
        'employeeId'  => 'required|unique:employees|max:191',
        'firstname'  => 'required|string|max:191',
        'middlename'   => 'max:191',
        'lastname'   => 'required|string|max:191',
        'suffix'  => 'max:4',
        'gender'  => 'required',
        'department'  => 'required',
        'shift' => 'required',
      ]);

        return Employee::create([
          'employeeID'  => $request['employeeId'],
          'first_name'  => $request['firstname'],
          'middle_name'   => $request['middlename'],
          'last_name'   => $request['lastname'],
          'suffix'  => $suf,
          'gender'  => $request['gender'],
          'department'  => $request['department'],
          'shift' => $request['shift']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if($request->suffix ==1){
        $suf = $request->specify;
      }else {
        $suf = $request->suffix;
      }
      $employees = Employee::findOrFail($id);

      $this->validate($request,[
        'employeeId'  => 'required|max:191|unique:employees,employeeId,'. $employees->id,
        'firstname'  => 'required|string|max:191',
        'middlename'   => 'max:191',
        'lastname'   => 'required|string|max:191',
        'suffix'  => 'max:4',
        'gender'  => 'required',
        'department'  => 'required',
        'shift' => 'required',
      ]);

          $employees->employeeID  = $request->employeeId;
          $employees->first_name  = $request->firstname;
          $employees->middle_name   = $request->middlename;
          $employees->last_name   = $request->lastname;
          $employees->suffix  = $suf;
          $employees->department  = $request->department;
          $employees->shift = $request->shift;
          $employees->update();
          return "Employees's info has been Updated.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $emp = Employee::findOrFail($id);
      $emp->delete();
      return "Employees's record has been deleted.";
    }
}
