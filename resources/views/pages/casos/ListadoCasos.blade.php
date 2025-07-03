<x-app-layout title="Listado Casos" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8" x-data="casos">
        <div id="TipoCatalogo">
            <div class="mt-12 text-start flex flex-wrap items-start justify-between gap-6 w-full">
                <h3 class="text-xl font-semibold text-slate-600 dark:text-navy-100">
                    Listado Casos </h3>
                @if (Auth::user()->rolID == 12 || Auth::user()->rolID == 11)
                    <div class="pr-5">
                        <a href="{{ route('layouts/casos') }}"
                            class="btn rounded-xl bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            <span>Nuevo</span>
                            <i class="fa-solid fa-plus pl-2.5"></i>
                        </a>
                    </div>
                @endif

            </div>
            <div class="py-4">
                <div>
                    <div class="uppercase text-xs" x-data x-init="$nextTick(() => {
                        $el._x_grid = new Gridjs.Grid({
                            from: $refs.table,
                            sort: true,
                            search: true,
                            pagination: {
                                enabled: true,
                                limit: 7
                            },
                            language: {
                                search: { placeholder: 'Buscar...' },
                                pagination: {
                                    previous: 'Anterior',
                                    next: 'Siguiente',
                                    showing: 'Mostrando',
                                    of: 'de',
                                    to: 'a',
                                    results: () => 'Resultados'
                                }
                            }
                        }).render($refs.wrapper);
                    })">


                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table x-ref="table" class="w-full text-left">
                                <thead>
                                    <tr>
                                        @if (Auth::user()->rolID == 12 || Auth::user()->rolID == 10)
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Ver
                                            </th>
                                        @endif
                                        @if (Auth::user()->rolID == 12 || Auth::user()->rolID == 10)
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                Editar
                                            </th>
                                        @endif
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Centro Médico
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            N° Placa
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Descipción
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Fecha Incidente
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Nombre
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Apellido Paterno
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Apellido Materno
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Tipo Documento
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Número Documento
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            COLABORADOR
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($casos as $caso)
                                        {{-- {{ dd($caso->compania->nombre) }} --}}
                                        <tr class="hover:bg-slate-50 dark:hover:bg-navy-600">
                                            @if (Auth::user()->rolID == 12 || Auth::user()->rolID == 10)
                                                <td class="whitespace-nowrap px-3 py-2">
                                                    @if ($caso->pdf_path)
                                                        <a href="{{ asset('storage/' . $caso->pdf_path) }}"
                                                            target="_blank" rel="noopener noreferrer"
                                                            class="btn size-7 p-0 text-info hover:bg-info/20"
                                                            title="Ver PDF">
                                                            <i class="fa-regular fa-file-pdf text-xs"></i>
                                                        </a>
                                                    @else
                                                        <button
                                                            class="btn size-7 p-0 text-gray-400 hover:bg-gray-100/20"
                                                            title="PDF no disponible" disabled>
                                                            <i class="fa-regular fa-file-pdf text-xs"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            @endif
                                            @if (Auth::user()->rolID == 12 || Auth::user()->rolID == 10)
                                                <td class="whitespace-nowrap px-3 py-2">
                                                    <button
                                                        @click="showModal = true; cargarDatosCaso({{ json_encode($caso) }})"
                                                        class="btn size-7 p-0 text-info hover:bg-gray-100/20"
                                                        title="Editar Caso">
                                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                                    </button>
                                                </td>
                                            @endif
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ $caso->centroMedico->nombre ?? 'N/A' }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ $caso->Placa ?? 'N/A' }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->descripcion }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ \Carbon\Carbon::parse($caso->fecha_incidente)->format('d/m/Y') }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ $caso->lesionado_nombres }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ $caso->lesionado_apellido_paterno }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ $caso->lesionado_apellido_materno }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ $caso->tipoDocumento->nombre ?? 'N/A' }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ $caso->lesionado_numero_documento }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                {{ $caso->creador ? $caso->creador->name : 'Usuario no encontrado' }}
                                            </td>

                                            <td class="whitespace-nowrap px-3 py-2 uppercase">
                                                @if ($caso->creador)
                                                    {{ $caso->creador->name }}
                                                @else
                                                    <span class="text-gray-400">Registro no encontrado</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <template x-teleport="#x-teleport-target">
                                <div class="fixed inset-0 z-100 flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                    x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">

                                    <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                        @click="showModal = false" x-show="showModal" x-transition:enter="ease-out"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"></div>

                                    <div class="overflow-y-auto relative w-full max-w-4xl origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                                        x-show="showModal" x-transition:enter="easy-out"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in"
                                        x-transition:leave-start="opacity-100 scale-100"
                                        x-transition:leave-end="opacity-0 scale-95">

                                        <div
                                            class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                            <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                                Editar Caso - ID: <span x-text="currentCaso.id"></span>
                                            </h3>
                                            <button @click="showModal = false"
                                                class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="px-4 py-4 sm:px-5">
                                            <div class="space-y-6">
                                                <!-- TIPO DE CASO -->
                                                <div>
                                                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Tipo de Caso
                                                    </h3>
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                        <!-- Compañía -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Compañía</label>
                                                            <select x-model="currentCaso.compania_id"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                                <option value="" disabled>Seleccione una compañía
                                                                </option>
                                                                @foreach ($compañia as $item)
                                                                    <option value="{{ $item->codigo }}">
                                                                        {{ $item->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Servicio -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Servicio</label>
                                                            <select x-model="currentCaso.servicio_id"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                                <option value="" disabled>Seleccione un servicio
                                                                </option>
                                                                @foreach ($servicio as $item)
                                                                    <option value="{{ $item->codigo }}">
                                                                        {{ $item->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- DATOS DE PLACA (solo visible para servicio 2) -->
                                                <div x-show="currentCaso.servicio_id == '2'" x-transition>
                                                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Datos de Placa
                                                    </h3>
                                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Número
                                                                de Placa</label>
                                                            <input x-model="currentCaso.Placa" type="text"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                @blur="consultarPlaca($event.target.value)" />
                                                        </div>

                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Fecha
                                                                Inicio</label>
                                                            <input x-model="currentCaso.FechaInicio" type="text"
                                                                disabled
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500" />
                                                        </div>

                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Fecha
                                                                Fin</label>
                                                            <input x-model="currentCaso.FechaFin" type="text"
                                                                disabled
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500" />
                                                        </div>

                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Estado
                                                                Placa</label>
                                                            <input x-model="currentCaso.EstadoPlaca" type="text"
                                                                disabled
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500" />
                                                        </div>

                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Clase
                                                                Vehiculo</label>
                                                            <input x-model="currentCaso.NombreClaseVehiculo"
                                                                type="text" disabled
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500" />
                                                        </div>

                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Tipo
                                                                Certificado</label>
                                                            <input x-model="currentCaso.TipoCertificado"
                                                                type="text" disabled
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500" />
                                                        </div>

                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Número
                                                                Aseguradora</label>
                                                            <input x-model="currentCaso.NumeroAseguradora"
                                                                type="text" disabled
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- DATOS DEL LESIONADO -->
                                                <div>
                                                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Datos del
                                                        Lesionado</h3>
                                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                                        <!-- Tipo de documento -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Tipo
                                                                de Documento</label>
                                                            <select x-model="currentCaso.lesionado_tipo_documento"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                                <option value="" disabled>Seleccione un tipo
                                                                </option>
                                                                @foreach ($tipoidentificacion as $item)
                                                                    <option value="{{ $item->codigo }}">
                                                                        {{ $item->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Número de documento -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Número
                                                                de Documento</label>
                                                            <input x-model="currentCaso.lesionado_numero_documento"
                                                                type="text"
                                                                :disabled="!currentCaso.lesionado_tipo_documento"
                                                                :class="{
                                                                    'bg-gray-100': !currentCaso
                                                                        .lesionado_tipo_documento,
                                                                    'bg-white': currentCaso
                                                                        .lesionado_tipo_documento
                                                                }"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                @blur="currentCaso.lesionado_tipo_documento == '1' ? consultarDni($event.target.value) : ''" />
                                                        </div>

                                                        <!-- Nombres -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Nombres</label>
                                                            <input x-model="currentCaso.lesionado_nombres"
                                                                type="text"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase" />
                                                        </div>

                                                        <!-- Apellido Paterno -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Apellido
                                                                Paterno</label>
                                                            <input x-model="currentCaso.lesionado_apellido_paterno"
                                                                type="text"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase" />
                                                        </div>

                                                        <!-- Apellido Materno -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Apellido
                                                                Materno</label>
                                                            <input x-model="currentCaso.lesionado_apellido_materno"
                                                                type="text"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- INFORMACIÓN DEL CASO -->
                                                <div>
                                                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Información
                                                        del Caso</h3>
                                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                                        <!-- Fecha Incidente -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Fecha
                                                                del Incidente</label>
                                                            <input x-model="currentCaso.fecha_incidente"
                                                                type="date"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                                        </div>

                                                        <!-- Ubicación -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Ubicación</label>
                                                            <input x-model="currentCaso.ubicacion" type="text"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase" />
                                                        </div>

                                                        <!-- Póliza -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Póliza</label>
                                                            <select x-model="currentCaso.poliza_id"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm">
                                                                <option value="" disabled>Seleccione una póliza
                                                                </option>
                                                                @foreach (\App\Models\Polizas::all() as $poliza)
                                                                    <option value="{{ $poliza->id }}">
                                                                        {{ $poliza->numero_poliza }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Centro Médico -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Centro
                                                                Médico</label>
                                                            <select x-model="currentCaso.centro_medico_id"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm">
                                                                <option value="" disabled>Seleccione un centro
                                                                </option>
                                                                @foreach (\App\Models\CentrosMedicos::all() as $centro)
                                                                    <option value="{{ $centro->id }}">
                                                                        {{ $centro->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Descripción -->
                                                        <div class="md:col-span-4">
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Descripción</label>
                                                            <textarea x-model="currentCaso.descripcion" rows="4"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- MÉDICO AUDITOR -->
                                                <div>
                                                    <h3 class="text-xl font-semibold text-gray-700 mb-4">Médico Auditor
                                                    </h3>
                                                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                                                        <!-- Médico -->
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Médico</label>
                                                            <select x-model="currentCaso.medico_auditorID"
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                @change="updateMedicoEmail($event)">
                                                                <option value="" disabled>Seleccione un médico
                                                                </option>
                                                                @foreach (\App\Models\Medicos_Auditores::all() as $medico)
                                                                    <option value="{{ $medico->id }}"
                                                                        data-email="{{ $medico->email }}">
                                                                        {{ $medico->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="hidden">
                                                            <label
                                                                class="block mb-1 text-sm font-medium text-gray-600">Correo</label>
                                                            <input x-model="currentCaso.medico_email" type="text"
                                                                disabled
                                                                class="w-full px-4 py-2 border rounded-lg shadow-sm bg-gray-50 text-gray-500" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- BOTONES -->
                                                <div class="flex justify-end space-x-3 pt-4">
                                                    <button @click="showModal = false" type="button"
                                                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                                                        Cancelar
                                                    </button>
                                                    <button @click="guardarCambios()" type="button"
                                                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Guardar Cambios
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                        <div x-ref="wrapper"></div>

                    </div>


                </div>
            </div>
        </div>
    </main>
    {{-- <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('casos', () => ({
                showModal: false,
                currentCaso: {
                    id: null,
                    centro_medico_id: '',
                    Placa: '',
                    descripcion: '',
                    fecha_incidente: '',
                    lesionado_nombres: '',
                    lesionado_apellido_paterno: '',
                    lesionado_apellido_materno: '',
                    tipo_documento_id: '',
                    lesionado_numero_documento: ''
                },

                init() {
                    // Inicialización si es necesaria
                },

                cargarDatosCaso(caso) {
                    this.currentCaso = {
                        id: caso.id,
                        centro_medico_id: caso.centro_medico_id,
                        Placa: caso.Placa || '',
                        descripcion: caso.descripcion || '',
                        fecha_incidente: this.formatDateForInput(caso.fecha_incidente),
                        lesionado_nombres: caso.lesionado_nombres || '',
                        lesionado_apellido_paterno: caso.lesionado_apellido_paterno || '',
                        lesionado_apellido_materno: caso.lesionado_apellido_materno || '',
                        tipo_documento_id: caso.tipo_documento_id || '',
                        lesionado_numero_documento: caso.lesionado_numero_documento || ''
                    };
                    this.showModal = true;
                },

                formatDateForInput(dateString) {
                    if (!dateString) return '';
                    const date = new Date(dateString);
                    return date.toISOString().split('T')[0];
                },

                async guardarCambios() {
                    try {
                        const response = await fetch(`/casos/${this.currentCaso.id}/update`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(this.currentCaso)
                        });

                        const data = await response.json();

                        if (data.success) {
                            window.location.reload(); // Recargar la página para ver los cambios
                        } else {
                            console.error('Error al guardar:', data.message);
                            alert('Error al guardar los cambios: ' + data.message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Error al conectar con el servidor');
                    }
                }
            }));
        });
    </script> --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('casos', () => ({
                showModal: false,
                currentCaso: {
                    id: null,
                    compania_id: '',
                    servicio_id: '',
                    Placa: '',
                    FechaInicio: '',
                    FechaFin: '',
                    EstadoPlaca: '',
                    NombreClaseVehiculo: '',
                    TipoCertificado: '',
                    NumeroAseguradora: '',
                    lesionado_tipo_documento: '',
                    lesionado_numero_documento: '',
                    lesionado_nombres: '',
                    lesionado_apellido_paterno: '',
                    lesionado_apellido_materno: '',
                    fecha_incidente: '',
                    ubicacion: '',
                    poliza_id: '',
                    centro_medico_id: '',
                    descripcion: '',
                    medico_auditorID: '',
                    medico_email: '',
                    estado: 0
                },

                init() {
                    // Inicialización si es necesaria
                },

                cargarDatosCaso(caso) {
                    // Formatear fechas para inputs date
                    const fechaIncidente = caso.fecha_incidente ? new Date(caso.fecha_incidente)
                        .toISOString().split('T')[0] : '';
                    const fechaInicio = caso.FechaInicio ? new Date(caso.FechaInicio)
                        .toLocaleDateString('es-PE') : '';
                    const fechaFin = caso.FechaFin ? new Date(caso.FechaFin).toLocaleDateString(
                        'es-PE') : '';

                    this.currentCaso = {
                        ...caso,
                        fecha_incidente: fechaIncidente,
                        FechaInicio: fechaInicio,
                        FechaFin: fechaFin,
                        medico_email: caso.medico_auditor ? caso.medico_auditor.email : ''
                    };
                    this.showModal = true;

                    // Inicializar Select2 para los selects
                    this.$nextTick(() => {
                        $('.select2').select2({
                            placeholder: 'Seleccione una opción',
                            allowClear: true,
                            width: '100%'
                        });
                    });
                },

                updateMedicoEmail(event) {
                    const selectedOption = event.target.options[event.target.selectedIndex];
                    this.currentCaso.medico_email = selectedOption.dataset.email || '';
                },

                async consultarDni(dni) {
                    if (dni.length !== 8) return;

                    try {
                        const response = await fetch('{{ route('consulta.dni') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                dni
                            })
                        });

                        const data = await response.json();

                        if (data.success) {
                            this.currentCaso.lesionado_nombres = data.nombres;
                            this.currentCaso.lesionado_apellido_paterno = data.apellido_paterno;
                            this.currentCaso.lesionado_apellido_materno = data.apellido_materno;
                            toastr.success('Datos del DNI consultados correctamente');
                        } else {
                            toastr.error('No se encontró información para el DNI ingresado');
                        }
                    } catch (error) {
                        console.error('Error al consultar DNI:', error);
                        toastr.error('Error al consultar el DNI');
                    }
                },

                async consultarPlaca(placa) {
                    if (placa.length !== 6) return;

                    try {
                        const response = await fetch('{{ route('consulta.placa') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                Placa: placa
                            })
                        });

                        const data = await response.json();

                        if (data.success) {
                            this.currentCaso.Placa = data.Placa;
                            this.currentCaso.FechaInicio = data.FechaInicio;
                            this.currentCaso.FechaFin = data.FechaFin;
                            this.currentCaso.EstadoPlaca = data.Estado;
                            this.currentCaso.NombreClaseVehiculo = data.NombreClaseVehiculo;
                            this.currentCaso.TipoCertificado = data.TipoCertificado;
                            this.currentCaso.NumeroAseguradora = data.NumeroAseguradora;
                            toastr.success('Datos de la placa consultados correctamente');
                        } else {
                            toastr.error(data.message ||
                                'No se encontró información para la placa ingresada');
                        }
                    } catch (error) {
                        console.error('Error al consultar placa:', error);
                        toastr.error('Error al consultar la placa');
                    }
                },

                async guardarCambios() {
                    try {
                        const datos = {
                            p_caso_id: this.currentCaso.id,
                            p_compania_id: this.currentCaso.compania_id,
                            p_servicio_id: this.currentCaso.servicio_id,
                            p_descripcion: this.currentCaso.descripcion,
                            p_fecha_incidente: this.currentCaso.fecha_incidente,
                            p_ubicacion: this.currentCaso.ubicacion,
                            p_lesionado_nombres: this.currentCaso.lesionado_nombres,
                            p_lesionado_apellido_paterno: this.currentCaso
                                .lesionado_apellido_paterno,
                            p_lesionado_apellido_materno: this.currentCaso
                                .lesionado_apellido_materno,
                            p_lesionado_tipo_documento: this.currentCaso
                                .lesionado_tipo_documento,
                            p_lesionado_numero_documento: this.currentCaso
                                .lesionado_numero_documento,
                            p_poliza_id: this.currentCaso.poliza_id,
                            p_centro_medico_id: this.currentCaso.centro_medico_id,
                            p_estado: this.currentCaso.estado || 0, // Valor por defecto
                            p_Placa: this.currentCaso.Placa || null,
                            p_FechaInicio: this.currentCaso.FechaInicio || null,
                            p_FechaFin: this.currentCaso.FechaFin || null,
                            p_EstadoPlaca: this.currentCaso.EstadoPlaca || null,
                            p_NombreClaseVehiculo: this.currentCaso.NombreClaseVehiculo || null,
                            p_TipoCertificado: this.currentCaso.TipoCertificado || null,
                            p_NumeroAseguradora: this.currentCaso.NumeroAseguradora || null,
                            p_medico_auditorID: this.currentCaso.medico_auditorID ||
                                null // Asegúrate de que no falte
                        };

                        const response = await fetch('{{ route('casos.update') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(datos)
                        });

                        const result = await response.json();

                        if (result.success) {
                            toastr.success('Caso actualizado correctamente');
                            this.showModal = false;
                            window.location.reload();
                        } else {
                            toastr.error(result.message || 'Error al actualizar el caso');
                        }

                    } catch (error) {
                        toastr.error('Error al conectar con el servidor');
                        console.error('Error:', error);
                    }
                }
            }));
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Fancybox.bind("[data-fancybox='pdf-preview']", {
                iframe: {
                    preload: false,
                    attr: {
                        allow: 'autoplay; fullscreen',
                        sandbox: 'allow-scripts allow-same-origin allow-popups allow-forms'
                    }
                },
                thumbs: false,
                toolbar: true,
                closeButton: true,
                fullscreen: true,
                dragToClose: true,
            });
        });
    </script>
</x-app-layout>
