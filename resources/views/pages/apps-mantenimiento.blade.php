<x-app-layout title="Application List" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-12 text-start flex flex-wrap items-start justify-between gap-6 w-full">
            <h3 class="text-xl font-semibold text-slate-600 dark:text-navy-100">
                CATÁLOGO MAESTROS </h3>

            <div x-data="{ showModal: false, nombre: '', descripcion: '' }" class="pr-5">
                <button @click="showModal = true"
                class="btn rounded-xl bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                  <span>Nuevo Catálogo</span>
                  <i class="fa-regular fa-folder pl-2.5"></i>
                </button>

                <template x-teleport="#x-teleport-target">
                    <div class="fixed inset-0 z-100 flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                        x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">

                        <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                            @click="showModal = false" x-show="showModal"
                            x-transition:enter="ease-out"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"></div>

                        <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                            x-show="showModal"
                            x-transition:enter="easy-out"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="easy-in"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95">

                            <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                    Nuevo Catálogo
                                </h3>
                                <button @click="showModal = !showModal"
                                    class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="px-4 py-4 sm:px-5">
                                <div class="mt-4 space-y-4">
                                    <label class="block">
                                        <span>Tipo de Catálogo:</span>
                                        <input x-model="nombre" name="NombreTipo" type="text"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Tipo de catálogo" />
                                    </label>
                                    <label class="block">
                                        <span>Descripción:</span>
                                        <input x-model="descripcion" name="Descripcion" type="text"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Descripción" />
                                    </label>

                                    <div class="space-x-2 text-right">
                                        <button @click="showModal = false"
                                            class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                            Cancelar
                                        </button>
                                        <button
                                            @click="crearNuevoCatalogo(nombre, descripcion, () => showModal = false)"
                                            class="btn min-w-[7rem] rounded-full bg-primary text-white">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

        </div>
        <div class="py-4">
            <div>
                <div x-data="{ mostrarDetalle: false }" class="uppercase text-xs" x-init="$el._x_grid = new Gridjs.Grid({
                    from: $refs.table,
                    sort: true,
                    search: true,
                    pagination: {
                        enabled: true,
                        limit: 4
                    },
                    language: {
                        search: {
                            placeholder: 'Buscar...'
                        },
                        pagination: {
                            previous: 'Anterior',
                            next: 'Siguiente',
                            showing: 'Mostrando',
                            of: 'de',
                            to: 'a',
                            results: () => 'Resultados'
                        }
                    }
                }).render($refs.wrapper);">

                    <div x-show="!mostrarDetalle" class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table x-ref="table" class="w-full text-left">
                            <thead>
                                <tr>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        TIPO CATÁLOGO
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        DESCRIPCIÓN
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        ESTADO
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        ACCIONES
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($catmaestro as $item)
                                    <tr class="hover:bg-slate-50 dark:hover:bg-navy-600">
                                        <td class="whitespace-nowrap px-3 py-2">{{ $item->NombreTipo }}</td>
                                        <td class="whitespace-nowrap px-3 py-2">{{ $item->Descripcion }}</td>
                                        <td class="whitespace-nowrap px-3 py-2">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium border
                                            {{ $item->estado ? 'bg-red-50 text-red-700 border-red-200' : 'bg-green-50 text-green-700 border-green-200' }}">
                                                {{ $item->estado ? 'Inactivo' : 'Activo' }}
                                            </span>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-2">
                                            <div class="flex space-x-1">
                                                <div x-data="{ showModal: false, nombre: '{{ $item->NombreTipo }}', descripcion: '{{ $item->Descripcion }}' }">
                                                    <button @click="showModal = true"
                                                        class="btn size-7 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa fa-edit text-xs"></i>
                                                    </button>
                                                    <template x-teleport="#x-teleport-target">
                                                        <div class="fixed inset-0 z-100 flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                                            x-show="showModal" role="dialog"
                                                            @keydown.window.escape="showModal = false">
                                                            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                                                @click="showModal = false" x-show="showModal"
                                                                x-transition:enter="ease-out"
                                                                x-transition:enter-start="opacity-0"
                                                                x-transition:enter-end="opacity-100"
                                                                x-transition:leave="ease-in"
                                                                x-transition:leave-start="opacity-100"
                                                                x-transition:leave-end="opacity-0"></div>
                                                            <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                                                                x-show="showModal" x-transition:enter="easy-out"
                                                                x-transition:enter-start="opacity-0 scale-95"
                                                                x-transition:enter-end="opacity-100 scale-100"
                                                                x-transition:leave="easy-in"
                                                                x-transition:leave-start="opacity-100 scale-100"
                                                                x-transition:leave-end="opacity-0 scale-95">
                                                                <div
                                                                    class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                                                    <h3
                                                                        class="text-base font-medium text-slate-700 dark:text-navy-100">
                                                                        Editar Catálogo
                                                                    </h3>
                                                                    <button @click="showModal = !showModal"
                                                                        class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="size-4.5" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                                            stroke-width="2">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="px-4 py-4 sm:px-5">
                                                                    <div class="mt-4 space-y-4">
                                                                        <label class="block">
                                                                            <span>Tipo de Catálogo:</span>
                                                                            <input
                                                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                                placeholder="Description"
                                                                                x-model="nombre" name="NombreTipo"
                                                                                placeholder="Tipo de catálogo"
                                                                                type="text" />
                                                                        </label>
                                                                        <label class="block">
                                                                            <span>Descripción:</span>
                                                                            <input
                                                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                                x-model="descripcion"
                                                                                name="Descripcion"
                                                                                placeholder="Descripción"
                                                                                type="text" />
                                                                        </label>
                                                                        <div class="space-x-2 text-right">
                                                                            <button @click="showModal = false"
                                                                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                                Cancel
                                                                            </button>
                                                                            <button
                                                                                @click="actualizarCatalogo({{ $item->TipoID }}, nombre, descripcion, () => showModal = false)"
                                                                                class="btn min-w-[7rem] rounded-full bg-primary text-white">
                                                                                Guardar
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                                <button
                                                    @click="mostrarDetalle = true; obtenerDatos({{ $item->TipoID }})"
                                                    class="btn size-7 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                    <i class="fa-solid fa-bars"></i>
                                                </button>

                                                <!-- Botón de Desactivación -->
                                                @if ($item->estado == 0)
                                                    <button @click="DesacItem({{ $item->TipoID }})"
                                                        class="btn size-7 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                @endif

                                                <!-- Botón de Activación -->
                                                @if ($item->estado == 1)
                                                    <button @click="ActivarItem({{ $item->TipoID }})"
                                                        class="btn size-7 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div x-show="mostrarDetalle" id="detalleDatosMaestro">

                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                            <table class="w-full text-left border">
                                <thead>
                                    <tr class="hover:bg-slate-50 dark:hover:bg-navy-600">
                                        <th  class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Nombre</th>
                                        <th  class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Estado</th>
                                        <th  class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="detalleTablaBody"></tbody>
                            </table>
                        </div>

                        <button @click="mostrarDetalle = false" class="bg-blue-500 text-white px-4 py-2 rounded mt-2">
                            Volver
                        </button>
                    </div>

                    <div>
                        <div x-ref="wrapper"></div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function DesacItem(id) {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Este elemento será inactivado.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Sí, desactivar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/desactivar-item/${id}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({})
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire("Desactivado", data.message, "success");
                                    setTimeout(() => location.reload(), 1000);
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                });
            }

            function ActivarItem(id) {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Este elemento será activado.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1fc12d",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Sí, Activar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/activar-item/${id}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({})
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire("Activado", data.message, "success");
                                    setTimeout(() => location.reload(), 1000);
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    }
                });
            }

            function obtenerDatos(tipoId) {
                fetch(`/obtener-datos/${tipoId}`)
                    .then(response => response.json())
                    .then(data => {
                        let tablaBody = document.getElementById("detalleTablaBody");
                        tablaBody.innerHTML = "";

                        data.forEach(item => {
                            let fila = `
                                    <tr class="hover:bg-slate-50 dark:hover:bg-navy-600">
                                        <td class="whitespace-nowrap px-3 py-2">${item.nombre}</td>
                                        <td class="whitespace-nowrap px-3 py-2">
                                            ${item.estado == 0 ? 'Activo' : 'Inactivo'}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-2">
                                            <div class="flex space-x-1">
                                                <div x-data="{ showModal: false, nombre: '{{ $item->NombreTipo }}', descripcion: '{{ $item->Descripcion }}' }">
                                                    <button @click="showModal = true"
                                                        class="btn size-7 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa fa-edit text-xs"></i>
                                                    </button>
                                                    <template x-teleport="#x-teleport-target">
                                                        <div class="fixed inset-0 z-100 flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                                                            x-show="showModal" role="dialog"
                                                            @keydown.window.escape="showModal = false">
                                                            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                                                                @click="showModal = false" x-show="showModal"
                                                                x-transition:enter="ease-out"
                                                                x-transition:enter-start="opacity-0"
                                                                x-transition:enter-end="opacity-100"
                                                                x-transition:leave="ease-in"
                                                                x-transition:leave-start="opacity-100"
                                                                x-transition:leave-end="opacity-0"></div>
                                                            <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                                                                x-show="showModal" x-transition:enter="easy-out"
                                                                x-transition:enter-start="opacity-0 scale-95"
                                                                x-transition:enter-end="opacity-100 scale-100"
                                                                x-transition:leave="easy-in"
                                                                x-transition:leave-start="opacity-100 scale-100"
                                                                x-transition:leave-end="opacity-0 scale-95">
                                                                <div
                                                                    class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                                                                    <h3
                                                                        class="text-base font-medium text-slate-700 dark:text-navy-100">
                                                                        Editar Catálogo
                                                                    </h3>
                                                                    <button @click="showModal = !showModal"
                                                                        class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="size-4.5" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                                            stroke-width="2">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="px-4 py-4 sm:px-5">
                                                                    <div class="mt-4 space-y-4">
                                                                        <label class="block">
                                                                            <span>Tipo de Catálogo:</span>
                                                                            <input
                                                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                                placeholder="Description"
                                                                                x-model="nombre" name="NombreTipo"
                                                                                placeholder="Tipo de catálogo"
                                                                                type="text" />
                                                                        </label>
                                                                        <label class="block">
                                                                            <span>Descripción:</span>
                                                                            <input
                                                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                                                x-model="descripcion"
                                                                                name="Descripcion"
                                                                                placeholder="Descripción"
                                                                                type="text" />
                                                                        </label>
                                                                        <div class="space-x-2 text-right">
                                                                            <button @click="showModal = false"
                                                                                class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                                                                Cancel
                                                                            </button>
                                                                            <button
                                                                                @click="actualizarCatalogo({{ $item->TipoID }}, nombre, descripcion, () => showModal = false)"
                                                                                class="btn min-w-[7rem] rounded-full bg-primary text-white">
                                                                                Guardar
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>

                                                @if ($item->estado == 0)
                                                    <button @click="DesacItem({{ $item->TipoID }})"
                                                        class="btn size-7 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                @endif

                                                @if ($item->estado == 1)
                                                    <button @click="ActivarItem({{ $item->TipoID }})"
                                                        class="btn size-7 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                `;
                            tablaBody.innerHTML += fila;
                        });
                    })
                    .catch(error => console.error("Error:", error));
            }

            function actualizarCatalogo(id, nombre, descripcion, cerrarModal) {
                fetch(`/actualizar-item/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify({
                            NombreTipo: nombre,
                            Descripcion: descripcion
                        }),
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // alert(data.message);
                            toastr.success('Actualizado correctamente');
                            location.reload(); // o actualizar solo la tabla si deseas
                        } else {
                            // alert('Hubo un error al actualizar');
                            toastr.error('Hubo un error al actualizar');
                        }
                    })
                    .catch(err => console.error(err));
            }


            function crearNuevoCatalogo(nombre, descripcion, onSuccess) {
                fetch('/ruta/crear/catalogo', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            NombreTipo: nombre,
                            Descripcion: descripcion
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            toastr.success(data.message);
                            onSuccess();
                            location.reload(); // o actualizas tu tabla dinámicamente
                        } else {
                            toastr.error('Ocurrió un error al crear el catálogo');
                        }
                    })
                    .catch(() => toastr.error('Error en el servidor'));
            }
        </script>
    </main>
</x-app-layout>
