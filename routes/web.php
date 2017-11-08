<?php

Route::get('/', function () {
    return view('auth.Frmlogin');
});

Auth::routes();

Route::get('/home', 'ClsControllerInicio@fncMostrarInicio')->name('home');

//Gestionar Proyecto
Route::get('/Proyecto','Gestion\ClsControllerProyecto@fncMostrarProyecto')->name('proyecto');
Route::post('/RegistrarProyecto','Gestion\ClsControllerProyecto@fncRegistrarProyecto')->name('RegistrarProyecto');
Route::get('/EditarProyecto/{id}','Gestion\ClsControllerProyecto@fncEditarProyecto')->name('EditarProyecto');
Route::post('/ModificarProyecto/{id}','Gestion\ClsControllerProyecto@fncModificarProyecto')->name('ModificarProyecto');

//Gestionar Metodologia
Route::get('/Metodologia','Gestion\ClsControllerMetodologia@fncMostrarMetodologia')->name('metodologia');
Route::post('/RegistrarMetodologia','Gestion\ClsControllerMetodologia@fncRegistrarMetodologia')->name('RegistrarMetodologia');
Route::get('/EditarMetodologia/{id}','Gestion\ClsControllerMetodologia@fncEditarMetodologia')->name('EditarMetodologia');
Route::post('/ModificarMetodologia/{id}','Gestion\ClsControllerMetodologia@fncModificarMetodologia')->name('ModificarMetodologia');

//Gestionar Fases de Metodologia
Route::get('/Fase','Gestion\ClsControllerFase@fncMostrarFase')->name('fase');
Route::post('/RegistrarFase','Gestion\ClsControllerFase@fncRegistrarFase')->name('RegistrarFase');
Route::get('/EditarFase/{id}','Gestion\ClsControllerFase@fncEditarFase')->name('EditarFase');
Route::post('/ModificarFase/{id}','Gestion\ClsControllerFase@fncModificarFase')->name('ModificarFase');

//Gestionar Entregables de Fases de una Metodologia
Route::get('/Entregable','Gestion\ClsControllerEntregable@fncMostrarEntregable')->name('entregable');
Route::post('/RegistrarEntregable','Gestion\ClsControllerEntregable@fncRegistrarEntregable')->name('RegistrarEntregable');
Route::get('/EditarEntregable/{id}','Gestion\ClsControllerEntregable@fncEditarEntregable')->name('EditarEntregable');
Route::post('/ModificarEntregable/{id}','Gestion\ClsControllerEntregable@fncModificarEntregable')->name('ModificarEntregable');
Route::get('/CargarFasesMetodologia','Gestion\ClsControllerEntregable@fncFaseMetodologia')->name('CargarFasesMetodologia');

//Jefe de Proyectos
Route::get('/ProyectosAsignados/{id}','JefeProyecto\ClsControllerProyectosAsignados@fncMostrarProyectosAsignados')->name('ProyectosAsignados');

//Información de Proyecto y Selección de Metodologia
Route::get('/InfoProyecto/{id}','JefeProyecto\ClsControllerInfoProyecto@fncInfoProyecto')->name('InfoProyecto');
Route::post('/RegistrarMetodologiaProyecto','JefeProyecto\ClsControllerInfoProyecto@fncRegistrarMetodologiaProyecto')->name('RegistrarMetodologiaProyecto');

//Equipo de Proyecto

Route::get('/EquipoProyecto/{id}','JefeProyecto\ClsControllerUsuarioProyecto@fncEquipoProyecto')->name('EquipoProyecto');
Route::post('/RegistrarIntegranteProyecto','JefeProyecto\ClsControllerUsuarioProyecto@fncRegistrarIntegrateEquipo')->name('RegistrarIntegranteProyecto');
Route::get('/RetirarUsuarioProyecto/{USUPROid_usuarioproyecto}','JefeProyecto\ClsControllerUsuarioProyecto@fncRetirarUsuarioProyecto')->name('RetirarUsuarioProyecto');

//Elegir Entregable a Proyecto
Route::get('/EntregableProyecto/{id}','JefeProyecto\ClsControllerEntregableProyecto@fncEntregablesProyecto')->name('EntregableProyecto');
Route::get('/CargarEntregableFase','JefeProyecto\ClsControllerEntregableProyecto@fncCargarEntregableFase')->name('CargarEntregableFase');
Route::get('/RetirarEntregableProyecto/{ENTRPROid_entregableproyecto}','JefeProyecto\ClsControllerEntregableProyecto@fncRetirarEntregableProyecto')->name('RetirarEntregableProyecto');
Route::post('/RegistrarEntregableProyecto','JefeProyecto\ClsControllerEntregableProyecto@fncRegistrarEntregableProyecto')->name('RegistrarEntregableProyecto');

