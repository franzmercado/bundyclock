<?php

namespace App\Http\Controllers\API;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'departmentName'  => 'required|unique:departments,dept_name|max:191',
      ]);

      $formData = array('dept_name' => ucwords(strtolower($request->department)));
      return  Department::create($formData);
    //     return Department::create([
    //       'dept_name'  => $request->department,
    //     ]);
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
      $this->validate($request,[
        'departmentName'  => 'required|max:191|unique:departments,dept_name,'. $id,
      ]);

      $upt = Department::findOrFail($id);
      $upt->dept_name = $request->departmentName;
      $upt->update();
      return  'Department detail updated.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dept = Department::findOrFail($id);
        $dept->delete();
        return "Department deleted.";
    }
}
