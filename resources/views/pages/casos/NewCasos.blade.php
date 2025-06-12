<x-app-layout title="Nuevo Caso" is-header-blur="true">
    <style>
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
                    <div id="bloques-complementarios" style="display: none;">
                        <div id="datos-placa-section" style="display: none;">
                            {{-- DATOS PLACA --}}
                            <div class="md:mt-5">
                                <h3 class="text-xl font-semibold text-gray-700 mb-4">Datos de Placa</h3>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                                    <div>
                                        <label for="Placa"
                                            class="block mb-1 text-sm font-medium text-gray-600">Número
                                            de Placa</label>
                                        <input type="text" name="Placa" id="Placa"
                                            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            placeholder="Seleccione primero el tipo de documento" />
                                    </div>

                                    <div>
                                        <label for="FechaInicio"
                                            class="block mb-1 text-sm font-medium text-gray-600">Fecha
                                            Inicio</label>
                                        <input type="text" name="FechaInicio" id="FechaInicio" disabled
                                            class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                        <input type="hidden" name="FechaInicio" id="FechaInicio_hidden">
                                    </div>

                                    <div>
                                        <label for="FechaFin" class="block mb-1 text-sm font-medium text-gray-600">Fecha
                                            Fin</label>
                                        <input type="text" name="FechaFin" id="FechaFin" required disabled
                                            class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                        <input type="hidden" name="FechaFin" id="FechaFin_hidden">
                                    </div>

                                    <div>
                                        <label for="EstadoPlaca"
                                            class="block mb-1 text-sm font-medium text-gray-600">Estado
                                            Placa</label>
                                        <input type="text" name="EstadoPlaca" id="EstadoPlaca" required disabled
                                            class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                        <input type="hidden" name="EstadoPlaca" id="EstadoPlaca_hidden">
                                    </div>

                                    <div>
                                        <label for="NombreClaseVehiculo"
                                            class="block mb-1 text-sm font-medium text-gray-600">Clase
                                            Vehiculo</label>
                                        <input type="text" name="NombreClaseVehiculo" id="NombreClaseVehiculo"
                                            required disabled
                                            class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                        <input type="hidden" name="NombreClaseVehiculo"
                                            id="NombreClaseVehiculo_hidden">
                                    </div>

                                    <div>
                                        <label for="TipoCertificado"
                                            class="block mb-1 text-sm font-medium text-gray-600">Tipo
                                            Certificado</label>
                                        <input type="text" name="TipoCertificado" id="TipoCertificado" required
                                            disabled
                                            class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                        <input type="hidden" name="TipoCertificado" id="TipoCertificado_hidden">
                                    </div>

                                    <div>
                                        <label for="NumeroAseguradora"
                                            class="block mb-1 text-sm font-medium text-gray-600">Número
                                            Aseguradora</label>
                                        <input type="text" name="NumeroAseguradora" id="NumeroAseguradora" required
                                            disabled
                                            class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                        <input type="hidden" name="NumeroAseguradora" id="NumeroAseguradora_hidden">
                                    </div>


                                </div>
                            </div>
                        </div>

                        {{-- DATOS DEL LESIONADO --}}
                        <div class="md:mt-5">
                            <h3 class="text-xl font-semibold text-gray-700 mb-4">Datos del Lesionado</h3>

                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                <!-- Para tipo de documento -->
                                <div>
                                    <label for="lesionado_tipo_documento"
                                        class="block mb-1 text-sm font-medium text-gray-600">Tipo de Documento</label>
                                    <select name="lesionado_tipo_documento" id="lesionado_tipo_documento" required
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="" disabled selected>Seleccione un tipo de documento
                                        </option>
                                        @foreach ($tipoidentificacion as $item)
                                            <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="lesionado_numero_documento"
                                        class="block mb-1 text-sm font-medium text-gray-600">Número de
                                        Documento</label>
                                    <input type="text" name="lesionado_numero_documento"
                                        id="lesionado_numero_documento" required disabled
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Seleccione primero el tipo de documento" />
                                </div>

                                <div>
                                    <label for="lesionado_nombres"
                                        class="block mb-1 text-sm font-medium text-gray-600">Nombres</label>
                                    <input type="text" name="lesionado_nombres" id="lesionado_nombres" required
                                        disabled
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                    <input type="hidden" name="lesionado_nombres" id="lesionado_nombres_hidden">
                                </div>

                                <div>
                                    <label for="lesionado_apellido_paterno"
                                        class="block mb-1 text-sm font-medium text-gray-600">Apellido Paterno</label>
                                    <input type="text" name="lesionado_apellido_paterno"
                                        id="lesionado_apellido_paterno" required disabled
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                    <input type="hidden" name="lesionado_apellido_paterno"
                                        id="lesionado_apellido_paterno_hidden">
                                    <input type="hidden" name="lesionado_apellido_materno"
                                        id="lesionado_apellido_materno_hidden">
                                </div>

                                <div>
                                    <label for="lesionado_apellido_materno"
                                        class="block mb-1 text-sm font-medium text-gray-600">Apellido Materno</label>
                                    <input type="text" name="lesionado_apellido_materno"
                                        id="lesionado_apellido_materno" required disabled
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                </div>


                            </div>
                        </div>

                        {{-- DATOS DEL CASO --}}
                        <div class="md:mt-5">
                            <h3 class="text-xl font-semibold text-gray-700 mb-4">Información del Caso</h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                                <div>
                                    <label for="fecha_incidente"
                                        class="block mb-1 text-sm font-medium text-gray-600">Fecha
                                        del Incidente</label>
                                    <input type="date" name="fecha_incidente" id="fecha_incidente" required
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                </div>

                                <div>
                                    <label for="ubicacion"
                                        class="block mb-1 text-sm font-medium text-gray-600">Ubicación</label>
                                    <input type="text" name="ubicacion" id="ubicacion" required
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase" />
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
                                    <select name="centro_medico_id" id="centro_medico_id" class="select2 ..."
                                        required>
                                        <option value="" disabled selected>Seleccione un centro médico</option>
                                        @foreach (\App\Models\CentrosMedicos::all() as $centro)
                                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="md:col-span-4">
                                    <label for="descripcion"
                                        class="block mb-1 text-sm font-medium text-gray-600">Descripción</label>
                                    <textarea name="descripcion" id="descripcion" rows="4" required
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase"
                                        placeholder="Describa los detalles del incidente..."></textarea>
                                </div>

                            </div>
                        </div>

                        {{-- MEDICO AUDITOR --}}
                        <div class="md:mt-5">
                            <h3 class="text-xl font-semibold text-gray-700 mb-4">Médico Auditor</h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                <div>
                                    <label for="medico_auditorID"
                                        class="block mb-1 text-sm font-medium text-gray-600">Médico</label>
                                    <select name="medico_auditorID" id="medico_auditorID" required
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="" disabled selected>Seleccione un médico</option>
                                        @foreach (\App\Models\Medicos_Auditores::all() as $medico)
                                            <option value="{{ $medico->id }}" data-email="{{ $medico->email }}">
                                                {{ $medico->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="email"
                                        class="block mb-1 text-sm font-medium text-gray-600">Correo</label>
                                    <input type="text" name="email" id="email" required
                                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase" />
                                </div>
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

        <div id="spinner-overlay" class="fixed inset-0 flex items-center justify-center z-50 hidden">
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
                                $('#lesionado_nombres_hidden').val(response.nombres);

                                $('#lesionado_apellido_paterno').val(response.apellido_paterno);
                                $('#lesionado_apellido_paterno_hidden').val(response
                                    .apellido_paterno);

                                $('#lesionado_apellido_materno').val(response.apellido_materno);
                                $('#lesionado_apellido_materno_hidden').val(response
                                    .apellido_materno);

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

        document.addEventListener('DOMContentLoaded', function() {
            const companiaSelect = document.getElementById('compania_id');
            const servicioSelect = document.getElementById('servicio_id');
            const seccionOculta = document.getElementById('bloques-complementarios');
            const datosPlacaSection = document.getElementById('datos-placa-section');

            function toggleSecciones() {
                const companiaSeleccionada = companiaSelect.value !== '';
                const servicioSeleccionado = servicioSelect.value !== '';
                const esServicio2 = servicioSelect.value === '2'; // Verifica si el servicio es 2

                if (companiaSeleccionada && servicioSeleccionado) {
                    seccionOculta.style.display = 'block';

                    // Mostrar u ocultar sección de placa según el servicio
                    datosPlacaSection.style.display = esServicio2 ? 'block' : 'none';

                    // Limpiar campos si no es servicio 2
                    if (!esServicio2) {
                        $('#Placa').val('');
                        $('#FechaInicio').val('');
                        $('#FechaFin').val('');
                        $('#EstadoPlaca').val('');
                        $('#NombreClaseVehiculo').val('');
                        $('#TipoCertificado').val('');
                        $('#NumeroAseguradora').val('');
                    }
                } else {
                    seccionOculta.style.display = 'none';
                }
            }

            companiaSelect.addEventListener('change', toggleSecciones);
            servicioSelect.addEventListener('change', toggleSecciones);
        });

        $(document).ready(function() {
            $('#Placa').on('blur', function() {
                var Placa = $(this).val().trim();

                if (Placa.length === 6) {
                    $.ajax({
                        url: '{{ route('consulta.placa') }}',
                        method: 'POST',
                        data: {
                            Placa: Placa,
                            _token: '{{ csrf_token() }}'
                        },
                        beforeSend: function() {
                            $('#spinner-overlay').removeClass('hidden');
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#Placa').val(response.Placa);
                                $('#Placa_hidden').val(response.Placa);

                                const fechaInicio = response.FechaInicio.split('/').reverse()
                                    .join('-');
                                const fechaFin = response.FechaFin.split('/').reverse().join(
                                    '-');

                                $('#FechaInicio').val(response.FechaInicio);
                                $('#FechaInicio_hidden').val(response.FechaInicio);

                                $('#FechaFin').val(response.FechaFin);
                                $('#FechaFin_hidden').val(response.FechaFin);

                                $('#EstadoPlaca').val(response.Estado);
                                $('#EstadoPlaca_hidden').val(response.Estado);

                                $('#NombreClaseVehiculo').val(response.NombreClaseVehiculo);
                                $('#NombreClaseVehiculo_hidden').val(response
                                    .NombreClaseVehiculo);

                                $('#TipoCertificado').val(response.TipoCertificado);
                                $('#TipoCertificado_hidden').val(response.TipoCertificado);

                                $('#NumeroAseguradora').val(response.NumeroAseguradora);
                                $('#NumeroAseguradora_hidden').val(response.NumeroAseguradora);

                            } else {
                                alert('No se encontró información para la Placa ingresada.');
                                $('#Placa').val('');
                                $('#FechaInicio').val('');
                                $('#FechaFin').val('');
                            }
                        },
                        error: function() {
                            alert('Error al consultar la Placa.');
                            $('#Placa').val('');
                            $('#FechaInicio').val('');
                            $('#FechaFin').val('');
                        },
                        complete: function() {
                            $('#spinner-overlay').addClass('hidden');
                        }
                    });

                }
            });
        });

        $(document).ready(function() {
            $('#medico_auditorID').change(function() {
                var selectedOption = $(this).find('option:selected');
                var email = selectedOption.data('email');

                $('#email').val(email);
            });
        });
    </script>

</x-app-layout>
