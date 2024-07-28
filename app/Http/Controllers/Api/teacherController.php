<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teacher = Teacher::filter($request->query())
        ->with(['faculty:id,name' , 'course'])
        ->paginate();
        return TeacherResource::collection($teacher);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Teacher::rules(), [
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
        $teacher = Teacher::create($request->all());

        return response()->json($teacher , 201) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return new TeacherResource($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'faculty_id' => 'sometimes|required|exists:faculties,id',
            'date_birth' => 'sometimes|required|date',
            'gender' => 'in:male,female',
            'phone_number' => 'sometimes|required|string|max:11',
        ]);
        $teacher->update($request->all());

        return response()->json($teacher, 200 , [
            'message' => 'Teacher Information updated'
        ]) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::destroy($id);

        return response()->json([
            'message' => 'Teacher Deleted',
        ] , 200);
    }



    public function getallst()
    {
        return Teacher::with('course')->paginate();
    }
}
