<?php

namespace App\Controllers;

use App\Models\AlumnoModel;

class Alumnos extends BaseController
{
    public function index()
    {
        $alumnoModel = new AlumnoModel();
        $data['alumnos'] = $alumnoModel->findAll();
        return view('alumnos/index', $data);
    }

    public function create()
    {
        return view('alumnos/create');
    }
}
