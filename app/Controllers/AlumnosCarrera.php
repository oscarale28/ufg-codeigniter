<?php

namespace App\Controllers;

use App\Models\CarreraModel;
use App\Models\Alumno_CarreraModel;

class AlumnosCarrera extends BaseController
{

    public function index()
    {
        $carreraModel = new CarreraModel();
        $alumnoCarreraModel = new Alumno_CarreraModel();

        $data['carreras'] = $carreraModel->getCarreras();
        $data['alumnos'] = $alumnoCarreraModel->obtenerAlumnosPorCarrera();
        return view('alumnos/por_carrera', $data);
    }

    public function filtrar()
    {
        $alumnoCarreraModel = new Alumno_CarreraModel();
        $carreraModel = new CarreraModel();
        $data['carreras'] = $carreraModel->getCarreras();

        $codigoCarrera = $this->request->getPost('codigo_carrera');
        $data['codigo_carrera_seleccionado'] = $codigoCarrera;
        $data['alumnos'] = $alumnoCarreraModel->obtenerAlumnosPorCarrera($codigoCarrera);

        return view('alumnos/por_carrera', $data);
    }

}