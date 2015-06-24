<?php
class AsistenciaAlumno extends Eloquent
{
	protected $table='tasistencia_alumno';
	public $timestamps=false;
	
	public static function getAsignaturasCargo($semestre){
		//----
		$resultadoCursos=DB::table('tcarga_academica')
            ->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tasignatura.idasignatura')
            ->join('tmodulo', 'tmodulo.idmodulo', '=', 'tasignatura.idmodulo')
			->select('tcarga_academica.*','tasignatura.nombre_asignatura','tmodulo.nombre_modulo')
			->where('tcarga_academica.idsemestre', '=', "$semestre")
            ->get();
        return $resultadoCursos;
	}
	
	public static function listaAlumnosCargo($idasignatura,$semestre=null,$idcargaAcademica=null){
		//----
		$listaAlumnos=DB::table('tdetalle_matricula')
            ->join('tmatricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('talumno', 'talumno.idalumno', '=', 'tmatricula.idalumno')
			->select('talumno.idalumno','talumno.dni','talumno.nombres','talumno.apellidos','talumno.idfoto',
			'tdetalle_matricula.iddetalle_matricula','tdetalle_matricula.idmatricula','idasignatura','tmatricula.fecha_matricula')
			->where('tdetalle_matricula.idasignatura', '=', "$idasignatura")
            ->get();
        return $listaAlumnos;
	}
}
