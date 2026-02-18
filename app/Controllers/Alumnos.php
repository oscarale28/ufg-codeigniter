<?php

namespace App\Controllers;

use App\Models\AlumnoModel;
use App\Models\CarreraModel;

class Alumnos extends BaseController
{
    public function index()
    {
        $alumnoModel = new AlumnoModel();
        $data['alumnos'] = $alumnoModel->findAll();
        return view('alumnos/index', $data);
    }

    public function renderCreate()
    {
        return view('alumnos/create');
    }

    public function create()
    {
        $alumnoModel = new AlumnoModel();
        $rules = [
            'carnet' => 'required|is_unique[alumnos.carnet]',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('alumnos/create', [
                'validation' => $this->validator,
            ]);
        }

        $data = [
            'carnet' => $this->request->getPost('carnet'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
        ];
        $alumnoModel->insert($data);
        return redirect()->to('alumnos');
    }

    public function renderEdit($id)
    {
        $alumnoModel = new AlumnoModel();
        $data['alumno'] = $alumnoModel->find($id);
        return view('alumnos/edit', $data);
    }

    public function edit($id)
    {
        $alumnoModel = new AlumnoModel();
        $rules = [
            'carnet' => "required|is_unique[alumnos.carnet,id,{$id}]",
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('alumnos/edit', [
                'alumno' => $alumnoModel->find($id),
                'validation' => $this->validator,
            ]);
        }

        $data = [
            'carnet' => $this->request->getPost('carnet'),
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
        ];
        $alumnoModel->update($id, $data);
        return redirect()->to('alumnos');
    }

    public function delete($id)
    {
        $alumnoModel = new AlumnoModel();
        $alumnoModel->delete($id);
        return redirect()->to('alumnos');
    }

    /**
     * Vista para filtrar alumnos por carrera (solo lectura).
     */
    public function alumnosPorCarrera()
    {
        $carreraModel = new CarreraModel();
        $alumnoModel = new AlumnoModel();

        $data['carreras'] = $carreraModel->orderBy('nombre_carrera')->findAll();
        $codigoCarrera = $this->request->getGet('codigo_carrera');
        $data['codigo_carrera_seleccionado'] = $codigoCarrera;
        $data['alumnos'] = $alumnoModel->getAlumnosConCarrera($codigoCarrera);

        return view('alumnos/carrera', $data);
    }
}