//GestionarTareas
Route::get('/GestionarTareaProyecto/{id}','JefeProyecto\ClsControllerTareaProyecto@fncMostrarTareaProyecto')->name('GestionarTareaProyecto');
Route::post('/RegistrarTareaProyecto','JefeProyecto\ClsControllerTareaProyecto@fncRegistrarTareaProyecto')->name('RegistrarTareaProyecto');
Route::get('/EditarTareaProyecto/{id}','JefeProyecto\ClsControllerTareaProyecto@fncEditarTareaProyecto')->name('EditarTareaProyecto');
Route::post('/ModificarTareaProyecto/{id}','JefeProyecto\ClsControllerTareaProyecto@fncModificarTareaProyecto')->name('ModificarTareaProyecto');


//Relacionar Tarea Proyecto
Route::get('/RelacionarTareaProyecto/{id}','JefeProyecto\ClsControllerRelacionTareaProyecto@fncMostrarRelacionTareaProyecto')->name('RelacionarTareaProyecto');
Route::post('/RegistrarRelacionTareaProyecto','JefeProyecto\ClsControllerRelacionTareaProyecto@fncRegistrarRelacionTareaProyecto')->name('RegistrarRelacionTareaProyecto');
Route::get('/RetirarRelacionProyecto/{id}','JefeProyecto\ClsControllerRelacionTareaProyecto@fncRetirarRelacion')->name('RetirarRelacion');


//Asignar Tarea Proyecto
Route::get('/AsignarTareaProyecto/{id}','JefeProyecto\ClsControllerAsignarTareaProyecto@fncMostrarAsignarTareaProyecto')->name('AsignarTareaProyecto');
Route::get('/EditarAsignarTarea/{id}','JefeProyecto\ClsControllerAsignarTareaProyecto@fncEditarAsignarTarea')->name('EditarAsignarTarea');
Route::post('/AsignarTarea','JefeProyecto\ClsControllerAsignarTareaProyecto@fncAsignarTarea')->name('AsignarTarea');
Route::post('/ModificarAsignarTarea/{id}','JefeProyecto\ClsControllerAsignarTareaProyecto@fncModificarAsignarTarea')->name('ModificarAsignarTarea');



Route::get('/CargarEntregableTareaProyecto','JefeProyecto\ClsControllerTareaProyecto@fncCargarEntregableTareaProyecto')->name('CargarEntregableTareaProyecto');
Route::get('/CargarTareaProyecto','JefeProyecto\ClsControllerTareaProyecto@fncCargarTareaProyecto')->name('CargarTareaProyecto');

//Gestionar Comite de Cambio
Route::get('/ComiteCambio/{id}','JefeProyecto\ClsControllerComiteCambio@fncMostrarComiteCambio')->name('ComiteCambio');
Route::post('/RegistrarComiteCambio','JefeProyecto\ClsControllerComiteCambio@fncRegistrarComiteCambio')->name('RegistrarComiteCambio');
Route::get('/RetirarComiteCambio/{id}','JefeProyecto\ClsControllerComiteCambio@fncRetirarComiteCambio')->name('RetirarComiteCambio');


Route::get('/EstadoProyecto/{id}','JefeProyecto\ClsControllerEstadoProyecto@fncEstadoProyecto')->name('EstadoProyecto');

Route::get('/RevisionDocumento/{id}','ClsControllerProyectosAsignados@fncRevisionDocumento')->name('RevisionDocumento');



//Mis Entregables ( Participante )

Route::get('/EntregablesAsignados/{id}','Participante\ClsControllerEntregableAsignado@fncMostrarEntregablesAsignados')->name('MostrarEntregablesAsignados');

/*Pensando como será*/
Route::get('/RevisionEntregable{id}','Particpante\ClsControllerEntregableAsignado@fncGenerarRevisionEntregable')->name('RevisionEntregable');

Route::get('/VersionesEntregables/{id}','Participante\ClsControllerEntregableAsignado@fncMostrarVersionesEntregables')->name('VersionesEntregables');


Route::get('/TareasAsignadas/{id}','Participante\ClsControllerTareasAsignadas@fncMostrarTareasAsignadas')->name('TareasAsignadas');
