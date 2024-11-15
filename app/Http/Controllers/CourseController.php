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
        $courses = Course::where('is_active', 1)->orderBy('id', 'desc')->paginate(3);
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

    public function index_create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|file|mimes:jpg,png|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Procesar la imagen y guardarla
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Generar un nombre único para la imagen
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        
            // Mover la imagen a la carpeta 'public/course_img'
            $request->file('image')->move(public_path('course_img'), $fileName);
        
            // Guardar la ruta relativa en el modelo
            $imageUrl = 'course_img/' . $fileName;
        } else {
            return response()->json(['error' => 'Error al subir la imagen.'], 400);
        }
        


        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->image_url = $imageUrl;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->save();

        return redirect()->route('course.index');
    }

    public function edit($edit)
    {
        $course = Course::find($edit);
        return view('course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($course->image_url && file_exists(public_path($course->image_url))) {
                unlink(public_path($course->image_url));
            }

            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('course_img'), $fileName);

            $course->image_url = 'course_img/' . $fileName;
        }



        $course->title = $request->title;
        $course->description = $request->description;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->save();

        return redirect()->route('course.index')->with('success', 'Curso actualizado correctamente.');
    }
}
