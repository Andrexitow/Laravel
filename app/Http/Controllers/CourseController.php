<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Submission;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $courses = Course::whereHas('users', function ($query) {
                $query->where('user_id', Auth::id());
            })->paginate(3);

            return view('course.index', compact('courses'));
        } else {
            return redirect()->route('login');
        }
    }

    public function index_create_post()
    {
        return view('posts.create');
    }

    public function store_post(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Validar que el curso exista
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'deadline' => 'required|date|after:today', // Validar que la fecha sea futura
            'is_active' => 'required|boolean',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Crear una nueva instancia del modelo
        $publicacion = new Publication(); // Modelo asociado a la tabla 'publicaciones'
        $publicacion->course_id = $request->('course_id');
        $publicacion->user_id = $user->id;
        $publicacion->title = $request->input('title');
        $publicacion->content = $request->input('content');
        $publicacion->deadline = $request->input('deadline');
        $publicacion->is_active = $request->input('is_active');

        // Guardar en la base de datos
        $publicacion->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('publicaciones.index')->with('success', 'Publicación guardada exitosamente.');
    }



    public function show(Course $course)
    {
        $publications = $course->publications()->where('is_active', true)->get();
        $users = $course->users;
        return view('course.show', compact('course', 'publications', 'users'));
    }

    public function publication($courseId, $publicationId)
    {
        $user = Auth::user();

        $publication = Publication::where('id', $publicationId)
            ->where('course_id', $courseId)
            ->firstOrFail();

        $submission = Submission::where('user_id', $user->id)
            ->where('publication_id', $publicationId)
            ->first();

        $students = Submission::where('publication_id', $publicationId)
            ->with('user.profile')
            ->get();

        return view('course.showPublication', compact('publication', 'courseId', 'submission', 'students'));
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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Generar un nombre único para la imagen
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Mover la imagen a la carpeta 'public/course_img'
            $request->file('image')->move(public_path('course_img'), $fileName);
            $imageUrl = 'course_img/' . $fileName;
        } else {
            return response()->json(['error' => 'Error al subir la imagen.'], 400);
        }

        // Crear un nuevo curso
        $course = new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->image_url = $imageUrl;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->save();

        // Asociar el curso con el usuario logueado en la tabla pivote
        $course->users()->attach(Auth::id(), ['role' => 'teacher']); // Añadir rol opcionalmente

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
