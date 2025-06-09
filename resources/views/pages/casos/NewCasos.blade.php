<x-app-layout title="Nuevo Caso" is-header-blur="true">
    <style>
        /* Estilo para que Select2 se vea como Tailwind */
        .select2-container .select2-selection--single {
            height: 2.5rem;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
            color: #374151;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.5rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 2.5rem;
            top: 0.25rem;
            right: 0.5rem;
        }

        .select2-container--default .select2-selection--single:focus {
            border-color: #3b82f6 !important;
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }
    </style>

    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="max-w-6xl mx-auto mt-10">
            <div class="bg-white shadow-xl rounded-2xl p-8 space-y-8">
                <h2 class="text-3xl font-bold text-gray-800">Registrar Nuevo Caso</h2>

                <form action="{{ route('casos/guardar') }}" method="POST" class="space-y-10">
                    @csrf

                    {{-- DATOS DEL CASO --}}
                    <div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Información del Caso</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Para compañía -->
                            <div>
                                <label for="compania_id"
                                    class="block mb-1 text-sm font-medium text-gray-600">Compañía</label>
                                <select name="compania_id" id="compania_id" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="" disabled selected>Seleccione una compañía</option>
                                    @foreach ($compañia as $item)
                                        <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Para servicio -->
                            <div>
                                <label for="servicio_id"
                                    class="block mb-1 text-sm font-medium text-gray-600">Servicio</label>
                                <select name="servicio_id" id="servicio_id" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="" disabled selected>Seleccione un servicio</option>
                                    @foreach ($servicio as $item)
                                        <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="descripcion"
                                    class="block mb-1 text-sm font-medium text-gray-600">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="fecha_incidente" class="block mb-1 text-sm font-medium text-gray-600">Fecha
                                    del Incidente</label>
                                <input type="date" name="fecha_incidente" id="fecha_incidente" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="ubicacion"
                                    class="block mb-1 text-sm font-medium text-gray-600">Ubicación</label>
                                <input type="text" name="ubicacion" id="ubicacion" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="poliza_id"
                                    class="block mb-1 text-sm font-medium text-gray-600">Póliza</label>
                                <select name="poliza_id" id="poliza_id" class="select2 ..." required>
                                    <option value="" disabled selected>Seleccione una póliza</option>
                                    @foreach (\App\Models\Polizas::all() as $poliza)
                                        <option value="{{ $poliza->id }}">{{ $poliza->numero_poliza }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="centro_medico_id"
                                    class="block mb-1 text-sm font-medium text-gray-600">Centro Médico</label>
                                <select name="centro_medico_id" id="centro_medico_id" class="select2 ..." required>
                                    <option value="" disabled selected>Seleccione una póliza</option>
                                    @foreach (\App\Models\CentrosMedicos::all() as $centro)
                                        <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    {{-- DATOS DEL LESIONADO --}}
                    <div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Datos del Lesionado</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Para tipo de documento -->
                            <div>
                                <label for="lesionado_tipo_documento"
                                    class="block mb-1 text-sm font-medium text-gray-600">Tipo de Documento</label>
                                <select name="lesionado_tipo_documento" id="lesionado_tipo_documento" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="" disabled selected>Seleccione un tipo de documento</option>
                                    @foreach ($tipoidentificacion as $item)
                                        <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="lesionado_numero_documento"
                                    class="block mb-1 text-sm font-medium text-gray-600">Número de Documento</label>
                                <input type="text" name="lesionado_numero_documento" id="lesionado_numero_documento"
                                    required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="lesionado_nombres"
                                    class="block mb-1 text-sm font-medium text-gray-600">Nombres</label>
                                <input type="text" name="lesionado_nombres" id="lesionado_nombres" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="lesionado_apellido_paterno"
                                    class="block mb-1 text-sm font-medium text-gray-600">Apellido Paterno</label>
                                <input type="text" name="lesionado_apellido_paterno" id="lesionado_apellido_paterno" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="lesionado_apellido_materno"
                                    class="block mb-1 text-sm font-medium text-gray-600">Apellido Materno</label>
                                <input type="text" name="lesionado_apellido_materno" id="lesionado_apellido_materno" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>


                        </div>
                    </div>

                    {{-- ERRORES --}}
                    @if ($errors->any())
                        <div class="p-4 bg-red-50 border border-red-400 text-red-700 rounded-lg">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- BOTÓN --}}
                    <div class="text-right">
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Guardar Caso
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Seleccione una opción',
                allowClear: true,
                width: '100%'
            });

        });
    </script>

</x-app-layout>
