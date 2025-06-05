<x-app-layout title="Entes" is-header-blur="true">
    <style>
        .jconfirm-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .jconfirm-content {
            font-size: 1rem;
        }

        .jconfirm-buttons {
            display: flex;
            justify-content: center;
        }

        .btn-green {
            background-color: #16a34a !important;
            color: white !important;
            border-radius: 8px;
            padding: 8px 16px;
        }

        .btn-red {
            background-color: #dc2626 !important;
            color: white !important;
            border-radius: 8px;
            padding: 8px 16px;
        }

        .btn-gray {
            background-color: #6b7280 !important;
            color: white !important;
            border-radius: 8px;
            padding: 8px 16px;
        }
        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: flex;
            align-items: center;
            height: 42px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            background-color: #f9fafb;
            padding: 0 12px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        .select2-container .select2-selection--single:hover {
            border-color: #a5b4fc;
        }
    </style>
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between py-5 lg:py-6">
            <div class="flex items-center space-x-1">
                <h2 class="text-xl font-medium text-slate-700 line-clamp-1 dark:text-navy-50 lg:text-2xl">
                    Entes
                </h2>
                <div x-data="usePopper({ placement: 'bottom-start', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false" class="inline-flex">
                    {{-- <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <i class="fas fa-chevron-down"></i>
                    </button> --}}

                    {{-- <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                        <div
                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                            <ul>
                                <li>
                                    <a href="#"
                                        class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span> New User</span></a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        <span>Export Users</span></a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex h-8 items-center space-x-3 px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-px size-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>Setting</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>

            {{-- <div class="flex items-center space-x-2">
                <label class="relative hidden sm:flex">
                    <input
                        class="form-input peer h-9 w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 text-xs-plus placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                        placeholder="Search users..." type="text" />
                    <span
                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 transition-colors duration-200"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z" />
                        </svg>
                    </span>
                </label>

                <div class="flex">
                    <button
                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:hidden sm:h-9 sm:w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" stroke="currentColor" fill="none"
                            viewBox="0 0 24 24">
                            <circle cx="10.2" cy="10.2" r="7.2" stroke-width="1.5"></circle>
                            <path stroke-width="1.5" stroke-linecap="round" d="M21 21l-3.6-3.6" />
                        </svg>
                    </button>
                    <button
                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M3 5.109C3 4.496 3.47 4 4.05 4h16.79c.58 0 1.049.496 1.049 1.109 0 .612-.47 1.108-1.05 1.108H4.05C3.47 6.217 3 5.721 3 5.11zM5.798 12.5c0-.612.47-1.109 1.05-1.109H18.04c.58 0 1.05.497 1.05 1.109s-.47 1.109-1.05 1.109H6.848c-.58 0-1.05-.497-1.05-1.109zM9.646 18.783c-.58 0-1.05.496-1.05 1.108 0 .613.47 1.109 1.05 1.109h5.597c.58 0 1.05-.496 1.05-1.109 0-.612-.47-1.108-1.05-1.108H9.646z" />
                        </svg>
                    </button>
                    <button
                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:h-9 sm:w-9">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div> --}}
        </div>
        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6" x-data="{ currentForm: 'datos', activeStep: 'datos' }">
            <div class="col-span-12 grid lg:col-span-2 lg:items-center lg:justify-start md:pb-[550px]">
                <div>
                    <ol class="steps is-vertical line-space [--size:2.20rem] [--line:.4rem]">
                        <li class="step space-x-4 pb-8 before:bg-slate-200 dark:before:bg-navy-500 flex items-center">
                            <div class="step-header mask is-hexagon flex items-center justify-center"
                                :class="{
                                    'bg-primary text-white dark:bg-accent': activeStep === 'datos',
                                    'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100': activeStep !== 'datos'
                                }">
                                <i class="fa-solid fa-layer-group text-base"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="text-sm font-medium cursor-pointer"
                                    :class="{
                                        'text-primary dark:text-accent-light': activeStep === 'datos',
                                        'text-slate-700 dark:text-navy-100': activeStep !== 'datos'
                                    }"
                                    @click="currentForm = 'datos'; activeStep = 'datos'">
                                    Datos Ente
                                </h3>
                            </div>
                        </li>


                        <li class="step space-x-4 pb-8 before:bg-slate-200 dark:before:bg-navy-500 flex items-center">
                            <div class="step-header mask is-hexagon flex items-center justify-center"
                                :class="{
                                    'bg-primary text-white dark:bg-accent': activeStep === 'Clasificación',
                                    'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100': activeStep !== 'Clasificación'
                                }">
                                <i class="fa-solid fa-truck-fast text-base"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="text-sm font-medium cursor-pointer"
                                    :class="{
                                        'text-primary dark:text-accent-light': activeStep === 'Clasificación',
                                        'text-slate-700 dark:text-navy-100': activeStep !== 'Clasificación'
                                    }"
                                    @click="currentForm = 'Clasificación'; activeStep = 'Clasificación'">
                                    Clasificación
                                </h3>
                            </div>
                        </li>
                        <li class="step space-x-4 pb-8 before:bg-slate-200 dark:before:bg-navy-500 flex items-center">
                            <div class="step-header mask is-hexagon flex items-center justify-center"
                                :class="{
                                    'bg-primary text-white dark:bg-accent': activeStep === 'Direcciones',
                                    'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100': activeStep !== 'Direcciones'
                                }">
                                <i class="fa-solid fa-check text-base"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="text-sm font-medium cursor-pointer"
                                    :class="{
                                        'text-primary dark:text-accent-light': activeStep === 'Direcciones',
                                        'text-slate-700 dark:text-navy-100': activeStep !== 'Direcciones'
                                    }"
                                    @click="currentForm = 'Direcciones'; activeStep = 'Direcciones'">
                                    Direcciones y Teléfonos
                                </h3>
                            </div>
                        </li>
                        <li class="step space-x-4 pb-8 before:bg-slate-200 dark:before:bg-navy-500 flex items-center">
                            <div class="step-header mask is-hexagon flex items-center justify-center"
                                :class="{
                                    'bg-primary text-white dark:bg-accent': activeStep === 'Contactos',
                                    'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100': activeStep !== 'Contactos'
                                }">
                                <i class="fa-solid fa-list text-base"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="text-sm font-medium cursor-pointer"
                                    :class="{
                                        'text-primary dark:text-accent-light': activeStep === 'Contactos',
                                        'text-slate-700 dark:text-navy-100': activeStep !== 'Contactos'
                                    }"
                                    @click="currentForm = 'Contactos'; activeStep = 'Contactos'">
                                    Contactos
                                </h3>
                            </div>
                        </li>

                        <li class="step space-x-4 pb-8 before:bg-slate-200 dark:before:bg-navy-500 flex items-center">
                            <div class="step-header mask is-hexagon flex items-center justify-center"
                                :class="{
                                    'bg-primary text-white dark:bg-accent': activeStep === 'Historial',
                                    'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100': activeStep !== 'Historial'
                                }">
                                <i class="fa-solid fa-check text-base"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="text-sm font-medium cursor-pointer"
                                    :class="{
                                        'text-primary dark:text-accent-light': activeStep === 'Historial',
                                        'text-slate-700 dark:text-navy-100': activeStep !== 'Historial'
                                    }"
                                    @click="currentForm = 'Historial'; activeStep = 'Historial'">
                                    Historial
                                </h3>
                            </div>
                        </li>
                        <li class="step space-x-4 pb-8 before:bg-slate-200 dark:before:bg-navy-500 flex items-center">
                            <div class="step-header mask is-hexagon flex items-center justify-center"
                                :class="{
                                    'bg-primary text-white dark:bg-accent': activeStep === 'Bitácora',
                                    'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100': activeStep !== 'Bitácora'
                                }">
                                <i class="fa-solid fa-check text-base"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="text-sm font-medium cursor-pointer"
                                    :class="{
                                        'text-primary dark:text-accent-light': activeStep === 'Bitácora',
                                        'text-slate-700 dark:text-navy-100': activeStep !== 'Bitácora'
                                    }"
                                    @click="currentForm = 'Bitácora'; activeStep = 'Bitácora'">
                                    Bitácora de Investigación
                                </h3>
                            </div>
                        </li>
                        <li class="step space-x-4 pb-8 before:bg-slate-200 dark:before:bg-navy-500 flex items-center">
                            <div class="step-header mask is-hexagon flex items-center justify-center"
                                :class="{
                                    'bg-primary text-white dark:bg-accent': activeStep === 'Integración',
                                    'bg-slate-200 text-slate-500 dark:bg-navy-500 dark:text-navy-100': activeStep !== 'Integración'
                                }">
                                <i class="fa-solid fa-check text-base"></i>
                            </div>
                            <div class="text-left">
                                <h3 class="text-sm font-medium cursor-pointer"
                                    :class="{
                                        'text-primary dark:text-accent-light': activeStep === 'Integración',
                                        'text-slate-700 dark:text-navy-100': activeStep !== 'Integración'
                                    }"
                                    @click="currentForm = 'Integración'; activeStep = 'Integración'">
                                    Integración del Ente
                                </h3>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-span-12 grid lg:col-span-10">
                <div class="card">
                    <div class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5 flex justify-between items-center">
                        <!-- Izquierda -->
                        <div id="izquierda" class="flex items-center space-x-2">
                            <div class="flex size-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light">
                                <i class="fa-solid fa-layer-group"></i>
                            </div>
                            <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                                <span x-text="currentForm.charAt(0).toUpperCase() + currentForm.slice(1)"></span>
                            </h4>
                        </div>

                        <!-- Derecha -->
                        {{-- <div id="derecha" class="flex space-x-2">
                            <button class="sm:py-2 btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span class="sm:text-xs">GUARDAR</span>
                            </button>

                            <button class="sm:py-2 btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <span class="sm:text-xs">CANCELAR</span>
                            </button>
                        </div> --}}

                        <div id="derecha" class="flex space-x-2">
                            <!-- Botón GUARDAR -->
                            <button id="btnGuardar"
                                class="sm:py-2 btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <i class="fa-solid fa-save"></i>
                                <span class="sm:text-xs">GUARDAR</span>
                            </button>

                            <!-- Botón CANCELAR -->
                            <button id="btnCancelar"
                                class="sm:py-2 btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <i class="fa-solid fa-ban"></i>
                                <span class="sm:text-xs">CANCELAR</span>
                            </button>
                        </div>


                        <!-- Script para jQuery Confirm con diseño mejorado -->
                        <script>
                            $(document).ready(function () {
                                // Confirmación GUARDAR
                                $("#btnGuardar").click(function () {
                                    $.confirm({
                                        title: '<i class="fa-solid fa-circle-check text-green-600"></i> Confirmar Guardado',
                                        content: '¿Estás seguro de que deseas <strong>guardar</strong> los cambios?',
                                        type: 'green',
                                        boxWidth: '400px',
                                        useBootstrap: false,
                                        buttons: {
                                            confirmar: {
                                                text: '<i class="fa-solid fa-check"></i> Sí, Guardar',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    console.log("Datos guardados correctamente.");
                                                }
                                            },
                                            cancelar: {
                                                text: '<i class="fa-solid fa-xmark"></i> Cancelar',
                                                btnClass: 'btn-gray',
                                            }
                                        }
                                    });
                                });

                                // Confirmación CANCELAR
                                $("#btnCancelar").click(function () {
                                    $.confirm({
                                        title: '<i class="fa-solid fa-circle-exclamation text-red-600"></i> Cancelar Acción',
                                        content: '¿Seguro que quieres <strong>cancelar</strong> los cambios?',
                                        type: 'red',
                                        boxWidth: '400px',
                                        useBootstrap: false,
                                        buttons: {
                                            confirmar: {
                                                text: '<i class="fa-solid fa-trash"></i> Sí, Cancelar',
                                                btnClass: 'btn-red',
                                                action: function () {
                                                    console.log("Operación cancelada.");
                                                }
                                            },
                                            cerrar: {
                                                text: '<i class="fa-solid fa-xmark"></i> Cerrar',
                                                btnClass: 'btn-gray',
                                            }
                                        }
                                    });
                                });
                            });
                        </script>


                    </div>

                    <div class="space-y-4 p-4 sm:p-5">
                        <template x-if="currentForm === 'datos'">
                            <div>
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:pb-2">

                                    <label class="block">
                                        <span>Tipo identificación</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            @foreach($tipoidentificacion as $identificacion)
                                                <option value="{{ $identificacion->codigo }}">{{ $identificacion->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </label>


                                    <label class="block">
                                        <span>Nro identificación</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block">
                                        <span>Nombres</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block">
                                        <span>Apellidos</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block">
                                        <span>Fecha Nacimiento</span>
                                        <div class="relative">
                                          <!-- Input con Flatpickr -->
                                          <input x-init="$el._x_flatpickr = flatpickr($el, { enableTime: false })"
                                            class="mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-10 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                          <!-- Ícono centrado dentro del input -->
                                          <i class="fa-solid fa-calendar absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"></i>
                                        </div>
                                    </label>


                                    <label class="block">
                                        <span>Idioma</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Español</option>
                                            <option>Inglés</option>
                                            <option>Francés</option>
                                            <option>Alemán</option>
                                            <option>Italiano</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Tipo Ente</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            @foreach($tipoente as $entes)
                                                <option value="{{ $entes->codigo }}">{{ $entes->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </label>

                                    <div class="mt-1 sm:col-span-1" x-data x-init="$nextTick(() => {
                                        $('#country-select7').select2({
                                            templateResult: formatCountry,
                                            templateSelection: formatCountry,
                                            width: '100%'
                                        }).val('PA').trigger('change');
                                    })">
                                        <label class="block text-xs font-medium text-gray-700 sm:col-span-1">
                                            País
                                        </label>
                                        <div class="relative mt-1">
                                            <select id="country-select7" class="w-full mt-1.5">
                                                @foreach($catpais as $pais)
                                                    <option value="{{ $pais->Prefijo }}"
                                                            data-flag="https://flagcdn.com/w40/{{ strtolower($pais->CodigoBandera) }}.png"
                                                            @if($pais->Prefijo == 'PA') selected @endif>
                                                        {{ $pais->Nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        function formatCountry(country) {
                                            if (!country.id) {
                                                return country.text;
                                            }

                                            var flagUrl = $(country.element).attr('data-flag');

                                            if (!flagUrl) {
                                                return country.text;
                                            }

                                            var $country = $(
                                                `<span class="flex items-center gap-2">
                                                    <img src="${flagUrl}" class="w-5 h-3 inline-block" />
                                                    <span>${country.text}</span>
                                                </span>`
                                            );

                                            return $country;
                                        }

                                        $(document).ready(function() {
                                            $('#country-select7').select2({
                                                templateResult: formatCountry,
                                                templateSelection: formatCountry,
                                                width: '100%',
                                            }).val('PA').trigger('change');
                                        });
                                    </script>


                                    <label class="block">
                                        <span>Ocupación</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Ocupación 1</option>
                                            <option>Ocupación 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Lugar de Nacimiento</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block">
                                        <span>Actividad</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Actividad 1</option>
                                            <option>Actividad 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Recomendado por</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block">
                                        <span>Lugar de Emisión Identificación</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Lugar 1</option>
                                            <option>Lugar 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Área</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Área 1</option>
                                            <option>Área 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Sospechoso</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Sospechoso 1</option>
                                            <option>Sospechoso 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Fecha de Emisión Identificación</span>
                                        <div class="relative">
                                            <!-- Input con Flatpickr -->
                                            <input x-init="$el._x_flatpickr = flatpickr($el, { enableTime: false })"
                                              class="mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-10 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                              type="text" />
                                            <!-- Ícono centrado dentro del input -->
                                            <i class="fa-solid fa-calendar absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"></i>
                                          </div>
                                    </label>

                                    <label class="block">
                                        <span>Fecha Vencimiento Identificación</span>
                                        <div class="relative">
                                            <!-- Input con Flatpickr -->
                                            <input x-init="$el._x_flatpickr = flatpickr($el, { enableTime: false })"
                                              class="mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pr-10 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                              type="text" />
                                            <!-- Ícono centrado dentro del input -->
                                            <i class="fa-solid fa-calendar absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent"></i>
                                          </div>
                                    </label>

                                    <label class="block">
                                        <span>Estado Debida Diligencia</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Estado 1</option>
                                            <option>Estado 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Antecedentes</span>
                                        <textarea rows="4"
                                            class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    </label>

                                    <label class="block">
                                        <span>Motivo Iniciación</span>
                                        <textarea rows="4"
                                            class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    </label>

                                </div>
                                {{-- <div>
                                    <span>Images</span>
                                    <div class="filepond fp-bordered fp-grid mt-1.5 [--fp-grid:2]">
                                        <input type="file" x-init="$el._x_filepond = FilePond.create($el)" multiple />
                                    </div>
                                </div> --}}
                            </div>
                        </template>

                        <template x-if="currentForm === 'Clasificación'">
                            <div>
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:pb-2">

                                    <label class="block">
                                        <span>Jurisdicción</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Jurisdicción 1</option>
                                            <option>Jurisdicción 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Encargado Cumplimiento</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Encargado 1</option>
                                            <option>Encargado 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Encargado Corporativo</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Encargado 1</option>
                                            <option>Encargado 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Clasificación</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Clasificación 1</option>
                                            <option>Clasificación 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Actividad Regulada</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Actividad 1</option>
                                            <option>Actividad 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Estado Debida Diligencia</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Estado 1</option>
                                            <option>Estado 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block col-span-1 sm:col-span-3"">
                                        <span>Descripción</span>
                                        <textarea rows="4"
                                            class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    </label>

                                </div>
                            </div>
                        </template>

                        <template x-if="currentForm === 'Contactos'">
                            <div>
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:pb-2">

                                    <label class="block">
                                        <span>Tipo de Contacto</span>
                                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, {
                                            create: false,
                                            sortField: { field: 'text', direction: 'asc' }
                                        })">
                                            <option value=""></option>
                                            <option>Tipo 1</option>
                                            <option>Tipo 2</option>
                                            <option>Otros</option>
                                        </select>
                                    </label>

                                    <label class="block">
                                        <span>Nombre Contacto</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block">
                                        <span>Nombre Contacto Comercial</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block">
                                        <span>Datos Contacto Comercial</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block">
                                        <span>Nombre Contacto Bancacio</span>
                                        <textarea rows="4"
                                            class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    </label>

                                    <label class="block">
                                        <span>Nombre Contacto Bancacio</span>
                                        <textarea rows="4"
                                            class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    </label>

                                </div>
                            </div>
                        </template>

                        <template x-if="currentForm === 'Direcciones'">
                            <div x-init="$nextTick(() => initMap())">
                                <div class="grid grid-cols-2 gap-4 sm:grid-cols-8 md:pb-2">

                                    <label class="block col-span-2 sm:col-span-2">
                                        <span>Email</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="email" />
                                    </label>

                                    <div class="mt-1" x-data x-init="$nextTick(() => {
                                        $('#country-select').select2({
                                            templateResult: formatCountry,
                                            templateSelection: formatCountry,
                                            width: '100%'
                                        }).val('PA').trigger('change');
                                    })">
                                        <label class="block text-xs font-medium text-gray-700 sm:col-span-1 invisible">
                                            País
                                        </label>
                                        <div class="relative mt-1">
                                            <select id="country-select" class="w-full mt-1.5">
                                                @foreach($catpais as $pais)
                                                    <option value="{{ $pais->Prefijo }}"
                                                            data-flag="https://flagcdn.com/w40/{{ strtolower($pais->CodigoBandera) }}.png"
                                                            @if($pais->Prefijo == 'PA') selected @endif>
                                                        {{ $pais->CodigoTelefono }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        function formatCountry(country) {
                                            if (!country.id) {
                                                return country.text;
                                            }

                                            var flagUrl = $(country.element).attr('data-flag');

                                            if (!flagUrl) {
                                                return country.text;
                                            }

                                            var $country = $(
                                                `<span class="flex items-center gap-2">
                                                    <img src="${flagUrl}" class="w-5 h-3 inline-block" />
                                                    <span>${country.text}</span>
                                                </span>`
                                            );

                                            return $country;
                                        }

                                        $(document).ready(function() {
                                            $('#country-select').select2({
                                                templateResult: formatCountry,
                                                templateSelection: formatCountry,
                                                width: '100%',
                                            }).val('PA').trigger('change');
                                        });
                                    </script>

                                    <label class="block col-span-1 sm:col-span-1">
                                        <span>Teléfono</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2">
                                        <span>Página Web</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2">
                                        <span>Fax</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2">
                                        <span>Email Facturación</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <div class="mt-1" x-data x-init="$nextTick(() => {
                                        $('#country-select2').select2({
                                            templateResult: formatCountry,
                                            templateSelection: formatCountry,
                                            width: '100%'
                                        }).val('PA').trigger('change');
                                    })">
                                        <label class="block text-xs font-medium text-gray-700 sm:col-span-1 invisible">
                                            País
                                        </label>
                                        <div class="relative mt-1">
                                            <select id="country-select2" class="w-full mt-1.5">
                                                @foreach($catpais as $pais)
                                                    <option value="{{ $pais->Prefijo }}"
                                                            data-flag="https://flagcdn.com/w40/{{ strtolower($pais->CodigoBandera) }}.png"
                                                            @if($pais->Prefijo == 'PA') selected @endif>
                                                        {{ $pais->CodigoTelefono }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        function formatCountry(country) {
                                            if (!country.id) {
                                                return country.text;
                                            }

                                            var flagUrl = $(country.element).attr('data-flag');

                                            if (!flagUrl) {
                                                return country.text;
                                            }

                                            var $country = $(
                                                `<span class="flex items-center gap-2">
                                                    <img src="${flagUrl}" class="w-5 h-3 inline-block" />
                                                    <span>${country.text}</span>
                                                </span>`
                                            );

                                            return $country;
                                        }

                                        $(document).ready(function() {
                                            $('#country-select2').select2({
                                                templateResult: formatCountry,
                                                templateSelection: formatCountry,
                                                width: '100%',
                                            }).val('PA').trigger('change');
                                        });
                                    </script>

                                    <label class="block col-span-1 sm:col-span-1">
                                        <span>Teléfono</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <div class="mt-1 sm:col-span-2" x-data x-init="$nextTick(() => {
                                        $('#country-select3').select2({
                                            templateResult: formatCountry,
                                            templateSelection: formatCountry,
                                            width: '100%'
                                        }).val('PA').trigger('change');
                                    })">
                                        <label class="block text-xs font-medium text-gray-700 sm:col-span-1">
                                            País
                                        </label>
                                        <div class="relative mt-1">
                                            <select id="country-select3" class="w-full mt-1.5">
                                                @foreach($catpais as $pais)
                                                    <option value="{{ $pais->Prefijo }}"
                                                            data-flag="https://flagcdn.com/w40/{{ strtolower($pais->CodigoBandera) }}.png"
                                                            @if($pais->Prefijo == 'PA') selected @endif>
                                                        {{ $pais->Nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        function formatCountry(country) {
                                            if (!country.id) {
                                                return country.text;
                                            }

                                            var flagUrl = $(country.element).attr('data-flag');

                                            if (!flagUrl) {
                                                return country.text;
                                            }

                                            var $country = $(
                                                `<span class="flex items-center gap-2">
                                                    <img src="${flagUrl}" class="w-5 h-3 inline-block" />
                                                    <span>${country.text}</span>
                                                </span>`
                                            );

                                            return $country;
                                        }

                                        $(document).ready(function() {
                                            $('#country-select3').select2({
                                                templateResult: formatCountry,
                                                templateSelection: formatCountry,
                                                width: '100%',
                                            }).val('PA').trigger('change');
                                        });
                                    </script>

                                    <div class="mt-1 sm:col-span-2" x-data x-init="$nextTick(() => {
                                        $('#country-select4').select2({
                                            templateResult: formatCountry,
                                            templateSelection: formatCountry,
                                            width: '100%'
                                        }).val('PA').trigger('change');
                                    })">
                                        <label class="block text-xs font-medium text-gray-700 sm:col-span-1">
                                            País
                                        </label>
                                        <div class="relative mt-1">
                                            <select id="country-select4" class="w-full mt-1.5">
                                                @foreach($catpais as $pais)
                                                    <option value="{{ $pais->Prefijo }}"
                                                            data-flag="https://flagcdn.com/w40/{{ strtolower($pais->CodigoBandera) }}.png"
                                                            @if($pais->Prefijo == 'PA') selected @endif>
                                                        {{ $pais->Nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        function formatCountry(country) {
                                            if (!country.id) {
                                                return country.text;
                                            }

                                            var flagUrl = $(country.element).attr('data-flag');

                                            if (!flagUrl) {
                                                return country.text;
                                            }

                                            var $country = $(
                                                `<span class="flex items-center gap-2">
                                                    <img src="${flagUrl}" class="w-5 h-3 inline-block" />
                                                    <span>${country.text}</span>
                                                </span>`
                                            );

                                            return $country;
                                        }

                                        $(document).ready(function() {
                                            $('#country-select4').select2({
                                                templateResult: formatCountry,
                                                templateSelection: formatCountry,
                                                width: '100%',
                                            }).val('PA').trigger('change');
                                        });
                                    </script>

                                    <label class="block col-span-2 sm:col-span-8">
                                        <span>Dirección Facturación</span>
                                        <textarea rows="1"
                                            class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    </label>

                                    <div class="mt-1 sm:col-span-2" x-data x-init="$nextTick(() => {
                                        $('#country-select5').select2({
                                            templateResult: formatCountry,
                                            templateSelection: formatCountry,
                                            width: '100%'
                                        }).val('PA').trigger('change');
                                    })">
                                        <label class="block text-xs font-medium text-gray-700 sm:col-span-1">
                                            País
                                        </label>
                                        <div class="relative mt-1">
                                            <select id="country-select5" class="w-full mt-1.5">
                                                @foreach($catpais as $pais)
                                                    <option value="{{ $pais->Prefijo }}"
                                                            data-flag="https://flagcdn.com/w40/{{ strtolower($pais->CodigoBandera) }}.png"
                                                            @if($pais->Prefijo == 'PA') selected @endif>
                                                        {{ $pais->Nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        function formatCountry(country) {
                                            if (!country.id) {
                                                return country.text;
                                            }

                                            var flagUrl = $(country.element).attr('data-flag');

                                            if (!flagUrl) {
                                                return country.text;
                                            }

                                            var $country = $(
                                                `<span class="flex items-center gap-2">
                                                    <img src="${flagUrl}" class="w-5 h-3 inline-block" />
                                                    <span>${country.text}</span>
                                                </span>`
                                            );

                                            return $country;
                                        }

                                        $(document).ready(function() {
                                            $('#country-select5').select2({
                                                templateResult: formatCountry,
                                                templateSelection: formatCountry,
                                                width: '100%',
                                            }).val('PA').trigger('change');
                                        });
                                    </script>

                                    <label class="block col-span-2 sm:col-span-2">
                                        <span>Estado</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2 sm:col-span-2">
                                        <span>Ciudad</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2 sm:col-span-2">
                                        <span>Apartado</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2 sm:col-span-8">
                                        <span>Dirección Física</span>
                                        <textarea rows="1"
                                            class="form-textarea w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                                    </label>

                                    <div class="mt-1 sm:col-span-2" x-data x-init="$nextTick(() => {
                                        $('#country-select6').select2({
                                            templateResult: formatCountry,
                                            templateSelection: formatCountry,
                                            width: '100%'
                                        }).val('PA').trigger('change');
                                    })">
                                        <label class="block text-xs font-medium text-gray-700 sm:col-span-1">
                                            País
                                        </label>
                                        <div class="relative mt-1">
                                            <select id="country-select6" class="w-full mt-1.5">
                                                @foreach($catpais as $pais)
                                                    <option value="{{ $pais->Prefijo }}"
                                                            data-flag="https://flagcdn.com/w40/{{ strtolower($pais->CodigoBandera) }}.png"
                                                            @if($pais->Prefijo == 'PA') selected @endif>
                                                        {{ $pais->Nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <script>
                                        function formatCountry(country) {
                                            if (!country.id) {
                                                return country.text;
                                            }

                                            var flagUrl = $(country.element).attr('data-flag');

                                            if (!flagUrl) {
                                                return country.text;
                                            }

                                            var $country = $(
                                                `<span class="flex items-center gap-2">
                                                    <img src="${flagUrl}" class="w-5 h-3 inline-block" />
                                                    <span>${country.text}</span>
                                                </span>`
                                            );

                                            return $country;
                                        }

                                        $(document).ready(function() {
                                            $('#country-select6').select2({
                                                templateResult: formatCountry,
                                                templateSelection: formatCountry,
                                                width: '100%',
                                            }).val('PA').trigger('change');
                                        });
                                    </script>

                                    <label class="block col-span-2 sm:col-span-2">
                                        <span>Estado</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2 sm:col-span-2">
                                        <span>Ciudad</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2 sm:col-span-2">
                                        <span>Apartado</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            type="text" />
                                    </label>

                                    <label class="block col-span-2 sm:col-span-8">
                                        <span>Dirección Correspondencia</span>
                                        <input id="search-box"
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent sm:mb-1.5"
                                            type="text" />
                                        <div id="map" class="rounded-lg" style="height: 300px; width: 100%;"></div>
                                    </label>

                                </div>
                            </div>

                        </template>

                        <template x-if="currentForm === 'Historial'">
                            <div class="pb-4">
                                <div>
                                    <div class="uppercase text-xs"  x-data x-init="$el._x_grid = new Gridjs.Grid({
                                        from: $refs.table,
                                        sort: true,
                                        search: true,
                                    }).render($refs.wrapper);">
                                        <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                            <table x-ref="table" class="w-full text-left">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                            Jurisdicción
                                                        </th>
                                                        <th
                                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                            Clasificación
                                                        </th>
                                                        <th
                                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                            Descripción
                                                        </th>
                                                        <th
                                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                            Status
                                                        </th>
                                                        <th
                                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                            Fecha Clasificación
                                                        </th>
                                                        <th
                                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                            Encargado Cumplimiento
                                                        </th>
                                                        <th
                                                            class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">

                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            panamá</td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            end user
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">

                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            ACT
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            29/03/2023
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">

                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            <button @click="editItem" class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button @click="deleteItem" class="btn size-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                                <i class="fa fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            panamá</td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            end user
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">

                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            ACT
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            29/03/2023
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">

                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            <button @click="editItem" class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button @click="deleteItem" class="btn size-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                                <i class="fa fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            panamá</td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            on user
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">

                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            ACT
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            29/03/2023
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">

                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            <button @click="editItem" class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button @click="deleteItem" class="btn size-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                                <i class="fa fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            panamá</td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            in user
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">

                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            ACT
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            29/03/2023
                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">

                                                        </td>
                                                        <td class="uppercase whitespace-nowrap px-4 py-3 sm:px-5">
                                                            <button @click="editItem" class="btn size-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button @click="deleteItem" class="btn size-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                                                <i class="fa fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            <div x-ref="wrapper"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        {{-- <div class="flex justify-start space-x-2 ">
                            <button
                                class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>GUARDAR</span>
                            </button>

                            <button
                                class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                <span>CANCELAR</span>
                            </button>

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>

        function initMap() {
            console.log("Intentando inicializar Google Maps...");

            let mapElement = document.getElementById("map");
            if (!mapElement) {
                console.error("Error: No se encontró el div con id='map'.");
                return;
            }

            const defaultLocation = {
                lat: 8.993516345613013,
                lng: -79.50113354935873
            };

            map = new google.maps.Map(mapElement, {
                center: defaultLocation,
                zoom: 18
            });

            marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
            });

            let searchBox = document.getElementById("search-box");
            if (searchBox) {
                autocomplete = new google.maps.places.Autocomplete(searchBox);
                autocomplete.bindTo("bounds", map);
                autocomplete.addListener("place_changed", function() {
                    let place = autocomplete.getPlace();
                    if (!place.geometry) return;
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                    marker.setPosition(place.geometry.location);
                });
            }

            geocoder = new google.maps.Geocoder();

            marker.addListener("dragend", function() {
                let position = marker.getPosition();
                map.setCenter(position);
                geocoder.geocode({
                    location: position
                }, function(results, status) {
                    if (status === "OK" && results[0]) {
                        document.getElementById("search-box").value = results[0].formatted_address;
                    }
                });
            });
        }
        window.initMap = initMap;
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPqnT95706xA6t-vS1-6Wbgg_Nr9MiXwE&libraries=places&callback=initMap"
        async defer></script>

</x-app-layout>
