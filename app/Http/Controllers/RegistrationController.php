<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrations = Registration::with(['course', 'student'])->get();
        return response()->json($registrations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id'
        ]);

        // Check if course has already ended
        $course = Course::find($request->course_id);
        if ($course->end_date < now()) {
            return response()->json(['message' => 'Course has already ended'], 400);
        }

        // Check if student is already registered to the course
        $exisitingRegeistraion = Registration::where('course_id', $request->course_id)
            ->where('student_id', $request->student_id)
            ->exists();
        if ($exisitingRegeistraion) {
            return response()->json(['message' => 'Student is already registered to the course'], 400);
        }

        $registration = Registration::create($request->all());
        return response()->json($registration, 201); // 201 means created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $registrations = Registration::with(['course', 'student'])->find($id);
        return response()->json($registrations);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registration = Registration::find($id);

        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id'
        ]);

        $registration->update($request->all());
        return response()->json($registration);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registration = Registration::find($id);
        $registration->delete();
        return response()->json(null, 204); // 204 means no content
    }
}
