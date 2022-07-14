<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Crypt;
use Auth;


class ClassController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $classes = DB::table('classes')->paginate(4);
        return view('admin.classes.all', ['classes' => $classes]);
    }
    public function create(){
        return view('admin.classes.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'unique:classes|required|max:100'
        ]);
        $data = array();
        $data['name']=$request->name;

        DB::table('classes')->insert($data);
        return redirect()->back()->with('success', 'Class inserted successfully!');
    }
    public function edit(Request $request){
        $id = Crypt::decryptString($request->id);
        $class = DB::table('classes')->where('id', $id)->first();
        $class->update_on = $request->id;
        return view('admin.classes.edit', ['class' => $class]);
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'unique:classes|required'
        ]);
        $id = Crypt::decryptString($request->update_on);
        $data = array();
        $data['name'] = $request->name;
        DB::table('classes')->where('id', $id)->update($data);
        return redirect()->route('classes.all')->with('success', 'Class updated successfully!');
    }
    public function delete(Request $request){
        $id = Crypt::decryptString($request->id);
        DB::table('classes')->where('id', $id)->delete();
        return redirect()->route('classes.all')->with('deleted', 'Class deleted successfully!');
    }
}
