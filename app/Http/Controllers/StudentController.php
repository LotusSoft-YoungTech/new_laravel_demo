<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required | numeric',
            'roll' => 'required',
            'mobile' => 'required | numeric | min:10'

            
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->roll = $request->roll;
        $student->mobile = $request->mobile;

        if($request->hasFile('photo')){
            $fileName = $request->photo;
            $newName = time() . $fileName->getClientOriginalName();
            $image_resize = Image::make($fileName->getRealPath());
            $image_resize->resize(800,600);
            $image_resize->save(public_path('student/' .$newName));
            $student->photo = 'student/' . $newName;

       
        }
        
        $student->save();
        $request->session()->flash('message', 'Record saved');
        return redirect()->back(); 

        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.view', compact('student'));

        $student = Student::where($id)->get();
        return view('student.view', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        
        $student = Student::find($id);
        return view('student.edit', compact('student'));
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
        $student = Student::find($id);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->roll = $request->roll;
        $student->mobile = $request->mobile;
        if($request->hasFile('photo')){
            $fileName = $request->photo;
            $newName = time() . $fileName->getClientOriginalName();
            $fileName->move('student', $newName);
            $student->photo = 'student/' . $newName;

        }
        $student->update();
        $request->session()->flash('message', 'Record updated');
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
      
        return redirect()->back(); 
      
       
    }
}
