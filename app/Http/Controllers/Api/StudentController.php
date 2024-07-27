<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::filter($request->query())
            ->with('faculty:id,name' , 'courses:id,name')
            ->paginate();

            return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Student::rules(), [
            'unique' => 'The name is already exsist !',
        ]);


       /* $val = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:255',
            'status' => 'in:active,archived',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0|gt:price',
        ]);*/
        $student = Student::create($request->all());

        return response()->json($student , 201) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'faculty_id' => 'sometimes|required|exists:faculties,id',
            'date_birth' => 'sometimes|required|date',
            'gender' => 'in:male,female',
            'phone_number' => 'sometimes|required|string|max:11',
        ]);
        $student->update($request->all());

        return response()->json($student, 200 , [
            'message' => 'Student Information updated'
        ]) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::destroy($id);

        return response()->json([
            'message' => 'Student Deleted',
        ] , 200);
    }
}
