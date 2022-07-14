<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->join('classes', 'students.class_id', 'classes.id')->select('students.*', 'classes.name as class_name')->paginate(20);
        return view('admin.students.all', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = DB::table('classes')->get();
        return view('admin.students.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class_id' => 'required',
            'phone' => 'required',
            'email' => 'unique:students'
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['class_id'] = $request->class_id;
        $data['roll'] = $request->roll;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        DB::table('students')->insert($data);
        return redirect()->route('students.index')->with('success', 'Student inserted successfully!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $studentId = Crypt::decryptString($id);
        $student = DB::table('students')->where('id', $studentId)->first();
        $student->update_on = $id;
        $classes = DB::table('classes')->get();
        return view('admin.students.edit', ['student' => $student, 'classes' => $classes]);
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
        $studentId = Crypt::decryptString($id);
        $data = array();
        $data['name'] = $request->name;
        $data['class_id'] = $request->class_id;
        $data['roll'] = $request->roll;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $request->validate([
            'name' => 'required',
            'class_id' => 'required',
            'phone' => 'required',
            'email' => 'unique:students,email,'.$studentId
        ]);
        DB::table('students')->where('id', $studentId)->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentId = Crypt::decryptString($id);
        DB::table('students')->where('id', $studentId)->delete();
        return redirect()->route('students.index')->with('deleted', 'Student deleted successfully!');
    }
}
