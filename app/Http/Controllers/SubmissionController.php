<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function store(Request $request, $courseId, $publicationId)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        // Buscar si el usuario ya ha hecho una entrega para la publicación
        $submission = Submission::where('publication_id', $publicationId)
            ->where('user_id', Auth::id())
            ->first();

        // Verificar si el número de intentos ya ha alcanzado el límite
        if ($submission && $submission->attempts >= 2) {
            return back()->withErrors(['file' => 'Ya has alcanzado el número máximo de intentos (2).']);
        }

        if ($request->file('file')->isValid()) {
            $path = $request->file('file')->store('public/uploads');

            if ($submission) {
                // Si ya existe, actualizar contenido y aumentar el contador de intentos
                $submission->content = $path;
                $submission->submitted_at = now();
                $submission->attempts += 1; // Incrementar el contador
                $submission->save();
            } else {
                // Si no existe, crear una nueva entrega con el contador en 1
                Submission::create([
                    'publication_id' => $publicationId,
                    'user_id' => Auth::id(),
                    'content' => $path,
                    'submitted_at' => now(),
                    'attempts' => 1,
                ]);
            }

            return back()->with('success', 'Archivo subido exitosamente');
        }

        return back()->withErrors(['file' => 'Error al subir el archivo']);
    }
}
