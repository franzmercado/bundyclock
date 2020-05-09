<?php

namespace App\Http\Controllers\API;

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
        return Employee::latest()->paginate(10);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
