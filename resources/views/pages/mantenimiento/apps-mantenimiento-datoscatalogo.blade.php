<div class="uppercase text-xs sm:pt-5">

    <button onclick="VolverATiposCatalogo()" class="btn mb-4">
        <i class="fa fa-arrow-left mr-2"></i> Volver a Tipos de Catálogo
    </button>

    <div class="text-start flex flex-wrap items-start justify-between gap-6 w-full">
        <h2 class="text-xl font-bold mb-4">Detalles del Catálogo: {{ $tipoCatalogo->NombreTipo }}</h2>
        <div x-data="{
            showModal: false,
            nombre: '',
            tipoId: '{{ $tipoCatalogo->TipoID }}',
            crearSubcatalogo() {
                if (!this.nombre) {
                    toastr.error('Por favor ingresa un nombre', 'Campo requerido');
                    return;
                }

                fetch('/crear-subcatalogo', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            nombre: this.nombre,
                            tipoId: this.tipoId
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            toastr.success(data.message, 'Éxito');
                            this.showModal = false;
                            this.nombre = '';
                            setTimeout(() => window.location.reload(), 1000);
                        } else {
                            toastr.error('Ocurrió un error', 'Error');
                        }
                    })
                    .catch(err => {
                        console.error('Error:', err);
                        toastr.error('Error en la solicitud', 'Error de red');
                    });
            },
        }" class="pr-5">

            <button @click="showModal = true"
                class="btn rounded-xl bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                <span>Nuevo</span>
                <i class="fa-regular fa-folder pl-2.5"></i>
            </button>

            <template x-teleport="#x-teleport-target">
                <div class="fixed inset-0 z-100 flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
                    x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">

                    <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                        @click="showModal = false" x-show="showModal" x-transition:enter="ease-out"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"></div>

                    <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300 dark:bg-navy-700"
                        x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                        <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                            <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                                Nuevo Dato de Catálogo
                            </h3>
                            <button @click="showModal = !showModal"
                                class="btn -mr-1.5 size-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="px-4 py-4 sm:px-5">
                            <div class="space-y-4">
                                <label class="hidden">
                                    <span>Tipo:</span>
                                    <input x-model="tipoId" name="tipoId" type="text" :value="tipoId"
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="tipoId" />
                                </label>
                                <span id="tipoCatalogoData" data-tipo-id="{{ $tipoCatalogo->TipoID }}"
                                    class="hidden"></span>

                                <label class="block">
                                    <span>Nombre:</span>
                                    <input x-model="nombre" name="nombre" type="text"
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Nombre" />
                                </label>

                                <div class="space-x-2 text-right">
                                    <button @click="showModal = false"
                                        class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                        Cancelar
                                    </button>
                                    <button @click="crearSubcatalogo()"
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

    <div x-init="$el._x_grid = new Gridjs.Grid({
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

        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
            <table x-ref="table" class="w-full text-left">
                <thead>
                    <tr>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            CÓDIGO
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            NOMBRE
                        </th>
                        <th
                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                            ESTADO
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($datos as $item)
                        <tr class="hover:bg-slate-50 dark:hover:bg-navy-600">
                            <td class="whitespace-nowrap px-3 py-2">{{ $item->codigo }}</td>
                            <td class="whitespace-nowrap px-3 py-2">{{ $item->nombre }}</td>
                            <td class="whitespace-nowrap px-3 py-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium border {{ $item->estado ? 'bg-red-50 text-red-700 border-red-200' : 'bg-green-50 text-green-700 border-green-200' }}">
                                    {{ $item->estado ? 'Inactivo' : 'Activo' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <div x-ref="wrapper"></div>
        </div>
    </div>
</div>
