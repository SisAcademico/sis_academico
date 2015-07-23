<?php

class ReporteController extends \BaseController {

    /**
     * Lista de procedimientos
     *
     * @return Response
     */
    public function index() {
        return View::make('reporte.listar');
    }

}
