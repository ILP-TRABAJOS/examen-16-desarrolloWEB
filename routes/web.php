<?php

use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\CitaDetalleController;
use App\Http\Controllers\CitaDetallePdfController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->middleware('verified');

/*  USUARIOS */
Route::get('usuarios-index', [UsuarioController::class, 'index'])->name('usuarios.index')->middleware('verified');
Route::get('usuarios-create', [UsuarioController::class, 'create'])->name('usuarios.create')->middleware('verified');
Route::post('usuarios-store', [UsuarioController::class, 'store'])->name('usuarios.store')->middleware('verified');
Route::get('usuarios-edit-{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit')->middleware('verified');
Route::post('usuarios-update', [UsuarioController::class, 'update'])->name('usuarios.update')->middleware('verified');
Route::get('usuarios-destroy-{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy')->middleware('verified');
Route::get('usuarios-buscar', [UsuarioController::class, 'buscar'])->name('usuarios.buscar')->middleware('verified');

/*  PACIENTES */
Route::get('pacientes-index', [PacienteController::class, 'index'])->name('pacientes.index')->middleware('verified');
Route::get('pacientes-create', [PacienteController::class, 'create'])->name('pacientes.create')->middleware('verified');
Route::post('pacientes-store', [PacienteController::class, 'store'])->name('pacientes.store')->middleware('verified');
Route::get('pacientes-edit-{id}', [PacienteController::class, 'edit'])->name('pacientes.edit')->middleware('verified');
Route::post('pacientes-update', [PacienteController::class, 'update'])->name('pacientes.update')->middleware('verified');
Route::get('pacientes-destroy-{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy')->middleware('verified');
Route::get('pacientes-buscar', [PacienteController::class, 'buscar'])->name('pacientes.buscar')->middleware('verified');


/*  CITAS */
Route::get('citas-index', [CitaController::class, 'index'])->name('citas.index')->middleware('verified');
Route::get('citas-create', [CitaController::class, 'create'])->name('citas.create')->middleware('verified');
Route::post('citas-store', [CitaController::class, 'store'])->name('citas.store')->middleware('verified');
Route::get('citas-edit-{id}', [CitaController::class, 'edit'])->name('citas.edit')->middleware('verified');
Route::post('citas-update', [CitaController::class, 'update'])->name('citas.update')->middleware('verified');
Route::get('citas-destroy-{id}', [CitaController::class, 'destroy'])->name('citas.destroy')->middleware('verified');


/*  CITAS-DETALLE */
Route::get('citas-detalle-index', [CitaDetalleController::class, 'index'])->name('citas-detalle.index')->middleware('verified');
Route::get('citas-detalle-create', [CitaDetalleController::class, 'create'])->name('citas-detalle.create')->middleware('verified');
Route::post('citas-detalle-store', [CitaDetalleController::class, 'store'])->name('citas-detalle.store')->middleware('verified');
Route::get('citas-detalle-edit-{id}', [CitaDetalleController::class, 'edit'])->name('citas-detalle.edit')->middleware('verified');
Route::post('citas-detalle-update', [CitaDetalleController::class, 'update'])->name('citas-detalle.update')->middleware('verified');
Route::get('citas-detalle-destroy-{id}', [CitaDetalleController::class, 'destroy'])->name('citas-detalle.destroy')->middleware('verified');



/*  DOCTOR */
Route::get('doctor-index', [DoctorController::class, 'index'])->name('doctor.index')->middleware('verified');
Route::get('doctor-create', [DoctorController::class, 'create'])->name('doctor.create')->middleware('verified');
Route::post('doctor-store', [DoctorController::class, 'store'])->name('doctor.store')->middleware('verified');
Route::get('doctor-edit-{id}', [DoctorController::class, 'edit'])->name('doctor.edit')->middleware('verified');
Route::post('doctor-update', [DoctorController::class, 'update'])->name('doctor.update')->middleware('verified');
Route::get('doctor-destroy-{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy')->middleware('verified');
Route::get('doctor-buscar', [DoctorController::class, 'buscar'])->name('doctor.buscar')->middleware('verified');

/* CONSULTAS */
Route::get('consultas', [ConsultaController::class, 'index'])->name('consultas.index')->middleware('verified');
Route::get('consultas-create', [ConsultaController::class, 'create'])->name('consultas.create')->middleware('verified');
Route::post('consultas-store', [ConsultaController::class, 'store'])->name('consultas.store')->middleware('verified');
Route::get('consultas-edit-{id}', [ConsultaController::class, 'edit'])->name('consultas.edit')->middleware('verified');
Route::post('consultas-update', [ConsultaController::class, 'update'])->name('consultas.update')->middleware('verified');
Route::get('consultas-delete-{id}', [ConsultaController::class, 'delete'])->name('consultas.delete')->middleware('verified');


/* BUSQUEDA */
Route::get('busqueda', [BusquedaController::class, 'index'])->name('busqueda.index')->middleware('verified');
Route::get('busqueda-por-lista/{valor}', [BusquedaController::class, 'busqueda'])->name('busqueda.busqueda')->middleware('verified');
Route::get('busqueda-por-paciente/{valor}', [BusquedaController::class, 'busquedaPaciente'])->name('busquedaPaciente.busqueda')->middleware('verified');
Route::get('busqueda-por-paciente-dni/{valor}', [BusquedaController::class, 'busquedaPacienteDni'])->name('busquedaPacienteDni.busqueda')->middleware('verified');


/* reportes */
Route::get('reportes-pdf', [ReportesController::class, 'index'])->name('reportes.index');
/* pdf */
Route::get('cita-detalle-pdf', [CitaDetallePdfController::class, 'index'])->name('citaDetallepdf.index');
Route::get('ticket-paciente-pdf-{id}', [CitaDetallePdfController::class, 'ticket'])->name('citaDetallepdf.ticket');
Route::get('boleta-paciente-pdf-{id}', [CitaDetallePdfController::class, 'boleta'])->name('citaDetallepdf.boleta');


//cita detalle
Route::get('busqueda-consulta-cita-detalle/{id}', [CitaDetalleController::class, 'busquedaConsulta'])->name('busqueda-cita-detalle')->middleware('verified');
