<x-user-layout>
    <x-slot name="title">TalentoTech | Crear Publicación</x-slot>

    <div class="container mx-auto my-8 max-w-4xl">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-purple-950 text-3xl font-extrabold mb-6">Nueva Publicación</h1>

            <!-- Formulario de creación -->
            {{-- {{ route('course.publication.store', $course->id) }} --}}
            <form action=" {{ route('course.create.post.store') }} " method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Campo para el título -->
                <div class="mb-4">
                    <label for="title" class="block text-lg font-semibold text-gray-700 mb-2">Título</label>
                    <input type="text" name="title" id="title" 
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                           placeholder="Escribe el título de la publicación" required>
                </div>

                <!-- Editor de texto enriquecido -->
                <div class="mb-4">
                    <label for="content" class="block text-lg font-semibold text-gray-700 mb-2">Contenido</label>
                    <textarea id="content" name="content" rows="10" 
                              class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Campo para la fecha límite -->
                <div class="mb-4">
                    <label for="deadline" class="block text-lg font-semibold text-gray-700 mb-2">Fecha límite</label>
                    <input type="date" name="deadline" id="deadline" 
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                           required>
                </div>

                <!-- Campo para subir documentos -->
                <div class="mb-4">
                    <label for="document" class="block text-lg font-semibold text-gray-700 mb-2">Subir documento</label>
                    <input type="file" name="document" id="document" 
                           class="w-full text-gray-700 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                           accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip,.rar">
                    <p class="text-sm text-gray-500 mt-1">Formatos permitidos: PDF, Word, Excel, PowerPoint, ZIP, RAR.</p>
                </div>

                <!-- Botón de enviar -->
                <div class="text-right">
                    <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition duration-200">
                        Guardar Publicación
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Editor de texto enriquecido con Quill.js -->
    @push('scripts')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quill = new Quill('#content', {
                theme: 'snow',
                placeholder: 'Escribe aquí el contenido de la publicación...',
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],        
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['link', 'image'],
                        ['clean']                                         
                    ]
                }
            });

            // Sincronizar contenido del editor con el textarea
            const contentInput = document.querySelector('textarea[name="content"]');
            quill.on('text-change', function () {
                contentInput.value = quill.root.innerHTML;
            });
        });
    </script>
    @endpush
</x-user-layout>
