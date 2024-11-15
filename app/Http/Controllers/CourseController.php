<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Submission;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {

        $courses = Course::orderBy('id', 'desc')->paginate(3);
        return view('course.index', compact('courses'));
    }

    public function show(Course $course)
    {

        $publications = $course->publications()->where('is_active', true)->get();

        return view('course.show', compact('course', 'publications'));
    }

    public function publication($courseId, $publicationId)
    {
        $publication = Publication::where('id', $publicationId)
            ->where('course_id', $courseId)
            ->firstOrFail();

        // Obtener la entrega (si existe) de este usuario para la publicación
        $submission = Submission::where('publication_id', $publicationId)
            ->where('user_id', Auth::id())
            ->first();

        return view('course.showPublication', compact('publication', 'courseId', 'submission'));
    }

    // public function publication($courseId, $publicationId)
    // {
    //     $publication = Publication::where('id', $publicationId)->where('course_id', $courseId)->firstOrFail();
    //     return view('course.showPublication', compact('publication', 'courseId'));
    // }

    public function uploadFile(Request $request, $courseId, $publicationId)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        if ($request->file('file')->isValid()) {
            $path = $request->file('file')->store('public/uploads');
            return back()->with('success', 'Archivo subido exitosamente');
        }

        return back()->withErrors(['file' => 'Error al subir el archivo']);
    }

    public function index_create() {

        return view('course.create');
    }
}
