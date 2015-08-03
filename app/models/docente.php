<?php
class Docente extends Eloquent
{
    protected $table = 'tdocente';
    public $timestamps = false;
    public function asignaturaCarreraPorDocente($iddocente)
    {
    	$data =  DB::table('tcarga_academica')
				->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
				->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tasignatura.idasignatura')
				->where('tdocente.iddocente', '=', $iddocente)
				->get();
		return $data;		
    }
    public function asignaturaLibrePorDocente($iddocente)
    {
    	$data = DB::table('tcarga_academica')
				->join('tasignatura_cl', 'tcarga_academica.idasignatura_cl', '=', 'tasignatura_cl.idasignatura_cl')
				->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
				->where('tdocente.iddocente', '=', $iddocente)
				->get();
		return $data;		
    }
}