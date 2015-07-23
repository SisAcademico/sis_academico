<?php

class Nota extends Eloquent {
	protected $table = 'tnotas';
	public $timestamps = false;
	public static function getDataNotaCarrera($isasig)
	{
		$data = DB::table('tdetalle_matricula')
					->leftJoin('tnotas', 'tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
					->join('tmatricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
					->join('talumno', 'talumno.idalumno','=','tmatricula.idalumno')
					->select
					(
						'talumno.idalumno',
						'talumno.nombres',
						'talumno.apellidos',
						'tnotas.idnota',
						'tnotas.nota',
						'tdetalle_matricula.iddetalle_matricula'
					)
					->where('tdetalle_matricula.idasignatura','=',$isasig)
					->orderBy('talumno.idalumno','ASC')
					->orderBy('tnotas.nro_parcial','ASC')
					->get();
		return $data;	
	}
	public static function getDataNotaLibre($isasig)
	{
		$data = DB::table('tdetalle_matricula')
					->leftJoin('tnotas', 'tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
					->join('tmatricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
					->join('talumno', 'talumno.idalumno','=','tmatricula.idalumno')

					->select
					(
						'talumno.idalumno',
						'talumno.nombres',
						'talumno.apellidos',
						'tnotas.idnota',
						'tnotas.nota',
						'tdetalle_matricula.iddetalle_matricula'
					)
					->where('tdetalle_matricula.idasignatura_cl','=',$isasig)
					->orderBy('talumno.idalumno','ASC')
					->orderBy('tnotas.nro_parcial','ASC')
					->get();
		return $data;	
	}

	public function rankingPorCurso($idasignatura)
	{
		$tipo = substr($idasignatura, 0, 2);
		if($tipo=="AL")//curso libre
		{
			DB::table('tdetalle_matricula')
					->leftJoin('tnotas', 'tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
					->join('tmatricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
					->join('talumno', 'talumno.idalumno','=','tmatricula.idalumno')
					->select
					(
						DB::raw('talumno.idalumno as Codigo, concat(talumno.apellidos, \' \', talumno.nombres) as Nombres, avg(tnotas.nota) as Promedio')
					)
					->where('tdetalle_matricula.idasignatura_cl','=',$idasignatura)
					->groupBy('talumno.idalumno')
					->orderBy('Promedio','ASC')
					->get();
		}
		else if($tipo=="AC")//curso carrera
		{
			DB::table('tdetalle_matricula')
					->leftJoin('tnotas', 'tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
					->join('tmatricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
					->join('talumno', 'talumno.idalumno','=','tmatricula.idalumno')
					->select
					(
						DB::raw('talumno.idalumno as Codigo, concat(talumno.apellidos, \' \', talumno.nombres) as Nombres, avg(tnotas.nota) as Promedio')
					)
					->where('tdetalle_matricula.idasignatura','=',$idasignatura)
					->groupBy('talumno.idalumno')
					->orderBy('Promedio','ASC')
					->get();
		}
	}
}
