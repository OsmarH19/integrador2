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
                <h2 class="text-3xl font-bold text-gray-800">Nuevo Caso</h2>

                <form action="{{ route('casos.store') }}" method="POST" class="space-y-10">
                    @csrf

                    {{-- TIPO DE CASO --}}
                    <div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Tipo de Caso</h3>
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

                        </div>
                    </div>

                    {{-- DATOS DEL LESIONADO --}}
                    <div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Datos del Lesionado</h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

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
                                    required disabled
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Seleccione primero el tipo de documento" />
                            </div>

                            <div>
                                <label for="lesionado_nombres"
                                    class="block mb-1 text-sm font-medium text-gray-600">Nombres</label>
                                <input type="text" name="lesionado_nombres" id="lesionado_nombres" required disabled
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="lesionado_apellido_paterno"
                                    class="block mb-1 text-sm font-medium text-gray-600">Apellido Paterno</label>
                                <input type="text" name="lesionado_apellido_paterno" id="lesionado_apellido_paterno"
                                    required disabled
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <div>
                                <label for="lesionado_apellido_materno"
                                    class="block mb-1 text-sm font-medium text-gray-600">Apellido Materno</label>
                                <input type="text" name="lesionado_apellido_materno" id="lesionado_apellido_materno"
                                    required disabled
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            </div>


                        </div>
                    </div>

                    {{-- DATOS DEL CASO --}}
                    <div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Información del Caso</h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

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

                            <div class="md:col-span-4">
                                <label for="descripcion"
                                    class="block mb-1 text-sm font-medium text-gray-600">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4" required
                                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Describa los detalles del incidente..."></textarea>
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Guardar Caso
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="spinner-overlay"
            class="fixed inset-0 flex items-center justify-center z-50 hidden">
            <div class="w-16 h-16 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
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


        $(document).ready(function() {
            $('#lesionado_numero_documento').on('blur', function() {
                var dni = $(this).val().trim();

                if (dni.length === 8) {
                    $.ajax({
                        url: '{{ route('consulta.dni') }}',
                        method: 'POST',
                        data: {
                            dni: dni,
                            _token: '{{ csrf_token() }}'
                        },
                        beforeSend: function() {
                            $('#spinner-overlay').removeClass('hidden');
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#lesionado_nombres').val(response.nombres);
                                $('#lesionado_apellido_paterno').val(response.apellido_paterno);
                                $('#lesionado_apellido_materno').val(response.apellido_materno);
                            } else {
                                alert('No se encontró información para el DNI ingresado.');
                                $('#lesionado_nombres').val('');
                                $('#lesionado_apellido_paterno').val('');
                                $('#lesionado_apellido_materno').val('');
                            }
                        },
                        error: function() {
                            alert('Error al consultar el DNI.');
                            $('#lesionado_nombres').val('');
                            $('#lesionado_apellido_paterno').val('');
                            $('#lesionado_apellido_materno').val('');
                        },
                        complete: function() {
                            $('#spinner-overlay').addClass('hidden');
                        }
                    });

                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const tipoDocumento = document.getElementById('lesionado_tipo_documento');
            const numeroDocumento = document.getElementById('lesionado_numero_documento');

            tipoDocumento.addEventListener('change', function() {
                if (this.value) {
                    // Habilitar campo si se seleccionó un tipo de documento
                    numeroDocumento.disabled = false;
                    numeroDocumento.classList.remove('bg-gray-100');
                    numeroDocumento.placeholder = '';
                } else {
                    // Deshabilitar campo si no hay selección
                    numeroDocumento.disabled = true;
                    numeroDocumento.classList.add('bg-gray-100');
                    numeroDocumento.value = '';
                    numeroDocumento.placeholder = 'Seleccione primero el tipo de documento';
                }
            });
        });
    </script>

</x-app-layout>
