<?php
use App\Http\Controllers\CasosController;

Route::post('/consulta-dni', [CasosController::class, 'consultaDni'])->name('consulta.dni');
