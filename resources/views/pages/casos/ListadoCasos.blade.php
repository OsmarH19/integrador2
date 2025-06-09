<x-app-layout title="Listado Casos" is-header-blur="true">

    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div id="TipoCatalogo">
            <div class="mt-12 text-start flex flex-wrap items-start justify-between gap-6 w-full">
                <h3 class="text-xl font-semibold text-slate-600 dark:text-navy-100">
                    Listado Casos </h3>

                <div class="pr-5">
                    <a href="{{ route('layouts/casos') }}"
                        class="btn rounded-xl bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <span>Nuevo</span>
                        <i class="fa-solid fa-plus pl-2.5"></i>
                    </a>
                </div>

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
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Ver
                                        </th>
                                        <th
                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            Compania
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
                                        <tr class="hover:bg-slate-50 dark:hover:bg-navy-600">
                                            <td class="whitespace-nowrap px-3 py-2">
                                                <button

                                                    class="btn size-7 p-0 text-info hover:bg-info/20"
                                                    title="Editar Caso">
                                                    <i class="fa fa-edit text-xs"></i>
                                                </button>

                                            </td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->compania->nombre ?? 'N/A' }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->Placa ?? 'N/A'}}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->descripcion }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ \Carbon\Carbon::parse($caso->fecha_incidente)->format('d/m/Y') }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->lesionado_nombres }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->lesionado_apellido_paterno }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->lesionado_apellido_materno }}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->tipoDocumento->nombre ?? 'N/A'}}</td>
                                            <td class="whitespace-nowrap px-3 py-2 uppercase">{{ $caso->lesionado_numero_documento }}</td>
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

                        </div>
                        <div x-ref="wrapper"></div>

                    </div>


                </div>
            </div>
        </div>
    </main>
</x-app-layout>
