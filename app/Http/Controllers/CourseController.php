<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$courses = Course::all();
        return response()->json($courses);*/

        $query = Course::query();

        //  Filter by title
        if (request()->has('title')) {
            $query->where('title', 'like', '%' . request('title') . '%');
        }

        //  Filter by start_date
        if (request()->has('start_date')) {
            $query->where('start_date', '==', request('start_date'));
        }

        //  Filter by instructor_name
        if (request()->has('instructor_name')) {
            $query->where('instructor_name', 'like', '%' . request('instructor_name') . '%');
        }

        // Pagination with 10 items per page
        $courses = $query->paginate(10);
        return response()->json($courses);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:250',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'details' => 'nullable|string',
            'instructor_name' => 'required|string|max:250',
        ]);

        $course = Course::create($request->all());
        return response()->json($course, 201); // 201 means created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);

        $request->validate([
            'title' => 'required|string|max:250',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'details' => 'nullable|string',
            'instructor_name' => 'required|string|max:250',
        ]);

        $course->update($request->all());
        return response()->json($course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        $course->delete();
        return response()->json(['message' => 'Deleted successfully'], 200); // 200 means OK, parsed with message
    }
}
