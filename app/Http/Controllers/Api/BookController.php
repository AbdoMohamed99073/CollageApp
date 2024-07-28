<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $book = Book::filter($request->query())
        ->with('course')
        ->paginate();

        return BookResource::collection($book);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Book::rules(), [
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
        $book = Book::create($request->all());

        return response()->json($book , 201) ;
    }


    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'faculty_id' => 'sometimes|required|exists:faculties,id',
            'date_birth' => 'sometimes|required|date',
            'gender' => 'in:male,female',
            'phone_number' => 'sometimes|required|string|max:11',
        ]);
        $book->update($request->all());

        return response()->json($book, 200 , [
            'message' => 'Book Information updated'
        ]) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);

        return response()->json([
            'message' => 'Book Deleted',
        ] , 200);
    }
}
