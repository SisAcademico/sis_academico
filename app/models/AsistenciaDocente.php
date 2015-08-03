<?php
class AsistenciaDocente extends Eloquent
{
	protected $table='tasistencia_docente';
	public $timestamps=false;
	public static function getJoinCargaAcademicaAsistenciaDocenteCarrera($iddocente)
	{
		return DB::table('tcarga_academica')
				->leftJoin('tasistencia_docente', 'tcarga_academica.idcarga_academica', '=','tasistencia_docente.idcarga_academica')
				->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tasignatura.idasignatura')
				->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
				->join('tcarga_horario', 'tcarga_academica.idcarga_academica', '=', 'tcarga_horario.idcarga_academica') 
				->join('thorario', 'thorario.idhorario', '=', 'tcarga_horario.idhorario')
				->select 
				(
					'tcarga_academica.idcarga_academica',
					'tasignatura.idasignatura',
					'tasignatura.nombre_asignatura',
					'thorario.hora_inicio',
					'thorario.hora_fin'
				)
				->where('tdocente.iddocente', '=', $iddocente)
				->get();	
	}
	public static function getJoinCargaAcademicaAsistenciaDocenteLibre($iddocente)
	{
		return DB::table('tcarga_academica')
				->leftJoin('tasistencia_docente', 'tcarga_academica.idcarga_academica', '=','tasistencia_docente.idcarga_academica')
				->join('tasignatura_cl', 'tcarga_academica.idasignatura_cl', '=', 'tasignatura_cl.idasignatura_cl')
				->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
				->join('tcarga_horario', 'tcarga_academica.idcarga_academica', '=', 'tcarga_horario.idcarga_academica') 
				->join('thorario', 'thorario.idhorario', '=', 'tcarga_horario.idhorario')
				->select 
				(
					'tcarga_academica.idcarga_academica',
					'tasignatura_cl.idasignatura_cl',
					'tasignatura_cl.nombre_asig_cl',
					'thorario.hora_inicio',
					'thorario.hora_fin'
				)
				->where('tdocente.iddocente', '=', $iddocente)
				->get();
	}
}
